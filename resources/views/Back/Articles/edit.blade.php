@extends('Back.Common.app')
@section('column_url',url('articles')){{--栏目链接--}}
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
                        <form class="form-horizontal" method="post" action="{{url('articles/'.$info->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                            <input type="hidden" name="_method" value="PATCH">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">标题</label>
                                <div class="controls">
                                    <input type="text" value="{{$info->title}}" name="title" class="required"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">文章分类</label>
                                <div class="controls">
                                    <select name="category_id" style="width: 230px">
                                        @foreach($category as $value)
                                            <option @if ($value->id == $info->category_id) selected @endif value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">描述</label>
                                <div class="controls">
                                    <textarea id="textarea" class="required" name="describe" rows="3">{{$info->describe}}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">封面图</label>
                                <div class="controls">
                                    <div id="uploader-demo">
                                        <!--用来存放item-->
                                        <div id="cover_img">选择图片</div>
                                    </div>
                                    @if (!empty($info->cover_img))
                                        <img src="{{URL::asset($info->cover_img)}}" />
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">热门</label>
                                <div class="controls">
                                    <style>
                                        .radio input[type="radio"] {
                                            margin-left: 0px
                                        }
                                        .btn-info {
                                            cursor: pointer;
                                        }
                                    </style>
                                    <label class="radio">
                                        <input @if($info->is_hot == 1) checked @endif type="radio" name="is_hot" value="1"/>是
                                    </label>
                                    <label class="radio">
                                        <input @if($info->is_hot == 0) checked @endif  type="radio" name="is_hot" value="0"/>否
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">发表时间</label>
                                <div class="controls">
                                    <input name="publication_time" type="text" data-date="2018-1-1"  data-date-format="yyyy-mm-dd" value="{{$info->publication_time}}" class="datepicker" >
                                    <a  class="btn-info btn-mini" onclick="$('input[name=publication_time]').val('')">清空</a>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">排序</label>
                                <div class="controls">
                                    <input type="text" name="sort" value="{{$info->sort}}" class="number"/>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">内容</label>
                                    <div class="controls" style="padding-right: 10%">
                                        <textarea id="edit" name="content"  class="textarea_editor required span12" rows="6">{{$info->content}}</textarea>
                                    </div>
                                </div>
                                <input name="user_id" type="hidden" value="0">
                                <input name="status" type="hidden" value="1">
                                <div class="form-actions">
                                    <input type="submit" value="Save" class="btn btn-success"/>
                                    <button type="button" class="btn btn-danger btn-cancel">Cancel</button>
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
    {{--引入上传插件--}}
    @include('Plug.webUpload')
    <script>
        uploadImg('/articles/articleCover', 'cover_img', 3000, 3000);
    </script>
    {{--引入富文本编辑器--}}
    @include('Plug.froalaEditor',[
        'imageUploadURL'=>'/articles/articleEdit'//上传图片地址
    ])
@endsection