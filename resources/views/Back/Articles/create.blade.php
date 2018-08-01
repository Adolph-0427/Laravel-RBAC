@extends('Back.Common.app')
@section('column_url',url('user')){{--栏目链接--}}
@section('column','用户'){{--栏目名称--}}
@section('title','添加')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ URL::asset('/back/css/datepicker.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('/back/css/uniform.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('/back/css/select2.css')}}"/>
@endsection
@section('content')
    <div class="container-fluid">
        <hr/>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>添加文章</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('articles')}}"
                              name="basic_validate"
                              id="basic_validate" novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">标题</label>
                                <div class="controls">
                                    <input type="text" name="title" class="required"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">描述</label>
                                <div class="controls">
                                    <textarea id="textarea" name="describe" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">封面图</label>
                                <div class="controls">
                                    <div id="uploader-demo">
                                        <!--用来存放item-->
                                        <div id="fileList" class="uploader-list"></div>
                                        <div id="filePicker"> 选择图片</div>
                                    </div>
                                    <input type="hidden" name="cover_img" class="required"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">热门</label>
                                <div class="controls">
                                    <style>
                                        .radio input[type="radio"] {
                                            margin-left: 0px
                                        }
                                    </style>
                                    <label class="radio">
                                        <input type="radio" name="is_hot" value="1"/>是
                                    </label>
                                    <label class="radio">
                                        <input checked="" type="radio" name="is_hot" value="0"/>否
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">发表时间</label>
                                <div class="controls">
                                    <div data-date="12-02-2012"
                                         class="input-append date datepicker">
                                        <input type="text"
                                               value="{{\Carbon\Carbon::now()->toDateString()}}"
                                               class="span11" data-date-format="mm-dd-yyyy"/>
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">排序</label>
                                <div class="controls">
                                    <input type="text" name="sort" class="number"/>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">内容</label>
                                    <div class="controls" style="padding-right: 10%">
                                        <textarea id="edit" class="textarea_editor span12"
                                                  rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Save" class="btn btn-success"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection @section('js')
    @parent
    <script>
        window.onerror = function () {
            return true;
        }
    </script>
    <script src="{{ URL::asset('/back/js/jquery.uniform.js') }}"></script>
    <script src="{{ URL::asset('/back/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/back/js/jquery.validate.js') }}"></script>
    <script src="{{ URL::asset('/back/js/matrix.form_validation.js') }}"></script>

    <script src="{{ URL::asset('/back/js/matrix.form_common.js')}}"></script>
    <script src="{{ URL::asset('/back/js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{ URL::asset('/back/js/bootstrap-datepicker.js')}}"></script>

@endsection
{{--引入上传插件--}}
@include('Plug.webUpload',[
    'server'=>'articles/articleCover',
    'pick'=>'filePicker'
])
{{--引入富文本编辑器--}}
@include('Plug.froalaEditor',[
    'imageUploadURL'=>'articles/articleEdit'
])