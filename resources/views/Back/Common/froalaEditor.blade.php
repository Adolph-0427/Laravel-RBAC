
<!-- Include external CSS. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<!-- Include Editor style. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.pkgd.min.css"
      rel="stylesheet" type="text/css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css" rel="stylesheet"  type="text/css"/>

<style type="text/css">
    a[href="https://froala.com/wysiwyg-editor"], a[href="https://www.froala.com/wysiwyg-editor?k=u"] {
        display: none !important;
        position: absolute;
        top: -99999999px;
    }
</style>

{{--编辑器--}}
<!-- Include external JS libs. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
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