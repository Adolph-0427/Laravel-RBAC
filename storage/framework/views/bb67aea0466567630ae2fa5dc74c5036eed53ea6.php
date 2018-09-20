<?php $__env->startSection('column_url',url('access')); ?>
<?php $__env->startSection('column','授权'); ?>
<?php $__env->startSection('title','菜单列表'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <hr/>
        <form class="form-horizontal" method="post" action="<?php echo e(url('access/store')); ?>" name="basic_validate" id="basic_validate"  novalidate="novalidate">
            <?php echo csrf_field(); ?>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <ul id="menu_tree" class="ztree"></ul>
                    </div>
                </div>
                <input type="hidden" name="rid" value="<?php echo e(Request('rid')); ?>">
                <div class="form-actions">
                    <input type="submit" value="Save" class="btn btn-success">
                    <button type="button" class="btn btn-danger btn-cancel">Cancel</button>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
    <script src="<?php echo e(URL::asset('/back/js/jquery.uniform.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/back/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/back/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/back/js/matrix.tables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Plug.treeview',array('tree'=>'menu_tree','data'=>$list,'idKey'=>'mid','pIdKey'=>'pid'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php echo $__env->make('Back.Common.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>