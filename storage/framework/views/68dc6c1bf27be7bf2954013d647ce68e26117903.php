<!DOCTYPE html>
<html lang="en">

<head>
    <title>登录页面</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('/back/css/bootstrap.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('/back/css/bootstrap-responsive.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('/back/css/matrix-login.css')); ?>"/>
    <link href="<?php echo e(URL::asset('/back/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">
    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    

    
    <form class="form-horizontal" method="post" action="<?php echo e(url('login/login')); ?>" name="basic_validate" id="basic_validate" novalidate="novalidate">
        <?php echo csrf_field(); ?>
        <div class="control-group normal_text"><h3><img src="<?php echo e(URL::asset('/back/img/logo.png')); ?>" alt="Logo"/></h3>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"></i></span><input name="username" type="text" placeholder="用户名" class="required"/>
                </div>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input name="password" type="password" placeholder="密码" class="required"/>
                </div>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <img src="<?php echo e(captcha_src()); ?>" style="cursor: pointer;margin-bottom: 4px;" onclick="this.src='<?php echo e(captcha_src()); ?>'+Math.random()">
                    <input type="text" style="width: 60%" class="required form-control <?php echo e($errors->has('captcha')?'parsley-error':''); ?>" name="captcha" placeholder="验证码">
                </div>
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">忘记密码?</a></span>
            <span class="pull-right">
                
                <input type="submit" value="Save" class="btn btn-success">
            </span>

        </div>
    </form>
    
    <form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">请输入正确的用户名密码.</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text"   placeholder="E-mail address"/>
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; 返回登录</a></span>
            <span class="pull-right"><a class="btn btn-info"/>Send</a></span>
        </div>
    </form>
</div>

<script src="<?php echo e(URL::asset('/back/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/back/js/matrix.login.js')); ?>"></script>

<script src="<?php echo e(URL::asset('/back/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/back/js/matrix.js')); ?>"></script>

<script src="<?php echo e(URL::asset('/back/js/jquery.uniform.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/back/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/back/js/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/back/js/matrix.form_validation.js')); ?>"></script>
</body>

</html>
