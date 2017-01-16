 <!DOCTYPE html>
<html>
 @include("merchant.header")

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('merchant.success')
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>我发布的活动</h5>
                        <div class="ibox-tools">
                            <a class="btn btn-danger btn-xs" style="color:#FFF;" href="{{route('merchant.index.addEvent')}}">添加活动</a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        @if(!isNullOrEmpty($list))
                            <div class="table-responsive">
                                <table class="table table-striped" style="table-layout:fixed">
                                    <thead>
                                    <tr>
                                        <th>活动名称</th>
                                        <th>发布时间</th>
                                        <th>举办时间</th>
                                        <th>活动类型</th>
                                        <th>价格</th>
                                        <th>地点</th>
                                        <th>人数限制</th>
                                        <th>已报名人数</th>
                                        <th>状态</th>
                                        <th style="width:21%">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $item)
                                        <tr>
                                            <td title="{{$item['title']}}" style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">{{$item['title']}}</td>
                                            <td title="{{$item['created_at']}}" style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">{{$item['created_at']}}</td>
                                            <td title="{{$item['open_time']}}" style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">{{$item['open_time']}}</td>
                                            <td>{{getEnumString(config('enumerations.EVENT_TYPE'),$item['event_type'])}}</td>
                                            <td>{{$item['price']}}</td>
                                            <td title="{{$item['address']}}">{{$item['address']}}</td>
                                            <td>{{$item['upper_limit']}}</td>
                                            <td>{{$item['join_number']}}</td>
                                            <td>{{getEnumString(config('enumerations.EVENT_STATUS'),$item['status'])}}</td>
                                            <td><a href="{{route('merchant.index.editEvent',['id'=>$item['event_id']])}}"
                                                   class="btn btn-warning btn-xs" style="margin-bottom: 0">编辑活动</a>
                                                <button name="viewPreview" route="{{route('merchant.index.eventPreview',['id'=>$item['event_id']])}}"
                                                        class="btn btn-danger btn-xs" style="margin-bottom: 0">预览活动</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- page box -->
                                <div class="page_box">
                                    <ul class="pagination pull-right">
                                        <!-- first page -->
                                        @if($pageNum != 1)
                                            <li class="footable-page-arrow">
                                                <a data-page="first" href="{{route('merchant.index.event',['pageNum' => 1])}}">«</a>
                                            </li>
                                        @else
                                            <li class="footable-page-arrow disabled">
                                                <a data-page="first" href="#first">«</a>
                                            </li>
                                        @endif

                                        <!-- previous page -->
                                        @if($pageNum >= 2)
                                            <li class="footable-page-arrow">
                                                <a data-page="prev" href="{{route('merchant.index.event',['pageNum' => $pageNum - 1])}}">‹</a>
                                            </li>
                                        @else
                                            <li class="footable-page-arrow disabled">
                                                <a data-page="prev" href="#prev">‹</a>
                                            </li>
                                        @endif

                                        <!-- page i -->
                                        @for ($i = $pageNumEnd-4; $i < $pageNumEnd+1; $i++)
                                            @if($i > 0)
                                                <li class="footable-page {{$i == $pageNum ? 'active':''}}"><a data-page="{{$i}}" href="{{route('merchant.index.event',['pageNum' => $i])}}">{{$i}}</a></li>
                                            @endif
                                        @endfor

                                        <!-- next page -->
                                        @if($pageNum <= $totalPageNum-1)
                                            <li class="footable-page-arrow">
                                                <a href="{{route('merchant.index.event',['pageNum' => $pageNum+1])}}">›</a>
                                            </li>
                                        @else
                                            <li class="footable-page-arrow disabled">
                                                <a data-page="next" href="#next">›</a>
                                            </li>
                                        @endif

                                        <!-- last page -->
                                        @if($pageNum != $totalPageNum)
                                            <li class="footable-page-arrow">
                                                <a data-page="last" href="{{route('merchant.index.event',['pageNum' => $totalPageNum])}}">»</a>
                                            </li>
                                        @else
                                            <li class="footable-page-arrow disabled">
                                                <a data-page="last" href="#last">»</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- end page box -->
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-12" style="text-align: center">
                                    暂无活动
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        $(function () {
            $('button[name=viewEventList]').on('click' ,function(){
                var route = $(this).attr('route');
                layer.open({
                    type: 2,
                    title: '查看报名',
                    shadeClose: true, //点击遮罩关闭层
                    closeBtn: false,
                    area: ['80%', '90%'],
                    content: [route] //iframe的url
                });
            });

            $('button[name=viewPreview]').on('click' ,function(){
                var route = $(this).attr('route');
                layer.open({
                    type: 2,
                    title: '活动预览二维码',
                    shadeClose: true, //点击遮罩关闭层
                    closeBtn: false,
                    area: ['20%', '51%'],
                    content: [route] //iframe的url
                });
            });
        })
    </script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
