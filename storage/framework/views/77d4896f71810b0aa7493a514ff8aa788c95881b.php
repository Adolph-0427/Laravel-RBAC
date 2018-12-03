<?php $__env->startSection('column_url',url('articles')); ?>
<?php $__env->startSection('column','文章'); ?>
<?php $__env->startSection('title','列表'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <ul class="article-status">
                            <ol><a href="<?php echo e(url('articles?status=1')); ?>" status="1">待审核</a></ol>
                            <ol><a href="<?php echo e(url('articles?status=2')); ?>" status="2">已发布</a></ol>
                            <ol><a href="<?php echo e(url('articles?status=0')); ?>" status="0">垃圾箱</a></ol>
                        </ul>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>标题</th>
                                <th>描述</th>
                                <th>阅读量</th>
                                <th>状态</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($value->id); ?></td>
                                    <td><?php echo e($value->title); ?></td>
                                    <td><?php echo e($value->describe); ?></td>
                                    <td><?php echo e($value->views); ?></td>
                                    <td><?php echo e(articleStatus($value->status)); ?></td>
                                    <td><?php echo e($value->created_at); ?></td>
                                    <td>
                                        <a class="edit" href="<?php echo e(url('articles/'.$value->id.'/edit')); ?>">编辑</a>
                                        <?php if($status==0): ?>
                                            <form action="<?php echo e(url('articles/'.$value->id)); ?>" method="POST" id="delete">
                                                <input name="_method" value="DELETE" type="hidden">
                                                <?php echo csrf_field(); ?>
                                                <a class='delete' href="#" name="submit" onclick="$(this).parent().submit();return false">删除</a>
                                            </form>
                                        <?php endif; ?>
                                        <?php if($status==1): ?>
                                            <a class="edit" href="<?php echo e(url('articles/auditing?status=2&id='.$value->id)); ?>">审核</a>
                                            <?php elseif($status==2 || $status==1): ?>
                                            <a class="edit" href="<?php echo e(url('articles/auditing?status=0&id='.$value->id)); ?>">删除</a>
                                        <?php endif; ?>
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
    <script>
        $(".article-status a").each(function (key, value) {
            var v = $(value).attr('status');
            if(v == "<?php echo e($status); ?>"){
                $(this).css('color','#28b779');
            }
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Back.Common.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>