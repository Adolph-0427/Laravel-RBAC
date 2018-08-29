@extends('Back.Common.app')
@section('column_url',url('articleCategory')){{--栏目链接--}}
@section('column','文章分类'){{--栏目名称--}}
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
                                <th>ID</th>
                                <th>名称</th>
                                <th>分类标识</th>
                                <th>描述</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->identify}}</td>
                                    <td>{{$value->describe}}</td>
                                    <td>
                                        <a href="{{url('articleCategory/'.$value->id.'/edit')}}">编辑</a>
                                        <form action="{{url('articleCategory/'.$value->id)}}" method="POST" class="delete">
                                            <input name="_method" value="DELETE" type="hidden">
                                            @csrf
                                            <a href="#" name="submit" onclick="$(this).parent().submit();return false" >删除</a>
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