@extends('Back.Common.app')
@section('column_url',url('group')){{--栏目链接--}}
@section('column','用户组'){{--栏目名称--}}
@section('title','角色授权')
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
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-info-sign"></i>
                        </span>
                        <h5>授权角色</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post"  action="{{url('group/storeAuthRole')}}"  name="basic_validate" id="basic_validate" novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">
                                    <strong style="color: red">({{$info->name}})</strong>
                                    所属角色
                                </label>
                                <div class="controls">
                                    <select name="rids[]" multiple>
                                        @foreach($roles as $value)
                                            <option @if( !empty(is_group_select_role($info->id,$value->id))) selected @endif value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" value="{{$info->id}}" name="gid">
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