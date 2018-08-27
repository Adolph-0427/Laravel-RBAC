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
                        <span class="icon">
                            <input type="checkbox" id="title-checkbox" name="title-checkbox"/>
                        </span>
                        <h5>全部选择</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
                                <th><i class="icon-resize-vertical"></i></th>
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
                                    <td><input type="checkbox" name="uid" value="{{$value->id}}}"/></td>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->describe}}</td>
                                    <td>{{$value->views}}</td>
                                    <td>{{articleStatus($value->status)}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>
                                        <a href="{{url('articles/'.$value->id.'/edit')}}">编辑</a>
                                        <form action="{{ url('articles/'.$value->id) }}" method="POST" id="delete">
                                            <input name="_method" value="DELETE" type="hidden">
                                            @csrf
                                            <a href="#" name="submit" onclick="document.getElementById('delete').submit();return false" >删除</a>
                                        </form>
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