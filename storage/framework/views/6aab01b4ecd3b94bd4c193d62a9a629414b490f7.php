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
     * fileSizeLimit 文件大小 默认 1024 字节 1M=1024*1024
     * filetype 文件类型
     * mimeTypes MIME类型
     * */
    function uploadImg(server, pick, fileSizeLimit=1024 * 1024, width=1600, height=1600, filetype='gif,jpg,jpeg,bmp,png', mimeTypes='image/*') {
        var jquery = jQuery.noConflict(true);
        jquery(function () {
            // 初始化Web Uploader
            var uploader = WebUploader.create({
                // 选完文件后，是否自动上传。
                auto: false,
                //验证文件总大小是否超出限制
                fileSizeLimit: fileSizeLimit,
                //文件上传请求的参数表
                formData: {
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                //配置压缩的图片
//                compress: {
//                    width: width,
//                    height: height,
//                    // 图片质量，只有type为`image/jpeg`的时候才有效。
//                    quality: 90,
//                    // 是否允许放大，如果想要生成小图的时候不失真，此选项应该设置为false.
//                    allowMagnify: false,
//                    // 是否允许裁剪。
//                    crop: false,
//                    // 是否保留头部meta信息。
//                    preserveHeaders: true,
//                    // 如果发现压缩后文件大小比原来还大，则使用原来图片
//                    // 此属性可能会影响图片自动纠正功能
//                    noCompressIfLarger: false,
//                    // 单位字节，如果图片大小小于此值，不会采用压缩。
//                    compressSize: 0
//                },
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
                duplicate: false,//支持再次上传
                fileNumLimit: 1,//上传单张
                multiple: false,//是否开起同时选择多个文件能力
                thumb: {
                    width: 110,
                    height: 110,
                    // 图片质量，只有type为`image/jpeg`的时候才有效。
                    quality: 70,
                    // 是否允许放大，如果想要生成小图的时候不失真，此选项应该设置为false.
                    allowMagnify: true,
                    // 是否允许裁剪。
                    crop: true,
                    // 为空的话则保留原有图片格式。
                    // 否则强制转换成指定的类型。
                    type: 'image/jpeg'
                },
            });
            /**
             * 验证文件格式以及文件大小
             */
            uploader.on("error", function (handler) {
                if (handler == "Q_TYPE_DENIED") {
                    alert("请上传" + filetype + "格式文件");
                } else if (handler == "Q_EXCEED_SIZE_LIMIT") {
                    alert("文件大小不能超过" + fileSizeLimit / 1024 / 1024 + "M");
                } else if (handler == "Q_EXCEED_NUM_LIMIT") {
                    alert("文件个数超过上限");
                }
                else {
                    alert("上传出错！请检查后重新上传！错误代码" + handler);
                }
            });

            // 当有文件被添加进队列的时候
            uploader.on('fileQueued', function (file) {
                var $li = $(
                    '<div id="' + file.id + '" class="file-item thumbnail">' +
                    '<i class="icon-remove" style="cursor: pointer" onclick="removeUpload()"></i>' +
                    '<img id="thumb">' +
                    '<a href="javascript:;" class="btn btn-success">上传</a>' +
                    '</div>'
                    ),
                    $img = $li.find('img');

                $("#" + pick).append($li);
                // 创建缩略图
                // 如果为非图片文件，可以不用调用此方法。
                // thumbnailWidth x thumbnailHeight 为 100 x 100
                uploader.makeThumb(file, function (error, ret) {
                    if (error) {
                        $(".icon-remove").append('<span>无法预览</span>');
                    } else {
                        $img.attr('src', ret);
                    }
                }, 150, 150);

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
            //上传成功
            uploader.on('uploadSuccess', function (file, response) {
                $('#' + file.id).find('p.state').text('已上传');
                if ($('p.state').length > 1) {
                    $('p.state').eq(0).parent().remove();
                    $(".preview").eq(0).remove();
                }
                $("#" + pick).append('<img class="preview" style="width: auto;height: 20%;display: inherit;margin-top: 10px;" src=' + response._raw + '/>');
                $("#" + pick).append('<input type="hidden" name=' + pick + ' value=' + response._raw + '/>');
                uploader.removeFile(file);
            });
            //上传失败
            uploader.on('uploadError', function (file) {
                $('#' + file.id).find('p.state').text('上传出错');
            });

            uploader.on('uploadComplete', function (file) {
                $('#' + file.id).find('.progress').fadeOut();
            });
            // 所有文件上传成功后调用
            uploader.on('uploadFinished', function () {
                //清空队列
                uploader.reset();
            });

        });

    }

    //取消上传
    function removeUpload() {
        $("#WU_FILE_0").remove();
    }
</script>
