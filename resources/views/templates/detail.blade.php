     <!DOCTYPE html>
     saved from url=(0070)/store/product/marinated-oysters/
     <html lang="en" data-ng-app="website">
     <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta property="http://ogp.me/ns#type" content="website">
        <meta property="http://ogp.me/ns#title" content="Marinated oysters">
        <meta property="http://ogp.me/ns#image" content="{{asset('files/mt-1199_products_vip02.jpg')}}">
        <meta property="http://ogp.me/ns#description" content="">
        <meta property="http://ogp.me/ns#url" content="/store/product/marinated-oysters/">
         <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Marinated oysters</title>
        <link rel="SHORTCUT ICON" href="{{asset('files/favicon.ico?_build=1517821507')}}" type="image/vnd.microsoft.icon">


        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{asset('public/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('files/assets.min.css')}}">
        <link rel="stylesheet" href="{{asset('files/styles.css')}}">
        <link rel="stylesheet" href="{{asset('files/styles(1).css')}}" id="moto-website-style">
        <link href="{{asset('files/main.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body class="moto-background">
        <div class="page">
            @include('include.detail.header')
            @include('include.detail.section_detail')
        </div>

        @include('include.detail.footer')

    <div data-moto-back-to-top-button="" class="moto-back-to-top-button">
        <a ng-click="toTop($event)" class="moto-back-to-top-button-link">
            <span class="moto-back-to-top-button-icon fa"></span>
        </a>
    </div>
    <script src="{{asset('files/website.assets.min.js')}}" type="text/javascript" data-cfasync="false"></script>
    <script type="text/javascript" data-cfasync="false">
        var websiteConfig = websiteConfig || {};
        websiteConfig.address = '/';
        websiteConfig.apiUrl = '/api.php';
        websiteConfig.preferredLocale = 'en_US';
        websiteConfig.preferredLanguage = websiteConfig.preferredLocale.substring(0, 2);
        websiteConfig.back_to_top_button = {"topOffset": 300, "animationTime": 500, "type": "theme"};
        websiteConfig.popup_preferences = {"loading_error_message": "The content could not be loaded."};
        websiteConfig.lazy_loading = {"enabled": true};
        angular.module('website.plugins', ["StoreWebsite"]);
    </script>
    <script src="{{asset('files/website.min.js')}}" type="text/javascript" data-cfasync="false"></script>
    <script src="{{asset('files/moto.store.site.min.js')}}" type="text/javascript"></script>
    @stack('scripts')

    </body>
    </html>