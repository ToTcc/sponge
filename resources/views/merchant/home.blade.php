<!DOCTYPE html>
<html>
@include("merchant.header")

<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div style="position:absolute;width:500px;height:260px;top:45%;left:50%;margin-left:-200px;height:-130px;z-index:1000; ">
            <h1>欢迎使用SAME活动发布系统</h1>
        </div>
    </div>
    <div class="modal inmodal" id="editGameId" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">编辑游戏ID</h4>
                    <small>当前ID：{$order.game_id}</small>
                </div>
                <div class="modal-body">
                    <form id="edit" method="post" class="form-horizontal" action="{:U('Index/updateGameId')}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">游戏ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="gameId" value="{$order.game_id}">
                            </div>
                        </div>
                        <input type="hidden" name="itemId" value="{$order.item_id}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                    <button id="submit" type="button" class="btn btn-primary submit">保存</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="complaintGame" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">拒绝老板请求并发起诉讼</h4>
                    <small>请详细描述战局详情，我们会尽快处理</small>
                </div>
                <div class="modal-body">
                    <form id="complaint" method="post" class="form-horizontal" action="{:U('Index/ladderRefuseConfirm')}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">诉讼内容</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="complaint" style="width:90%;height:180px;resize:none"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="itemId" value="{$order.item_id}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                    <button id="submitComplaint" type="button" class="btn btn-primary submit">提交</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {

            $('button#submit').click(function () {
                $("form#edit").submit();
            });

            $('button#submitComplaint').click(function () {
                $("form#complaint").submit();
            });

            $('button.confirmEnd').click(function() {

                //询问框
                layer.confirm('您确认本战局失败吗？若确认，战局将结束，您无法获得报酬。', {
                    btn: ['确定','我再想想'], //按钮
                    closeBtn: false
                }, function(){
                    location.href="{:U('Index/ladderEndGameConfirm',array('itemId'=>$order['item_id']))}";
                }, function(){
                });

            });

            $('button.confirmAgain').click(function() {
                //询问框
                layer.confirm('您确认本战局失败，并和此老板再来一局吗？', {
                    btn: ['确定','我再想想'], //按钮
                    closeBtn: false
                }, function(){
                    location.href="{:U('Index/ladderPlayAgainConfirm',array('itemId'=>$order['item_id']))}";
                }, function(){
                });
            });

        });
    </script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:49 GMT -->
</html>
