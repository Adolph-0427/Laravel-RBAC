@extends('Back.Common.app')
@section('column_url',url('access'))
@section('column','授权')
@section('title','菜单列表')
@section('content')
    <div class="container-fluid">
        <hr/>
        <form class="form-horizontal" method="post" action="{{url('access/store')}}" name="basic_validate" id="basic_validate"  novalidate="novalidate">
            @csrf
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <ul id="menu_tree" class="ztree"></ul>
                    </div>
                </div>
                <input type="hidden" name="rid" value="{{Request('rid')}}">
                <div class="form-actions">
                    <input type="submit" value="Save" class="btn btn-success">
                    <button type="button" class="btn btn-danger btn-cancel">Cancel</button>
                </div>
            </div>
        </form>
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

