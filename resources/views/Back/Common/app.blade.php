<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog-Admin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    @section('css')
        <link rel="stylesheet" href="{{ URL::asset('/back/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('/back/css/bootstrap-responsive.min.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('/back/css/matrix-style.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('/back/css/matrix-media.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('/back/font-awesome/css/font-awesome.css') }}"/>
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800'>
    @show
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
                <span class="text">欢迎 {{session('user.username')}}</span><b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i>我的资料</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> 我的任务</a></li>
                <li class="divider"></li>
                <li><a href="{{url('/logout')}}"><i class="icon-key"></i> 退出</a></li>
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
            <a title="退出" href="{{url('/logout')}}">
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
        <li class="home"><a href="{{url('/')}}"><i class="icon icon-home"></i> <span>首页</span></a></li>
        <li class="submenu" id="user"><a href="#"><i class="icon icon-user"></i> <span>用户</span> </a>
            <ul>
                <li><a href="{{url('user')}}">用户列表</a></li>
                <li><a href="{{url('user/create')}}">添加用户</a></li>
            </ul>
        </li>
        <li class="submenu" id="articles"><a href="#"><i class="icon icon-book"></i> <span>文章</span> </a>
            <ul>
                <li><a href="{{url('articles')}}">文章列表</a></li>
                <li><a href="{{url('articles/create')}}">添加文章</a></li>
            </ul>
        </li>
        <li class="submenu" id="group"><a href="#"><i class="icon icon-book"></i> <span>用户组</span> </a>
            <ul>
                <li><a href="{{url('group')}}">用户组列表</a></li>
                <li><a href="{{url('group/create')}}">添加用户组</a></li>
            </ul>
        </li>
    </ul>
</div>


<div id="content">
    {{--错误消息(后台返回)--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{--错误消息(后台返回)--}}

    {{--自定义错误--}}
    <div class="alert alert-error alert-block" style="display: none;">
        <a id="close-alert" style="float: right;font-size: 20px;" href="#">×</a>
        <h4 class="alert-heading">Error!</h4>
        <span>
            message!
        </span>
    </div>
    {{--自定义错误--}}

    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{url('/')}}" title="Go to Home" class="tip-bottom">
                <i class="icon-home"></i>Home
            </a>
            <a href="@yield('column_url','/')" class="tip-bottom" data-original-title="">@yield('column','Blog')</a>
            <a href="#">@yield('title','Blog')</a>
        </div>
        <h1>@yield('title','Blog')</h1>
    </div>
    @yield('content')
</div>

<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12">Copyright &copy; 2018.Company name All rights reserved.
        <a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a>
    </div>
</div>
<!--end-Footer-part-->
{{--菜单高亮--}}

@section('js')
    <script src="{{ URL::asset('/back/js/jquery.min.js') }}"></script>
    <script>
        $(function () {
           {{--导航高亮--}}
            var url = "{{url()->full()}}";//当前url
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

        {{--自定义弹窗--}}
        function alerterror(error) {
            $(".alert-error").css("display", "block");
            $(".alert-error").find('span').text(error);
        }

        $("#close-alert").click(function () {
            $(".alert-error").css("display", "none");
        })

    </script>

    <script src="{{ URL::asset('/back/js/jquery.ui.custom.js') }}"></script>
    <script src="{{ URL::asset('/back/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/back/js/matrix.js') }}"></script>
@show

</body>
</html>
