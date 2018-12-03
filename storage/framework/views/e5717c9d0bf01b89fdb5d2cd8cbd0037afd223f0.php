<?php $__env->startSection('column_url',url('user')); ?>
<?php $__env->startSection('column','用户'); ?>
<?php $__env->startSection('title','修改密码'); ?>
<?php $__env->startSection('css'); ?>
##parent-placeholder-2f84417a9e73cead4d5c99e05daff2a534b30132##
<link rel="stylesheet" href="<?php echo e(URL::asset('/back/css/uniform.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(URL::asset('/back/css/select2.css')); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>修改密码</h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="<?php echo e(url('user/modifyPass')); ?>"  name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <?php echo csrf_field(); ?>
                        <div class="control-group">
                            <label class="control-label">原密码</label>
                            <div class="controls">
                                <input type="password" name="password" value="" class="required">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">新密码</label>
                            <div class="controls">
                                <input type="password" name="new_password" value="" class="required">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">确认新密码</label>
                            <div class="controls">
                                <input type="password" name="re_new_password" value="" class="required">
                            </div>
                        </div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
<script src="<?php echo e(URL::asset('/back/js/jquery.uniform.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/back/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/back/js/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/back/js/matrix.form_validation.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Back.Common.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>