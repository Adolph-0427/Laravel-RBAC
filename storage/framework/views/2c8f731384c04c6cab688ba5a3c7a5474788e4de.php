<link href="https://cdn.bootcss.com/webuploader/0.1.1/webuploader.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/jquery/1.12.3/jquery.min.js"></script>
<script type="text/javascript"
        src="http://cdn.staticfile.org/webuploader/0.1.0/webuploader.js"></script>
<script>
    var server = "<?php echo e(url($server)); ?>";
    var pick = "<?php echo e($pick); ?>";
    uploadImg(server, pick);

    /**
     * server 上传地址
     * pick 调用ID名称
     * fileSizeLimit 文件大小 默认 1024
     * filetype 文件类型
     * mimeTypes MIME类型
     * */
    function uploadImg(server, pick, fileSizeLimit=10240, width=1600, height=1600, filetype='gif,jpg,jpeg,bmp,png', mimeTypes='image/*') {
        var jquery = jQuery.noConflict(true);
        jquery(function () {
            // 初始化Web Uploader
            var uploader = WebUploader.create({
                // 选完文件后，是否自动上传。
                auto: true,
                //验证文件总大小是否超出限制
                fileSizeLimit: fileSizeLimit,
                //文件上传请求的参数表
                formData: {
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                //配置压缩的图片
                compress: {
                    width: width,
                    height: height,
                    // 图片质量，只有type为`image/jpeg`的时候才有效。
                    quality: 90,
                    // 是否允许放大，如果想要生成小图的时候不失真，此选项应该设置为false.
                    allowMagnify: false,
                    // 是否允许裁剪。
                    crop: false,
                    // 是否保留头部meta信息。
                    preserveHeaders: true,
                    // 如果发现压缩后文件大小比原来还大，则使用原来图片
                    // 此属性可能会影响图片自动纠正功能
                    noCompressIfLarger: false,
                    // 单位字节，如果图片大小小于此值，不会采用压缩。
                    compressSize: 0
                },
                // swf文件路径
                swf: 'https://cdn.bootcss.com/webuploader/0.1.0/Uploader.swf',
                // 文件接收服务端。
                server: server,
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#' + pick,
                accept: {
                    title: 'upload',//文字描述
                    extensions: filetype,//允许的文件后缀，不带点，多个用逗号分割 String
                    mimeTypes: mimeTypes,//多个用逗号分割 String
                },
                duplicate: true,//支持再次上传
                fileNumLimit: 1,//上传单张
//                multiple:false,//是否开起同时选择多个文件能力
            });
            /**
             * 验证文件格式以及文件大小
             */
            uploader.on("error", function (handler) {
                alert(handler);
                if (type == "Q_TYPE_DENIED") {
                    console.log(type);
                    layer.msg("请上传JPG、PNG、GIF、BMP格式文件");
                } else if (type == "Q_EXCEED_SIZE_LIMIT") {
                    layer.msg("文件大小不能超过2M");
                } else {
                    layer.msg("上传出错！请检查后重新上传！错误代码" + type);
                }
            });

            // 当有文件被添加进队列的时候
            uploader.on('fileQueued', function (file) {
                var $list = $("#fileList");
                $list.append('<div id="' + file.id + '" class="item">' +
                    '<h4 class="info">' + file.name + '</h4>' +
                    '<p class="state">等待上传...</p>' +
                    '</div>');
            });
            // 文件上传过程中创建进度条实时显示。
            uploader.on('uploadProgress', function (file, percentage) {
                var $li = $('#' + file.id),
                    $percent = $li.find('.progress .progress-bar');

                // 避免重复创建
                if (!$percent.length) {
                    $percent = $('<div class="progress progress-striped active">' +
                        '<div class="progress-bar" role="progressbar" style="width: 0%">' +
                        '</div>' +
                        '</div>').appendTo($li).find('.progress-bar');
                }
                $li.find('p.state').text('上传中');
                $percent.css('width', percentage * 100 + '%');
            });
            uploader.on('uploadSuccess', function (file) {
                $('#' + file.id).find('p.state').text('已上传');
            });

            uploader.on('uploadError', function (file) {
                $('#' + file.id).find('p.state').text('上传出错');
            });

            uploader.on('uploadComplete', function (file) {
                $('#' + file.id).find('.progress').fadeOut();
            });

            $("#filePicker").click(function () {
                uploader.retry();
            });

        });

    }
</script>
