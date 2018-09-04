@extends('Back.Common.app')
@section('column_url',url('articleCategory')){{--栏目链接--}}
@section('column','文章类别'){{--栏目名称--}}
@section('title','添加')
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
                        <h5>添加分类</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('articleCategory')}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">名称</label>
                                <div class="controls">
                                    <input type="text" name="name" class="required">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">分类标识</label>
                                <div class="controls">
                                    <input type="text" name="identify" class="required">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">描述</label>
                                <div class="controls">
                                    <textarea id="textarea" name="describe" rows="3"></textarea>
                                </div>
                            </div>
                            <input name="pid" value="{{$pid or 0}}" type="hidden">
                            <input name="level" value="{{$level or 1}}" type="hidden">
                            <div class="form-actions">
                                <input type="submit" value="Save" class="btn btn-success">
                                <button type="button" class="btn btn-danger btn-cancel">Cancel</button>
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