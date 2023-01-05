var list_count = 0;

// function getisc() {
//     var req = new XMLHttpRequest();
//     //取得資料的網址
//     //req.open("get","http://127.0.0.1/popular.htm");更改可替換網頁
//     req.open("get", "http://127.0.0.1:5500/shop_content.html");
//     //觸發load事件
//     req.onload = function() { //load事件，偵測連線的狀態結果
//         //連線完成，做連線後的處理
//         //alert(this.responseText);//取得連線的文字
//         var isc = document.getElementById("in_shopcar_content");
//         return isc;
//     };
//     req.send(); //送出連線
// }

function add() {
    // console.log(count);
    var cq = document.getElementById("commodity_quantity");
    var count = Number(cq.value);
    cq.value = ++count;
}

function minus() {
    // console.log("returnminus");
    var cq = document.getElementById("commodity_quantity");
    var count = Number(cq.value);
    if (count > 0) {
        cq.value = --count;
    }
}

function getcommodity(getpage, id) {
    var req = new XMLHttpRequest();
    //取得資料的網址
    //req.open("get","http://127.0.0.1/popular.htm");更改可替換網頁
    // req.open("get", "http://localhost/shopweb/shop/" + pageName);
    // console.log(one);
    req.open("get", "http://localhost/shopweb/shop/" + getpage + ".php");
    //觸發load事件
    req.onload = function() { //load事件，偵測連線的狀態結果
        //連線完成，做連線後的處理
        //alert(this.responseText);//取得連線的文字
        var content = document.getElementById("content");
        content.innerHTML = this.responseText;
    };
    req.send(); //

    console.log("ajax_ok");
    get_data(id);
}

function getData2() {
    var req = new XMLHttpRequest();
    //取得資料的網址
    //req.open("get","http://127.0.0.1/popular.htm");更改可替換網頁
    // req.open("get", "http://localhost/shopweb/shop/" + pageName);

    req.open("get", "http://localhost/shopweb/shop/02_01.php");
    //觸發load事件
    req.onload = function() { //load事件，偵測連線的狀態結果
        //連線完成，做連線後的處理
        //alert(this.responseText);//取得連線的文字
        var content = document.getElementById("content");
        content.innerHTML = this.responseText;
    };
    req.send(); //送出連線
    console.log("ajax_ok");
}

function pull_in_shopcar() {
    // var countpush = document.getElementById("countpush");
    // countpush.style.disabled = "false";
    console.log("pull");
    var cn = document.getElementById("commodity_name");
    var cp = document.getElementById("commodity_Price");
    var cq = document.getElementById("commodity_quantity");
    var isc = document.getElementById("in_shopcar_content");
    var shopcar_new = document.getElementById("shopcar_new");
    var shopcar_sound = document.getElementById("shopcar_sound");

    // console.log(cn.textContent + cp.textContent);
    // var list_sound = parseInt(cp.textContent) * Number(cq.value);
    var list_sound = Number(cp.textContent.substring(1)) * Number(cq.value);
    console.log(list_sound);
    console.log(Number(cq.value));

    // list_count++;
    var addh5 = document.createElement("h5");
    var span = document.createElement("span");
    var spancontent = document.createTextNode("刪除");
    var content = document.createTextNode("●" + " " + cn.textContent + cp.textContent + "*" + cq.value + "=" + list_sound + "元");

    span.appendChild(spancontent);

    console.log(content);
    addh5.appendChild(content);
    addh5.appendChild(span);
    console.log(isc);
    isc.appendChild(addh5);
    shopcar_sound.textContent = parseInt(shopcar_sound.textContent) + Number(list_sound);
    shopcar_new.style.display = "block";

    //addeventclick
    var lis = isc.children;

    for (var i = 0; i < lis.length; i++) {
        lis[i].addEventListener('click', function() {
            this.remove();
            shopcar_del_conuntsound()
        })
    }
}

