@extends('Back.Common.app')
@section('column_url',url('user')){{--栏目链接--}}
@section('column','用户'){{--栏目名称--}}
@section('title','修改密码')
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
                    <h5>修改密码</h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="{{url('user/modifyPass')}}"  name="basic_validate" id="basic_validate" novalidate="novalidate">
                        @csrf
                        <div class="control-group">
                            <label class="control-label">原密码</label>
                            <div class="controls">
                                <input type="password" name="password" value="" class="required">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">新密码</label>
                            <div class="controls">
                                <input type="password" name="new_password" value="" class="required">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">确认新密码</label>
                            <div class="controls">
                                <input type="password" name="re_new_password" value="" class="required">
                            </div>
                        </div>
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