var that;
class Tab {
    constructor(id) {
        //獲取元素
        that = this;
        this.main = document.querySelector(id);
        this.lis = this.main.querySelectorAll('li');
        this.sections = this.main.querySelectorAll('section');
        this.add = this.main.querySelector('.tabadd');
        // 自動調用寫在創建函式裡面
        //必須加上this
        this.init();
    }
    init() {
            //init初始化操作讓相關的元素綁定事件
            //i讀取lis每個陣列的值
            // this.add.onclick = this.addTab;
            for (var i = 0; i < this.lis.length; i++) {
                //在每個lis的i加上index
                this.lis[i].index = i;
                //在每個onclick裡執行toggleTab
                //toggleTab不加小括號，在調用時才執行
                this.lis[i].onclick = this.toggleTab;

            }
        }
        //1.切換功能
    toggleTab() {
        // console.log(this.index);
        that.clearClass();
        this.className = 'liactive';
        that.sections[this.index].className = 'conactive';
    }
    clearClass() {
            for (var i = 0; i < this.lis.length; i++) {
                this.lis[i].className = '';
                this.sections[i].className = '';
            }
        }
        //2.添加功能
    addTab() {}
        //3.移除功能
    removeTab() {}
        //4.修改功能
    edidTab() {}
}
var tab = new Tab('#tab');
// tab.init();