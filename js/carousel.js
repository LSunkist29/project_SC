//輪播圖
//獲得左右側按鈕
var arrow_l = document.querySelector('.left-f');
var arrow_r = document.querySelector('.right-f');
var focus = document.querySelector('.big-box');
//滑鼠經過focus就顯示左右按鈕
focus.addEventListener('mouseenter', function() {
        arrow_l.style.display = 'block';
        arrow_r.style.display = 'block';
        //滑鼠經過自動停止定時器，停止輪播圖
        clearInterval(timer); //給值給定時器的值就可以了
        timer = null; //變量不用清空//清除定時器變量
    })
    //滑鼠離開focus就隱藏左右按鈕
focus.addEventListener('mouseleave', function() {
        arrow_l.style.display = 'none';
        arrow_r.style.display = 'none';
        //滑鼠離開的時侯就調用定時器
        timer = setInterval(function() {
            arrow_r.click();
        }, 2000);
    })
    //3.動態生成小圓圈 有幾張圖片，我就生成幾個小圓圈
var ul = focus.querySelector('ul');
var ol = document.querySelector('.link');
var ulImg = document.querySelector('.img-list');
var focusWidth = ulImg.offsetWidth;
// console.log(ul);
// console.log(ol);
// console.log(ul.children.length);
for (var i = 0; i < ul.children.length; i++) {
    //創建一個小li
    var li = document.createElement('li');
    // console.log(li);
    //記錄當前小圓圈的索引號 通過自定義屬性來做
    //index是屬性，i是值
    li.setAttribute('index', i);
    //把小li插入到ol 裡面
    ol.appendChild(li);
    li.innerHTML = '<a href="#">●</a>';
    // 4.小圓圈的排他思想 我們可以直接在生成小圓圈的同時直接綁定點擊事件
    li.addEventListener('click', function() {
        //替換掉所有人 把所有的小li 清除current類名
        for (var i = 0; i < ol.children.length; i++) {
            //li下面的a
            ol.children[i].children[0].className = '';
        }
        //留下我自已 當前的小li 設置current類名
        this.children[0].className = 'current';
        //5.點擊小圓圈，移動圖片 當然移動的是ul
        //ul的移動距離 戚圓圈的索引號 乘以 圖片的寬度 注意是負值
        //當我們點擊了某個小li 就拿到當前小li 的索引號
        var index = this.getAttribute('index');
        //把點擊點點，和點擊右鍵的第幾圖設定成一樣的
        //當我們點擊了某個小li 就要把這個li 的索引號給num
        //因為點點是用num設定第幾張，跟我們綁定的不一樣
        //因為num是全局變量
        num = index;
        // 了某個小li 就要把這個li 的索引號給circle
        circle = index;
        // num=circle=index;
        // animate(ul, target, callback);
        // console.log(focusWidth); //500
        // console.log(index); // 1 2 3 4
        // var sumvarule = -index * focusWidth / 4;
        //單張圖片的寬度340
        var sumvarule = -index * 700;
        // console.log(sumvarule);
        console.log(ulImg);
        console.log(sumvarule);
        animate(ulImg, sumvarule);
    })
}
//把ol裡面的第一個小li設置類名為current
// var lili = ol.children[0];
// lili.children[0].className = 'current';
//一開始默認沒點的
ol.children[0].children[0].className = 'current';
//6.克隆第一張圖片(li)放到ul 最後面
var first = ul.children[0].cloneNode(true);
ul.appendChild(first);
//7.點擊右側按鈕，圖片滾動一張
var num = 0;
//flag節流閥
var flag = true;
//控制小圓圈的播放
var circle = 0;
arrow_r.addEventListener('click', function() {
        if (flag) { //節流閥，讓點擊圖片不那麼快速
            flag = false; //關閉節流閥
            //如果走到了最後複制的一張圖片，此時 我們的ul 要快速複原 left改為0
            // if (num == 4) {
            if (num == ul.children.length - 1) {
                ul.style.left = 0;
                num = 0; //之後++是1
            }
            num++;
            //動畫執行完畢，再把flag設定成true
            animate(ul, -num * 700, function() {
                flag = true; //相當於打開節流閥
            }); //負的是因為圖片往左走 //-num乘上圖片的寬
            //點擊右側按鈕，小圓圈跟隨一起變化 可以再聲明一個變量控小圓圓的播放
            circle++;
            //如果circle==4說明走到最後我們克隆的這張圖片了 我們就複原
            if (circle == 4) {
                circle = 0;
            }
            //先清除其餘小圓圈的current類名
            for (var i = 0; i < ol.children.length; i++) {
                ol.children[i].children[0].className = '';
            }
            //留下當前的小圓圈的current類名
            ol.children[circle].children[0].className = 'current';
        }
    })
    //8.點擊左側按鈕，圖片滾動一張
arrow_l.addEventListener('click', function() {
        if (flag) {
            flag = false;
            //如果走到了最後複制的一張圖片，此時 我們的ul 要快速複原 right更改
            // if (num == 4) {
            if (num == 0) {
                ul.style.left = -3500 + 'px'; //設定值時也是負的//1700-340最後一張的前面
                // ul.style.left = -(ul.children.length - 1) * 340(-340) + 'px';
                // ul.style.right = 0;
                // ul.style.left = '0px';
                console.log(ul.style.left);
                // console.log(ul.children.length - 1);
                // console.log(ul.children.length - 1 * 340);
                num = 4;
                // num = -(ul.children.length - 1);
            }
            num--;
            animate(ul, -num * 700, function() {
                flag = true;
            }); //負的是因為圖片往左走 //-num乘上圖片的寬
            circle--;
            //如果circle==4說明走到最後我們克隆的這張圖片了 我們就複原
            if (circle < 0) {
                circle = 3;
            }
            //也可以用三元表達式來做
            //是就ol.children.length - 1不是就返回原值
            circle = circle < 0 ? ol.children.length - 1 : circle;

            //先清除其餘小圓圈的current類名
            for (var i = 0; i < ol.children.length; i++) {
                ol.children[i].children[0].className = '';
            }
            //留下當前的小圓圈的current類名
            ol.children[circle].children[0].className = 'current';
        }
    })
    //10.自動播放輪播圖
var timer = setInterval(function() {
    //手動調用點擊事件
    arrow_r.click();
}, 2000);