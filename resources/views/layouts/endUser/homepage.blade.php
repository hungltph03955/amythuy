<!DOCTYPE html>
<html lang="en" data-ng-app="website">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="http://ogp.me/ns#type" content="website">
    <meta property="http://ogp.me/ns#title" content="">
    <meta property="http://ogp.me/ns#image" content="">
    <meta property="http://ogp.me/ns#description" content="">
    <meta property="http://ogp.me/ns#url" content="">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('endUser/images/icons/favicon.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('endUser/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/fonts/themify/themify-icons.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/fonts/elegant-font/html-css/style.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/vendor/slick/slick.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/css/util.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/css/main.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('endUser/css/main.min.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/vendor/noui/nouislider.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('endUser/css/style.css')}}">
    @stack('styles')
</head>

<body class="animsition">
<!-- Header -->

@include('element.section.header')
@include('element.section.search')
@yield('content')
@include('element.section.footer')
<!-- Back to top -->
<!-- <div class="btn-back-to-top bg0-hov" id="myBtn">
            <span class="symbol-btn-back-to-top">
                <i class="fa fa-angle-double-up" aria-hidden="true"></i>
            </span>
</div> -->

<!--===============CHAT ON START===============-->
<div id="small_chat">
    <div class="layout layout-expand">
        <div class="messenger_content">
            <div class="messenger_header">
                <h5 class="messenger_prompt">How can we help you?</h5>
                <span class="chat_close_icon"><i class="fa fa-window-close" aria-hidden="true"></i></span>
            </div>
            <div class="messenger_content">
                <div class="messages">
                    <div class="messages_list">Hello</div>
                    <div class="messages_list" style="float:right;font-weight: bold;">Ahihi</div>
                </div>
                <hr>
                <div class="messenger_input">
                    <input type="text" class="input_field" placeholder="Send a message...">
                    <span class="chat_close_icon"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Button togle chat-->
<div class="chat_on">
    <span class="chat_on_icon"><i class="fa fa-comments" aria-hidden="true"></i></span>
</div>
<!--===============CHAT ON END===============-->

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>

<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('endUser/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('endUser/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('endUser/vendor/bootstrap/js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('endUser/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('endUser/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('endUser/vendor/daterangepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('endUser/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('endUser/vendor/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('endUser/js/slick-custom.js')}}"></script>
<script type="text/javascript" src="{{asset('endUser/vendor/sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect2')
    });</script>
<!--===============================================================================================-->
<script src="{{asset('endUser/js/main.js')}}"></script>
<!-- <script src="{{asset('endUser/js/main.min.js')}}"></script> -->
<script src="{{asset('endUser/js/common.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-83777920-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-83777920-3');
</script>
@stack('scripts')
@if(Session::has('message.level'))
    <script>
        var message = "{{Session::get('message.content')}}";
        var type = "{{Session::get('message.level')}}";
        onSave(message, type)
    </script>
@endif
</body>
</html>