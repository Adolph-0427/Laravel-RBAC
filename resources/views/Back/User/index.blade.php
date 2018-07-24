@extends('Back.Common.app')
@section('column_url',url('user')){{--栏目链接--}}
@section('column','用户'){{--栏目名称--}}
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
                                <th>用户</th>
                                <th>描述</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $value)
                                <tr>
                                    <td><input type="checkbox" name="uid" value="{{$value->uid}}}"/></td>
                                    <td>{{$value->uid}}</td>
                                    <td>{{$value->username}}</td>
                                    <td>{{$value->describe}}</td>
                                    <td class="center left">{{$value->created_at}}</td>
                                    <td>
                                        <a href="{{url('user/'.$value->uid.'/edit')}}">编辑</a>
                                        <form action="{{ url('user/'.$value->uid) }}" method="POST" style="display: inline;margin-left: 30px"><input name="_method" value="DELETE" type="hidden">
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">删除</button>
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