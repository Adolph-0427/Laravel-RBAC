<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title','Blog')</title>
    <meta name="description"
          content="Free Html5 Templates and Free Responsive Themes Designed by Kimmy | zerotheme.com">
    <meta name="author" content="www.zerotheme.com">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="{{ URL::asset('/front/css/zerogrid.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/front/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/front/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/front/css/responsiveslides.css') }}">

    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="/front/js/html5.js"></script>
    <script src="/front/js/css3-mediaqueries.js"></script>
    <![endif]-->

    <link href="{{ URL::asset('/front/images/favicon.ico') }}" rel='icon' type='image/x-icon'/>

    <script src="{{ URL::asset('/front/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/front/js/responsiveslides.js') }}"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                pager: false,
                nav: true,
                speed: 500,
                maxwidth: 960,
                namespace: "centered-btns"
            });
        });
    </script>

</head>
<body>
<div class="container">
    <!--------------Header--------------->
    <header>
        <div id="logo"><a href=""><img src="{{ URL::asset('/front/images/logo.png') }}"/></a></div>
        <nav>
            <ul class="menu">
                @section('pc_menu')
                    <li><a href="index.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="column2.html">Column 2</a></li>
                    <li><a href="column3.html">Column 3</a></li>
                @show
            </ul>
            <div class="minimenu">
                <div>MENU</div>
                <select>
                    @section('app_menu')
                        <option>Home</option>
                        <option>Blog</option>
                        <option>Gallery</option>
                        <option>Contact</option>
                        <option>About</option>
                    @show
                </select>
            </div>
        </nav>
    </header>
    <!---------轮播图------------->
    @section('slider')
        <div class="feature">
            <div class="rslides_container">
                <ul class="rslides" id="slider">
                    <li><img src="{{ URL::asset('/front/images/1.jpg') }}"/></li>
                    <li><img src="{{ URL::asset('/front/images/2.jpg') }}"/></li>
                    <li><img src="{{ URL::asset('/front/images/3.jpg') }}"/></li>
                    <li><img src="{{ URL::asset('/front/images/4.jpg') }}"/></li>
                </ul>
            </div>
        </div>
    @show
<!--------------Content--------------->
    <section id="content">
        @yield('content')
    </section>
    <!--------------Footer--------------->
    @section('footer')
        <footer>
            <div class="zerogrid">
                <div class="row">
                    <section class="col-1-3">
                        <div class="heading">About us</div>
                        <div class="content">
                            Free Basic Html5 Templates created More Templates. You can use and modify the template for
                            both personal and commercial use. You must keep all copyright information and credit links
                            in the template and associated files.
                        </div>
                    </section>
                    <section class="col-1-3">
                        <div class="heading">Categories</div>
                        <div class="content">
                            <ul>
                                <li><a href="http://sc.chinaz.com">Free Html5 Templates</a></li>
                                <li><a href="http://sc.chinaz.com">Free Css3 Templates</a></li>
                                <li><a href="http://sc.chinaz.com">Free Responsive Html5 Templates</a></li>
                                <li><a href="http://sc.chinaz.com">Free Basic Html5 Templates</a></li>
                                <li><a href="http://sc.chinaz.com">Free Layout Html5 Templates</a></li>
                            </ul>
                        </div>
                    </section>
                    <section class="col-1-3">
                        <div class="heading">Featured Post</div>
                        <div class="content">
                            <table border="0px">
                                <tr>
                                    <td><img src="{{ URL::asset('/front/images/thumb5.jpg') }}"/></td>
                                    <td><img src="{{ URL::asset('/front/images/thumb6.jpg') }}"/></td>
                                    <td><img src="{{ URL::asset('/front/images/thumb7.jpg') }}"/></td>
                                </tr>
                                <tr>
                                    <td><img src="{{ URL::asset('/front/images/thumb6.jpg') }}"/></td>
                                    <td><img src="{{ URL::asset('/front/images/thumb7.jpg') }}"/></td>
                                    <td><img src="{{ URL::asset('/front/images/thumb5.jpg') }}"/></td>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </footer>
    @show

    <div id="copyright">
        <p>Copyright &copy; 2018.Adplph Blog.</p>
    </div>
</div>
<div style="display:none">
    <script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script>
</div>
</body>
</html>