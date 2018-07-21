@extends('Back.Common.app')
@section('column_url',url('user/index')){{--栏目链接--}}
@section('column','用户'){{--栏目名称--}}
@section('content')
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>创建用户</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate"
                              novalidate="novalidate">
                            <div class="control-group">
                                <label class="control-label">名称</label>
                                <div class="controls">
                                    <input type="text" name="required" id="required">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">密码</label>
                                <div class="controls">
                                    <input type="text" name="email" id="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">确认密码</label>
                                <div class="controls">
                                    <input type="text" name="date" id="date">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">URL (Start with http://)</label>
                                <div class="controls">
                                    <input type="text" name="url" id="url">
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Validate" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection