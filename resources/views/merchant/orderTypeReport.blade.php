<!DOCTYPE html>
<html>
@include("merchant.header")

<body class="gray-bg">

<form class="form-horizontal m-t" method="post" action="{:U('Index/orderTypeReport')}">
    <div class="form-group">
        <label class="col-sm-2 control-label" style="margin-top:15px;">日期搜索：</label>
        <div class="col-sm-10">
            <input readonly class="form-control layer-date" id="startDate" name="startDate" value="{$startDate}">
            <label class="laydate-icon inline demoicon" onclick="laydate({elem: '#startDate'});"></label>
            <input readonly class="form-control layer-date" id="endDate" name="endDate" value="{$endDate}">
            <label class="laydate-icon inline demoicon" onclick="laydate({elem: '#endDate'});"></label>
            <button class="btn btn-primary" type="submit" style="margin-left:20px;margin-top:15px;">搜索</button>
        </div>

    </div>
</form>

<div id="mainCharts" style="height: 360px;margin-top: 30px;"></div>

<script type="text/javascript">
    $(function () {
        var myCharts = echarts.init(document.getElementById('mainCharts'));
        option = {
            title : {
                text: '比赛胜负分布',
                x:'center'
            },
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: ['胜利','失败']
            },
            series : [
                {
                    name: '胜负分布',
                    type: 'pie',
                    radius : '55%',
                    center: ['50%', '60%'],
                    data:[
                        {value:{$winCount}, name:'胜利'},
                        {value:{$loseCount}, name:'失败'}
                    ],
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };
        myCharts.setOption(option);
    });
</script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/graph_morris.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:07 GMT -->
</html>
