@extends('Back.Common.app')
@section('column_url',url('articleCategory')){{--栏目链接--}}
@section('column','文章分类'){{--栏目名称--}}
@section('title','编辑')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ URL::asset('/back/css/uniform.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/back/css/select2.css') }}"/>
@endsection
@section('content')
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>编辑文章分类</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('articleCategory/'.$info->id)}}"
                              name="basic_validate" id="basic_validate" novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="control-group">
                                <label class="control-label">名称</label>
                                <div class="controls">
                                    <input type="text" name="name" value="{{$info->name}}" class="required">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">分类标识</label>
                                <div class="controls">
                                    <input type="text" name="identify" value="{{$info->identify}}" class="required">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">描述</label>
                                <div class="controls">
                                    <textarea id="textarea" name="describe" rows="3">{{$info->describe}}</textarea>
                                </div>
                            </div>
                            <input name="pid" value="{{$info->pid}}" type="hidden">
                            <input name="level" value="{{$info->level}}" type="hidden">
                            <div class="form-actions">
                                <input type="submit" value="Save" class="btn btn-success">
                            </div>
                        </form>
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
    <script src="{{ URL::asset('/back/js/jquery.validate.js') }}"></script>
    <script src="{{ URL::asset('/back/js/matrix.form_validation.js') }}"></script>
@endsection