function pull_in_shopcar2() {
    // var countpush = document.getElementById("countpush");
    // countpush.style.disabled = "false";
    console.log("pull");
    var cn = document.getElementById("commodity_name");
    var cp = document.getElementById("commodity_Price");
    var cq = document.getElementById("commodity_quantity");
    var isc = document.getElementById("in_shopcar_content");
    var shopcar_new = document.getElementById("shopcar_new");
    var shopcar_sound = document.getElementById("shopcar_sound");

    // console.log(cn.textContent + cp.textContent);
    // var list_sound = parseInt(cp.textContent) * Number(cq.value);
    var list_sound = Number(cp.textContent.substring(1)) * Number(cq.value);
    console.log(list_sound);
    console.log(Number(cq.value));

    // list_count++;
    var addh5 = document.createElement("h5");
    var span = document.createElement("span");
    var spancontent = document.createTextNode("刪除");
    var content = document.createTextNode("●" + " " + cn.textContent + cp.textContent + "*" + cq.value + "=" + list_sound + "元");

    span.appendChild(spancontent);

    console.log(content);
    addh5.appendChild(content);
    addh5.appendChild(span);
    console.log(isc);
    isc.appendChild(addh5);
    shopcar_sound.textContent = parseInt(shopcar_sound.textContent) + Number(list_sound);
    shopcar_new.style.display = "block";

    //addeventclick
    var lis = isc.children;

    for (var i = 0; i < lis.length; i++) {
        lis[i].addEventListener('click', function() {
            this.remove();
            shopcar_del_conuntsound()
        })
    }
}
//shopcarsound
function the_shoped() {
    console.log("shoped");
    var isc = document.getElementById("in_shopcar_content");

    var sound = null;
    var sql_shop_list = isc + sound;
    salShopcar(sql_shop_list);
}

//刪除購物車總數
function shopcar_del_conuntsound() {
    var in_shopcar_content = document.getElementById('in_shopcar_content');
    var in_shopcar_content_children = in_shopcar_content.children;
    var shopcar_sound = document.getElementById("shopcar_sound");
    var sound = 0;
    if (in_shopcar_content_children.length > 0) {
        for (var i = 0; i < in_shopcar_content_children.length; i++) {
            // console.log(in_shopcar_content_children[i]);
            var str = in_shopcar_content_children[i].textContent; //要擷取的字串
            var index = str.indexOf("=");
            var result = str.substr(index + 1, str.length - 1);
            result = parseInt(result);
            // console.log("v:" + result);1999
            // shopcar_sound.textContent = 0;
            sound += Number(result);
            shopcar_sound.textContent = sound;
        }
    } else {
        shopcar_sound.textContent = 0;
    }

}

//購物車計算結算
function shopcar_count() {

    // var in_shopcar_content = document.getElementById('in_shopcar_content');
    var in_shopcar_content_input = document.getElementById('in_shopcar_content_input');
    // var in_shopcar_content_children = in_shopcar_content.children;
    var shopcar_sound = document.getElementById('shopcar_sound');
    var shopcar_sound_input = document.getElementById('shopcar_sound_input');
    // var username1 = document.getElementById('username1');
    //全部商品
    var data_all_h5 = document.getElementById('data_all_h5');
    console.log(data_all_h5);
    var all_h5 = data_all_h5.children;
    console.log(all_h5);
    if (all_h5.length > 0) {
        for (var i = 0; i < all_h5.length; i++) {
            // console.log(in_shopcar_content_children[i]);
            var str = all_h5[i].textContent; //要擷取的字串
            in_shopcar_content_input.value += str;
            console.log(str);

        }
    }else{
        in_shopcar_content_input.value=shopcar_sound.value;
    }

    //加總
    // shopcar_sound_input.value = shopcar_sound.textContent;


    //全部商品 加上 加總
}
// settlement
// function settlement() {
//     var in_shopcar_content = document.getElementById('in_shopcar_content');
//     var in_shopcar_content_input = document.getElementById('in_shopcar_content_input');
//     var in_shopcar_content_children = in_shopcar_content.children;
//     var shopcar_sound = document.getElementById('shopcar_sound');
//     var shopcar_sound_input = document.getElementById('shopcar_sound_input');
//     var username1 = document.getElementById('username1');

