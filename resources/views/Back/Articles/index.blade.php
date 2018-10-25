@extends('Back.Common.app')
@section('column_url',url('articles')){{--栏目链接--}}
@section('column','文章'){{--栏目名称--}}
@section('title','列表')
@section('content')
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <ul class="article-status">
                            <ol><a href="{{url('articles?status=1')}}">待审核</a></ol>
                            <ol><a href="{{url('articles?status=2')}}">已发布</a></ol>
                            <ol><a href="{{url('articles?status=0')}}">垃圾箱</a></ol>
                        </ul>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>标题</th>
                                <th>描述</th>
                                <th>阅读量</th>
                                <th>状态</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->describe}}</td>
                                    <td>{{$value->views}}</td>
                                    <td>{{articleStatus($value->status)}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>
                                        <a class="edit" href="{{url('articles/'.$value->id.'/edit')}}">编辑</a>
                                        <form action="{{ url('articles/'.$value->id) }}" method="POST" id="delete">
                                            <input name="_method" value="DELETE" type="hidden">
                                            @csrf
                                            <a class='delete' href="#" name="submit"
                                               onclick="$(this).parent().submit();return false">删除</a>
                                        </form>
                                        @if($status==1)
                                            <a class="edit" href="{{url('articles/auditing?id='.$value->id)}}">审核</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
    <script src="{{ URL::asset('/back/js/jquery.uniform.js') }}"></script>
    <script src="{{ URL::asset('/back/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/back/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/back/js/matrix.tables.js') }}"></script>
@endsection