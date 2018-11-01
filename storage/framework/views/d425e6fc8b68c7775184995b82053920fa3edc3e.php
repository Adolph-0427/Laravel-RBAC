<link rel="stylesheet" href="<?php echo e(URL::asset('/back/css/tree/bootstrapStyle.css')); ?>"/>

<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo e(URL::asset('/back/js/tree/jquery.ztree.core.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/back/js/tree/jquery.ztree.excheck.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/back/js/tree/jquery.ztree.exedit.js')); ?>"></script>
<script>
    var _$ = jQuery.noConflict(true);
    var ID = "<?php echo e($tree); ?>";
    var idKey = ("<?php echo e($idKey); ?>" != '') ? "<?php echo e($idKey); ?>" : 'id';
    var pIdKey = ("<?php echo e($pIdKey); ?>" != '') ? "<?php echo e($pIdKey); ?>" : 'pId';
    var valueId = ("<?php echo e($valueId); ?>" != '') ? "<?php echo e($valueId); ?>" : 'id';

    var setting = {
        view: {
//            addHoverDom: addHoverDom,
//            removeHoverDom: removeHoverDom,
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
            },
            keep: {
                parent: true,
                leaf: true
            }
        },
        edit: {
            enable: false
        },
        callback: {
            beforeCheck: true,
            onCheck: onCheck,
        }
    };
    var zNodes = <?php echo $data; ?>;

    _$(document).ready(function () {
        _$.fn.zTree.init(_$("#" + ID), setting, zNodes);
        var treeObj = _$.fn.zTree.getZTreeObj(ID);
        treeObj.expandAll(true);
        //添加一个隐藏域
        $("#" + ID).append('<input type="hidden" name=' + valueId + '>');//选中
        $("#" + ID).append('<input type="hidden" name="cancel_ids">');//取消
    });

    var newCount = 1;

    //添加节点
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

    //删除节点
    function removeHoverDom(treeId, treeNode) {
        _$("#addBtn_" + treeNode.tId).unbind().remove();
    };

    //选择节点
    function onCheck() {
        var treeObj = _$.fn.zTree.getZTreeObj(ID),
            nodes = treeObj.getCheckedNodes(true),//选中的
            cancel = treeObj.getChangeCheckedNodes();//有变化的用于取消的
        ids = "";
        for (var i = 0; i < nodes.length; i++) {
            ids += nodes[i][valueId] + ",";
        }
        ids = ids.substring(0, ids.length - 1);
        $("input[name=" + valueId + "]").val(ids);
        cancelCheck(cancel);
    }

    //ajax 取消选中节点
    function cancelCheck(cancel) {
        cancel_ids = "";
        for (var i = 0; i < cancel.length; i++) {
            if (cancel[i]['checked'] == false) {
                cancel_ids += cancel[i][valueId] + ",";
            }
        }
        cancel_ids = cancel_ids.substring(0, cancel_ids.length - 1);
        $("input[name='cancel_ids']").val(cancel_ids);
    }

</script>