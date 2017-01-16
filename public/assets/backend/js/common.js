;(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });


    //日期选择器
    var dateInput = $("input.J_date")
    if (dateInput.length) {
        Wind.use('datePicker', function () {
            dateInput.datePicker({
                yearChange: true
            });
        });
    }

    $(".form_year").datetimepicker({
        format: "yyyy",
        minView: 'decade',
        startView: 'decade',
        autoclose: true,
        todayBtn: true,
    });

    $(".form_date").datetimepicker({
        format: "yyyy-mm-dd",
        minView: 'month',
        autoclose: true,
        todayBtn: true,
    });

    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:00",
        autoclose: true,
        todayBtn: true,
        minuteStep: 5
    });

    /*
     * 默认头像
     */
    var avas = $('img.J_avatar');
    if (avas.length) {
        avatarError(avas);
    }


})();

//重新刷新页面，使用location.reload()有可能导致重新提交
function reloadPage(win) {
    var location = win.location;
    location.href = location.pathname + location.search;
}

//页面跳转
function redirect(url) {
    location.href = url;
}

//layer关闭方法
function closeLayer() {
    var index = parent.layer.getFrameIndex(window.name); //获取当前窗体索引
    parent.layer.close(index); //执行关闭
}

//layer提交表单
function layerSubmitForm(form,listurl) {
    if(!form){
        form="updateForm";
    }

    $.ajax({
        url : $('#' + form).attr('action'),
        data : $('#' + form).serialize(),
        dataType : 'json',
        type : 'post',
        success : function ($data, $status) {
            alert(1);
        },
        error : function ($e) {
            alert(2);
        }
    });

}

//刷新iframe窗
$("#refresh_wrapper").click(function(){
    var $current_iframe=$("#content-main iframe:visible");
    //$current_iframe.attr("src",$current_iframe.attr("src"));
    $current_iframe[0].contentWindow.location.reload();
    return false;
});

//一段时间以后关闭成功或错误alert窗
$(function () {
    setTimeout(function() {
        $("button.close").trigger("click");
    },2000)
});

//判空
function isNullOrEmpty(value) {
    return (typeof(value) == "undefined" || value == '' || value == null || value == 0);
}