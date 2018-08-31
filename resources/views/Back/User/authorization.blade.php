@extends('Back.Common.app')
@section('column_url',url('user')){{--栏目链接--}}
@section('column','用户授权'){{--栏目名称--}}
@section('title','授权')
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
                        <h5>授权用户</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post"
                              action="{{url('user/storeAuth')}}"
                              name="basic_validate" id="basic_validate" novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">
                                    <strong style="color: red">({{$userInfo->username}})</strong>
                                    所属用户组
                                </label>
                                <div class="controls">
                                    <select name="gids[]" multiple>
                                        @foreach($group as $value)
                                            <option @if( !empty(is_select_group($userInfo->uid,$value->id))) selected @endif value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" value="{{$userInfo->uid}}" name="uid">
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