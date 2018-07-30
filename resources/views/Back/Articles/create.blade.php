@extends('Back.Common.app')
@section('column_url',url('user')){{--栏目链接--}}
@section('column','用户'){{--栏目名称--}}
@section('title','添加')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ URL::asset('/back/css/datepicker.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('/back/css/uniform.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('/back/css/select2.css')}}"/>

    {{--编辑器--}}
    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.pkgd.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css" rel="stylesheet"
          type="text/css"/>
    {{--webUploader--}}
    <link href="https://cdn.bootcss.com/webuploader/0.1.1/webuploader.css" rel="stylesheet">
@endsection
<style type="text/css">
    a[href="https://froala.com/wysiwyg-editor"], a[href="https://www.froala.com/wysiwyg-editor?k=u"] {
        display: none !important;
        position: absolute;
        top: -99999999px;
    }
</style>
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
                        <form class="form-horizontal" method="post" action="{{url('articles')}}" name="basic_validate"
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
                                        <div id="filePicker">
                                            选择图片
                                        </div>
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
                                    <div data-date="12-02-2012" class="input-append date datepicker">
                                        <input type="text" value="{{\Carbon\Carbon::now()->toDateString()}}"
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
                                        <textarea id="edit" class="textarea_editor span12" rows="6"></textarea>
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

    {{--编辑器--}}
    <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/froala_editor.pkgd.min.js"></script>
    <script src="https://cdn.bootcss.com/froala-editor/2.8.1/js/languages/zh_cn.js" type="text/javascript"></script>

    <script>
        var _$ = jQuery.noConflict(true);
        _$(function () {
            _$('#edit').froalaEditor({
                placeholderText: '请输入内容',
                imageUploadURL: "{{url('articles/articleCover')}}",//上传图片路径
                enter: _$.FroalaEditor.ENTER_BR,
                language: 'zh_cn',
                height: 150,
                toolbarButtons: [
                    'bold', 'italic', 'underline', 'paragraphFormat', 'align', 'color', 'fontSize', 'insertImage', 'insertTable', 'undo', 'redo'
                ]
            })
        });
    </script>

    {{--webUploader--}}
    <script src="https://cdn.bootcss.com/jquery/1.12.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.staticfile.org/webuploader/0.1.0/webuploader.js"></script>

    // swf文件路径
    <script>
        // 初始化Web Uploader
        var jquery = jQuery.noConflict(true);
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,
            formData:{
                _token:'{{csrf_token()}}',
                name:'articleCover',
            },
            // swf文件路径
            swf: 'https://cdn.bootcss.com/webuploader/0.1.0/Uploader.swf',

            // 文件接收服务端。
            server: "{{url('articles/articleCover')}}",

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });
    </script>
@endsection