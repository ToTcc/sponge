@extends('backend.layout.iframeMain')
@section('content')
    <h2 align="center">发起人信息审核</h2>
    <table align="center">
        <tr style="height:30px">
            <td align="left" style="vertical-align:top">姓名：</td>
            <td align="left" style="height: 50px;vertical-align:top">{{$data["name"]}}</td>
        </tr>
        <tr style="height:30px">
            <td align="left" style="vertical-align:top">性别：</td>
            <td align="left" style="height: 50px;vertical-align:top">{{$data["sex"]}}</td>
        </tr>
        <tr style="height:30px">
            <td align="left" style="vertical-align:top">职业：</td>
            <td align="left" style="height: 50px;vertical-align:top">{{$data["job"]}}</td>
        </tr>
        <tr style="height:30px">
            <td align="left" style="vertical-align:top">年龄：</td>
            <td align="left" style="height: 50px;vertical-align:top">{{$data["age"]}}</td>
        </tr>
        <tr style="height:30px">
            <td align="left" style="vertical-align:top">手机号：</td>
            <td align="left" style="height: 50px;vertical-align:top">{{$data["mobile"]}}</td>
        </tr>
        <tr style="height:30px">
            <td align="left" style="vertical-align:top">微信账号：</td>
            <td align="left" style="height: 50px;vertical-align:top">{{$data["wechat_id"]}}</td>
        </tr>
        <tr style="height:30px">
            <td align="left" style="vertical-align:top">微信昵称：</td>
            <td align="left" style="height: 50px;vertical-align:top">{{$data["wechat_nickname"]}}</td>
        </tr>
        <tr style="height:30px">
            <td align="left" style="vertical-align:top">理想的活动：</td>
            <td align="left" style="height: 50px;vertical-align:top">{{$data["wanted_event"]}}</td>
        </tr>
        <tr style="height:30px">
            <td align="left" style="vertical-align:top">理由：</td>
            <td align="left" style="height: 50px;vertical-align:top">{{$data["reason"]}}</td>
        </tr>
        <tr style="height:30px">
            <td align="left" style="vertical-align:top">拒绝原因：</td>
            <td align="left" style="height: 50px;vertical-align:top">
                <textarea type="text" name="reason" style="width:300px;height:100px;resize:none" placeholder="拒绝时填写"></textarea>
                <input name="applyId" type="hidden" value="{{$data['apply_id']}}">
                <div align="center" style="margin-right:35px;margin-top:10px">
                    <button class="allow btn btn-primary">同意</button>
                    <button class="reject btn btn-danger">拒绝</button>
                </div>
            </td>
        </tr>
    </table>
@endsection

@section('after.js')
    <script src="/assests/backend/js/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/assests/backend/js/sweetalert/sweetalert.css">
    <script type="text/javascript">
        $(function () {
            $("button.reject").on('click',function() {
                var reason = $("textarea[name=reason]").val();
                if(isNullOrEmpty(reason)) {
                    layer.msg("拒绝时必须填写理由");
                    return false;
                }
                $.ajax({
                    type: 'post',
                    url: '{{route('backend.apply.rejectApply')}}',
                    data: {
                        applyId: $("input[name=applyId]").val(),
                        reason: reason
                    },
                    success: function (data) {
                        swal({
                            title: "已拒绝！",
                            text: "该客户未通过发起人审核",
                            type: "success"
                        },function() {
                            parent.window.location.reload(true);
                            var index = parent.layer.getFrameIndex(window.name); //获取当前窗体索引
                            parent.layer.close(index); //执行关闭
                        });
                    },
                    error: function (res) {
                        swal("提交失败","服务请求出现错误","error");
                    }

                })
            });

            $("button.allow").on('click',function() {

                $.ajax({
                    type: 'post',
                    url: '{{route('backend.apply.approveApply')}}',
                    data: {
                        applyId: $("input[name=applyId]").val(),
                    },
                    success: function (data) {
                        swal({
                            title: "已同意！",
                            text: "该客户已通过发起人审核",
                            type: "success"
                        },function() {
                            parent.window.location.reload(true);
                            var index = parent.layer.getFrameIndex(window.name); //获取当前窗体索引
                            parent.layer.close(index); //执行关闭
                        });
                    },
                    error: function (res) {
                        swal("提交失败","服务请求出现错误","error");
                    }

                })
            });
        });

    </script>
@endsection
