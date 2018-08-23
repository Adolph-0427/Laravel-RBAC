<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog-Admin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" href="<?php echo e(URL::asset('/back/css/bootstrap.min.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(URL::asset('/back/css/bootstrap-responsive.min.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(URL::asset('/back/css/matrix-style.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(URL::asset('/back/css/matrix-media.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(URL::asset('/back/font-awesome/css/font-awesome.css')); ?>"/>
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800'>
    <?php echo $__env->yieldSection(); ?>
</head>
<body>
<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">BlogAdmin</a></h1>
</div>

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages">
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages"
               class="dropdown-toggle">
                <i class="icon icon-user"></i>
                <span class="text">欢迎 <?php echo e(session('user.username')); ?></span><b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i>我的资料</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> 我的任务</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo e(url('/logout')); ?>"><i class="icon-key"></i> 退出</a></li>
            </ul>
        </li>
        <li class="dropdown" id="menu-messages">
            <a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle">
                <i class="icon icon-envelope"></i>
                <span class="text">消息</span>
                <span class="label label-important">5</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> 新消息</a></li>
                <li class="divider"></li>
                <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> 收件箱</a></li>
                <li class="divider"></li>
                <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> 发件箱</a></li>
                <li class="divider"></li>
                <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> 发送</a></li>
            </ul>
        </li>
        <li class="">
            <a title="" href="#">
                <i class="icon icon-cog"></i>
                <span class="text">设置</span>
            </a>
        </li>
        <li class="">
            <a title="退出" href="<?php echo e(url('/logout')); ?>">
                <i class="icon icon-share-alt"></i>
                <span class="text">退出</span>
            </a>
        </li>
    </ul>
</div>

<!--start-top-serch-->
<div id="search">
    <input type="text" placeholder="请输入搜索内容..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i>
    </button>
</div>
<!--close-top-serch-->

<!--sidebar-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-list"></i>Forms</a>
    <ul>
        <li class="home"><a href="<?php echo e(url('/')); ?>"><i class="icon icon-home"></i> <span>首页</span></a></li>
        <li class="submenu" id="user"><a href="#"><i class="icon icon-user"></i> <span>用户</span> </a>
            <ul>
                <li><a href="<?php echo e(url('user')); ?>">用户列表</a></li>
                <li><a href="<?php echo e(url('user/create')); ?>">添加用户</a></li>
            </ul>
        </li>
        <li class="submenu" id="articles"><a href="#"><i class="icon icon-book"></i> <span>文章</span> </a>
            <ul>
                <li><a href="<?php echo e(url('articles')); ?>">文章列表</a></li>
                <li><a href="<?php echo e(url('articles/create')); ?>">添加文章</a></li>
            </ul>
        </li>
        <li class="submenu" id="articlesCategory"><a href="#"><i class="icon icon-book"></i> <span>文章分类</span> </a>
            <ul>
                <li><a href="<?php echo e(url('articlesCategory')); ?>">文章列表</a></li>
                <li><a href="<?php echo e(url('articlesCategory/create')); ?>">添加文章</a></li>
            </ul>
        </li>
        <li class="submenu" id="group"><a href="#"><i class="icon icon-book"></i> <span>用户组</span> </a>
            <ul>
                <li><a href="<?php echo e(url('group')); ?>">用户组列表</a></li>
                <li><a href="<?php echo e(url('group/create')); ?>">添加用户组</a></li>
            </ul>
        </li>
    </ul>
</div>


<div id="content">
    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    

    
    <div class="alert alert-error alert-block" style="display: none;">
        <a id="close-alert" style="float: right;font-size: 20px;" href="#">×</a>
        <h4 class="alert-heading">Error!</h4>
        <span>
            message!
        </span>
    </div>
    

    <div id="content-header">
        <div id="breadcrumb">
            <a href="<?php echo e(url('/')); ?>" title="Go to Home" class="tip-bottom">
                <i class="icon-home"></i>Home
            </a>
            <a href="<?php echo $__env->yieldContent('column_url','/'); ?>" class="tip-bottom" data-original-title=""><?php echo $__env->yieldContent('column','Blog'); ?></a>
            <a href="#"><?php echo $__env->yieldContent('title','Blog'); ?></a>
        </div>
        <h1><?php echo $__env->yieldContent('title','Blog'); ?></h1>
    </div>
    <?php echo $__env->yieldContent('content'); ?>
</div>

<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12">Copyright &copy; 2018.Company name All rights reserved.
        <a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a>
    </div>
</div>
<!--end-Footer-part-->


<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(URL::asset('/back/js/jquery.min.js')); ?>"></script>
    <script>
        $(function () {
           
            var url = "<?php echo e(url()->full()); ?>";//当前url
            var group_name = url.split('/')[3];
            if ($(".home a").attr('href') == url) {
                $(".home").addClass('active');
            }
            $(".submenu").each(function () {
                if (group_name == $(this).attr('id')) {
                    $(this).addClass('active');
                }
            })
        })

        
        function alerterror(error) {
            $(".alert-error").css("display", "block");
            $(".alert-error").find('span').text(error);
        }

        $("#close-alert").click(function () {
            $(".alert-error").css("display", "none");
        })

    </script>

    <script src="<?php echo e(URL::asset('/back/js/jquery.ui.custom.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/back/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/back/js/matrix.js')); ?>"></script>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
