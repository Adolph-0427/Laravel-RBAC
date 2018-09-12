<?php $__env->startSection('column_url',url('user')); ?>
<?php $__env->startSection('column','用户'); ?>
<?php $__env->startSection('title','列表'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <input type="checkbox" id="title-checkbox" name="title-checkbox"/>
                        </span>
                        <h5>全部选择</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>用户</th>
                                <th>描述</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($value->uid); ?></td>
                                    <td><?php echo e($value->username); ?></td>
                                    <td><?php echo e($value->describe); ?></td>
                                    <td><?php echo e($value->created_at); ?></td>
                                    <td>
                                        <a class="edit" href="<?php echo e(url('user/'.$value->uid.'/edit')); ?>">编辑</a>
                                        <form action="<?php echo e(url('user/'.$value->uid)); ?>" method="POST" id="delete">
                                            <input name="_method" value="DELETE" type="hidden">
                                            <?php echo csrf_field(); ?>
                                            <a class='delete' href="#" name="submit" onclick="$(this).parent().submit();return false" >删除</a>
                                        </form>
                                        <a class="edit" href="<?php echo e(url('user/authorizationGroup?uid='.$value->uid)); ?>">授权用户组</a>
                                        <a class="edit" href="<?php echo e(url('user/authorizationRole?uid='.$value->uid)); ?>">授权角色</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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
    <script src="<?php echo e(URL::asset('/back/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/back/js/matrix.tables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Back.Common.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>