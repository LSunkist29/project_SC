// js引入(function() { console.log('ok'); })()
function animate(obj, target, callback) { //形參
    // console.log(callback); 相當於執行callback=function(){} 調用的時侯callbakc()
    clearInterval(obj.timer);
    obj.timer = setInterval(function() {
        var step = (target - obj.offsetLeft) / 10;
        //判斷正負數往上取還是往下取 //這樣才不會有因除法發生的誤差
        step = step > 0 ? Math.ceil(step) : Math.floor(step);
        if (obj.offsetLeft == target) {
            //停止動畫 本質是停止定時器
            clearInterval(obj.timer);
            //判斷有沒有回調函數
            if (callback) {
                //調用函數
                callback();
            }
            //也可以寫成
            //callback && callback(); //短路運算 callback true 會繼續後面的 //&&短路運算符
        }
        //把每次加1 這個步長值改為一個慢慢變小的值 步長公式:(目標值-現在的位置)/10
        obj.style.left = obj.offsetLeft + step + 'px';
    }, 30)
}