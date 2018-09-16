<link rel="stylesheet" href="<?php echo e(URL::asset('/back/css/tree/bootstrapStyle.css')); ?>"/>

<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script src="<?php echo e(URL::asset('/back/js/tree/jquery.ztree.core.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/back/js/tree/jquery.ztree.excheck.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/back/js/tree/jquery.ztree.exedit.js')); ?>"></script>
<script>
    var _$ = jQuery.noConflict(true);
    var ID = "<?php echo e($tree); ?>";
    var idKey = ("<?php echo e($idKey); ?>" != '')  ? "<?php echo e($idKey); ?>" : 'id';
    var pIdKey = ("<?php echo e($pIdKey); ?>" != '')  ? "<?php echo e($pIdKey); ?>" : 'pId';

    var setting = {
        view: {
            addHoverDom: addHoverDom,
            removeHoverDom: removeHoverDom,
            selectedMulti: false
        },
        check: {
            enable: true
        },
        data: {
            simpleData: {
                enable: true,
                idKey: idKey,
                pIdKey: pIdKey,
            }
        },
        edit: {
            enable: true
        }
    };

    var zNodes = <?php echo $data; ?>;

    _$(document).ready(function () {
        _$.fn.zTree.init(_$("#" + ID), setting, zNodes);
    });

    var newCount = 1;

    function addHoverDom(treeId, treeNode) {
        var sObj = _$("#" + treeNode.tId + "_span");
        if (treeNode.editNameFlag || _$("#addBtn_" + treeNode.tId).length > 0) return;
        var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
            + "' title='add node' onfocus='this.blur();'></span>";
        sObj.after(addStr);
        var btn = _$("#addBtn_" + treeNode.tId);
        if (btn) btn.bind("click", function () {
            var zTree = _$.fn.zTree.getZTreeObj(ID);
            zTree.addNodes(treeNode, {
                id: (100 + newCount),
                pId: treeNode.id,
                name: "new node" + (newCount++)
            });
            return false;
        });
    };

    function removeHoverDom(treeId, treeNode) {
        _$("#addBtn_" + treeNode.tId).unbind().remove();
    };
</script>