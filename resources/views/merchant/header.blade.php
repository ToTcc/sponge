<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>Same活动发布中心</title>

    <meta name="keywords" content="Same活动发布中心">
    <meta name="description" content="Same活动发布中心">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/assets/merchant/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/assets/merchant/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/assets/merchant/css/animate.min.css" rel="stylesheet">
    <link href="/assets/merchant/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="/assets/merchant/js/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="/assets/merchant/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="/assets/merchant/js/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <script src="/assets/merchant/js/jquery.min.js?v=2.1.4"></script>
    <script src="/assets/merchant/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/assets/merchant/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/assets/merchant/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/assets/merchant/js/plugins/layer/layer.min.js"></script>
    <script src="/assets/merchant/js/hplus.min.js?v=4.1.0"></script>
    <script type="text/javascript" src="/assets/merchant/js/contabs.min.js"></script>
    <script src="/assets/merchant/js/plugins/pace/pace.min.js"></script>
    <script src="/assets/merchant/js/plugins/flot/jquery.flot.js"></script>
    <script src="/assets/merchant/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/assets/merchant/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/assets/merchant/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/assets/merchant/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="/assets/merchant/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="/assets/merchant/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/assets/merchant/js/demo/peity-demo.min.js"></script>
    <script src="/assets/merchant/js/content.min.js?v=1.0.0"></script>
    <script src="/assets/merchant/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/merchant/js/plugins/gritter/jquery.gritter.min.js"></script>
    <script src="/assets/merchant/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/assets/merchant/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/assets/merchant/js/plugins/easypiechart/jquery.easypiechart.js"></script>
    <script src="/assets/merchant/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="/assets/merchant/js/demo/sparkline-demo.min.js"></script>
    <script src="/assets/merchant/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/assets/merchant/js/plugins/validate/messages_zh.min.js"></script>
    <script src="/assets/merchant/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/assets/merchant/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="/assets/merchant/js/plugins/morris/morris.js"></script>
    <script src="/assets/merchant/js/echarts.common.min.js"></script>
    <script src="/assets/merchant/js/plugins/layer/laydate/laydate.js"></script>
    <script src="/assets/merchant/js/jquery.jplayer.min.js" type="text/javascript"></script>
    <script src="/assets/merchant/js/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script>

        //判空
        function isNullOrEmpty(value) {
            return (typeof(value) == "undefined" || value == '' || value == null || value == 0);
        }

        //页面跳转
        function redirect(url) {
            location.href = url;
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

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            setTimeout(function() {
                $("div.alert-success > button.close").trigger("click");
            },2000);

            //日期选择器
            var dateInput = $("input.J_date");
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
        })
    </script>
</head>