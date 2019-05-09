ace.require("ace/ext/language_tools");
var editor = ace.edit("editor");
editor.$blockScrolling = Infinity;
editor.setFontSize(16);
editor.session.setMode("ace/mode/php");
editor.setOptions({
    enableBasicAutocompletion: true,
    enableSnippets: true,
    enableLiveAutocompletion: true
});
editor.setTheme("ace/theme/monokai")
result=document.getElementById('result-field')
function run(_this) {
    $.ajax('',{
        type:'post',
        data:{run:editor.getValue()},
        beforeSend:function () {
            _this.innerHTML=_this.dataset.running
            _this.setAttribute('disabled','disabled')
        },
        complete:function () {
            _this.innerHTML=_this.dataset.init
            _this.removeAttribute('disabled')
        },
        success:function (res, status) {
            result.innerHTML=res.data
        },
        error:function (err) {
            result.innerHTML='服务器出错，'+err.status+' '+err.statusText
        }
    })
}