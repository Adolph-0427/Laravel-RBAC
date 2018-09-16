@extends('Back.Common.app')
@section('column_url',url('menu'))
@section('column','菜单')
@section('title','列表')
@section('content')
    <div class="container-fluid">
        <hr/>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <ul id="menu_tree" class="ztree"></ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
    <script src="{{ URL::asset('/back/js/jquery.uniform.js')}}"></script>
    <script src="{{ URL::asset('/back/js/select2.min.js')}}"></script>
    <script src="{{ URL::asset('/back/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('/back/js/matrix.tables.js')}}"></script>
@endsection
@include('Plug.treeview',array('tree'=>'menu_tree','data'=>$list,'idKey'=>'mid','pIdKey'=>'pid'))