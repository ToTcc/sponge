<!DOCTYPE html>
<html>
@include("merchant.header")

<body class="gray-bg">

<form class="form-horizontal m-t" method="post" action="{:U('Index/accountDetailReport')}">
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
            title: {
                text: 'skyyoyo流水报表',
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['收入','提现']
            },
            toolbox: {
                show: true,
                feature: {
                    dataView: {show: true, readOnly: false},
                    magicType: {show: true, type: ['line', 'bar']},
                    restore: {show: true},
                    saveAsImage: {show: true}
                }
            },
            calculable: true,
            xAxis: [
                {
                    type: 'category',
                    data: [<foreach name="date" item="vo">"{$vo}",</foreach>]
    }
        ],
        yAxis: [
            {
                type: 'value',
                axisLabel: {
                    formatter: '{value}元'
                }
            }
        ],
                series: [
            {
                name: '收入',
                type: 'bar',
                data:[<foreach name="income" item="vo">{$vo},</foreach>],
        markPoint: {
            data: [
                {type: 'max', name: '最大值'},
                {type: 'min', name: '最小值'}
            ]
        },
        markLine: {
            data: [
                {type: 'average', name: '平均值'}
            ]
        }
    },
        {
            name: '提现',
                    type: 'bar',
                data:[<foreach name="withdraw" item="vo">{$vo},</foreach>],
            markLine: {
                data: [
                    {type: 'average', name: '平均值'}
                ]
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