//     //
//     if (in_shopcar_content_children.length > 0) {
//         for (var i = 0; i < in_shopcar_content_children.length; i++) {
//             // console.log(in_shopcar_content_children[i]);
//             var str = in_shopcar_content_children[i].textContent; //要擷取的字串
//             in_shopcar_content_input.value += str;
//         }
//     }
//     //
//     console.log(in_shopcar_content_input.value);
//     shopcar_sound_input.value = shopcar_sound.textContent;

//     //拿cookie
//     // username1.value = document.cookie;
// }


function shopcar_show(getvalue) {
    var shopcar_sound = document.getElementById('shopcar_sound');
    var shopcar_sound_input = document.getElementById('shopcar_sound_input');
    // console.log("susses");
    var in_shopcar_id = document.getElementById("in_shopcar_id");
    in_shopcar_id.style.display = getvalue;
    in_shopcar_id.style.zIndex = 999;
    var in_shopcar_content_input = document.getElementById('in_shopcar_content_input');
    // var in_shopcar_content_children = in_shopcar_content.children;
    var shopcar_sound = document.getElementById('shopcar_sound');
    var shopcar_sound_input = document.getElementById('shopcar_sound_input');
    // var username1 = document.getElementById('username1');
    //全部商品
    var data_all_h5 = document.getElementById('data_all_h5');
    // console.log(data_all_h5);
    var all_h5 = data_all_h5.children;
    console.log(all_h5);
    // console.log();
    if (all_h5.length > 0) {
        for (var i = 0; i < all_h5.length; i++) {
            // console.log(in_shopcar_content_children[i]);
            console.log(all_h5[i].children);
            var str = Number(all_h5[i].children[0].children[0].textContent) //要擷取的字串
            str += str;
            // in_shopcar_content_input.value = str;
            console.log(str);

        }
    }

    shopcar_sound_input.value = str;
    shopcar_sound.textContent = str;

}

// function shopcar_dis() {
//     var in_shopcar_id = document.getElementById("in_shopcar_id");
//     in_shopcar_id.style.display = "none";
// }

//shopcar
//dellist
// function delshopcarList() {

// }

function nowbuy1() {
    var commodity_name = document.getElementById("commodity_name");
    var commodity_Price = document.getElementById("commodity_Price");
    var commodity_quantity = document.getElementById("commodity_quantity");
    var commodity_name1 = document.getElementById("commodity_name1");
    var commodity_Price1 = document.getElementById(" commodity_Price1");
    var commodity_quantity1 = document.getElementById("commodity_quantity1");
    var inputswitch = document.getElementById("inputswitch");
    // var shopcar_new = document.getElementById("shopcar_new");

    commodity_name1.value = commodity_name.textContent;
    commodity_Price1.value = commodity_Price.textContent;
    commodity_quantity1.value = commodity_quantity.textContent;
    inputswitch.value = "1";
    // shopcar_new.style.display = "block";
}

function nowbuy2() {
    var commodity_name = document.getElementById("commodity_name");
    var commodity_Price = document.getElementById("commodity_Price");
    var commodity_quantity = document.getElementById("commodity_quantity");
    var commodity_name2 = document.getElementById("commodity_name1");
    var commodity_Price2 = document.getElementById(" commodity_Price1");
    var commodity_quantity2 = document.getElementById("commodity_quantity1");
    var inputswitch = document.getElementById("inputswitch");
    var form = document.getElementById("form");


    commodity_name2.value = commodity_name.textContent;
    commodity_Price2.value = commodity_Price.textContent;
    commodity_quantity2.value = commodity_quantity.textContent;
    inputswitch.value = "2";
    form.action = "./shopcar_php/nowbuy.php";

}
// function getidtosession(id) {
//     axios.get('http://localhost/shopweb/shopcar_php/show_page.php')
//         .then((res) => {
//             alert(res);
//         });

// }

function getdata() {
    $.getJSON("./shopcar_php/get_data.php", function(data) {
        console.log(data);
        alert("jQuery拿到的:" + data);
    })

}