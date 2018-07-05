@extends('templates.homepage')
@section('content')
    <div class="container-fluid">
        <form class="form-horizontal" method="POST" action="{{action('Customer\AboutMeController@postContact')}} ">
            {{ csrf_field() }}
            <div class="row" data-container="container">
            <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                 style="" data-widget="row.column" data-container="container">
                <div data-widget-id="wid__store_breadcrumbs__5a7cfce1cedf6"
                     class="moto-widget moto-widget-store-breadcrumbs moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto"
                     data-widget="store_breadcrumbs">
                    <div class="container-fluid">
                    </div>

                    {{--<div>--}}
                        {{--<p class="moto-text_system_13">Contact Form</p>--}}
                        {{--<div data-widget-id="wid__divider_horizontal__5a80fa86e3b3a" class="moto-widget moto-widget-divider moto-preset-3 moto-align-left moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto  " data-widget="divider_horizontal" data-preset="3">--}}
                            {{--<hr class="moto-widget-divider-line" style="max-width:100%;width:100%;">--}}
                        {{--</div>--}}
                        {{--<form class="moto-widget-contact_form-form" role="form" name="contactForm" ng-submit="submit()" novalidate>--}}
                        {{--<div>--}}
                            {{--<label for="field_name" class="moto-text_system_14">Your Name *</label>--}}
                            {{--<br>--}}
                            {{--<input id="name" type="text" class="moto-widget-contact_form-label form-control col-md-12 col-md-offset-0" name="name"  required autofocus>--}}
                            {{--<span class="moto-wiget-contact_form-field-error ng-hide" ng-show="contactForm.name.emailInvalid &amp;&amp; !contactForm.name.$pristine">Incorrect email</span>--}}
                        {{--</div>--}}
                        {{--<br>--}}
                        {{--<br>--}}
                        {{--<div>--}}
                            {{--<label for="field_name" class="moto-text_system_14">Your Email *</label>--}}
                            {{--<br>--}}
                            {{--<input id="email" type="text" class="form-control col-md-12 col-md-offset-0" name="email"  required autofocus>--}}
                            {{--<span class="moto-widget-contact_form-field-error ng-hide" ng-show="contactForm.name.emailInvalid &amp;&amp; !contactForm.name.$pristine">Incorrect email</span>--}}
                        {{--</div>--}}
                        {{--<br>--}}
                        {{--<br>--}}
                        {{--<div>--}}
                            {{--<label for="field_name" class="moto-text_system_14">Enquiry</label>--}}
                            {{--<br>--}}
                            {{--<textarea class="form-control col-md-12 col-md-offset-0"--}}
                                      {{--name="detail" id="message" rows="5"></textarea>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="moto-widget-button-link moto-size-medium btn btn-primary" value="upload">--}}
                                    {{--Submit--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
                    <div class="form-style-6">
                        <h1>Contact Us</h1>
                        <h2>
                        <div class="moto-widget-text-content moto-widget-text-editable">
                            <p class="moto-text_system_9">OUR LOCATION
                            </p>
                        </div>
                        <div class="moto-widget moto-widget-row moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="sasa" style="" data-draggable-disabled="">
                            <div class="container-fluid">
                                <div class="row" data-container="container">
                                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                                        <div class="moto-widget moto-widget-row row-gutter-0 moto-justify-content_center moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="saaa" style="" data-draggable-disabled="">
                                            <div class="container-fluid">
                                                <div class="row" data-container="container">
                                                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-2 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                                                    </div><div class="moto-widget moto-widget-row__column moto-cell col-sm-10 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                                                        <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aaaa" data-animation="" data-draggable-disabled="">
                                                            <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_215"><a href="/" data-action="home_page" data-anchor="" class="moto-link">FOODER</a></p></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="maaa" data-animation="">
                                            <div class="moto-widget-text-content moto-widget-text-editable">
                                                <p class="moto-text_normal">
                                                    {{--<strong>--}}
                                                        {{--<span style="letter-spacing: 0px;">Fooder</span>--}}
                                                        {{--<br>--}}
                                                    {{--</strong>--}}
                                                </p>
                                                <p class="moto-text_normal">
                                                <span style="letter-spacing: 0px;">

                                                </span>
                                                    {{--<a href="/" target="_self" data-action="url" class="moto-link">--}}
                                                        {{--<span style="letter-spacing: 0px;">Home page</span>--}}
                                                        {{--<br>--}}
                                                    {{--</a>--}}
                                                <div class="form-group">
                                                    <a href="mailto:Nemo.luong@innovatube.com">Send Email To Us</a>
                                                </div>
                                                <span style="letter-spacing: 0px;">

                                                </span>
                                                <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                                        <div class="moto-widget moto-widget-row moto-justify-content_center moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-grid-type="xs" data-widget="row" data-spacing="sasa" style="">
                                            <div class="container-fluid">
                                                <div class="row" data-container="container">
                                                    <div class="moto-widget moto-widget-row__column moto-cell col-xs-3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                                                        <div class="moto-widget moto-widget-container moto-container_content_59dbfc4423" data-widget="container" data-container="container" data-css-name="moto-container_content_59dbfc4423">
                                                            <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="sasa" data-animation="">
                                                                <div class="moto-widget-text-content moto-widget-text-editable"><p style="text-align: center;" class="moto-text_system_8"><span class="moto-color_custom1"><span class="fa"></span></span></p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="moto-widget moto-widget-row__column moto-cell col-xs-9 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                                                        <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aaaa" data-animation="">
                                                            <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_normal"><strong>Telephone</strong><br></p><p class="moto-text_normal"><strong>​​​​​​​</strong><a href="callto:#" target="_self" data-action="url" class="moto-link">800 1234 56 78</a><br></p></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><div class="moto-widget moto-widget-row moto-justify-content_center moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-grid-type="xs" data-widget="row" data-spacing="aasa" style="" data-draggable-disabled="">
                                            <div class="container-fluid">
                                                <div class="row" data-container="container">
                                                    <div class="moto-widget moto-widget-row__column moto-cell col-xs-3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                                                        <div class="moto-widget moto-widget-container moto-container_content_59dbfcd324" data-widget="container" data-container="container" data-css-name="moto-container_content_59dbfcd324" data-draggable-disabled="">
                                                            <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="sasa" data-animation="" data-draggable-disabled="">
                                                                <div class="moto-widget-text-content moto-widget-text-editable"><p style="text-align: center;" class="moto-text_system_8"><span class="moto-color_custom1"><span class="fa"></span></span></p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="moto-widget moto-widget-row__column moto-cell col-xs-9 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                                                        <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aaaa" data-animation="">
                                                            <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_normal"><strong></strong><strong>Comments<br></strong>We are glad to hear from you<a target="_self" data-action="url" class="moto-link" href="callto:#"></a></p></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                                        <div class="moto-widget moto-widget-row moto-justify-content_center moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-grid-type="xs" data-widget="row" data-spacing="sasa" style="" data-draggable-disabled="">
                                            <div class="container-fluid">
                                                <div class="row" data-container="container">
                                                    <div class="moto-widget moto-widget-row__column moto-cell col-xs-3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                                                        <div class="moto-widget moto-widget-container moto-container_content_59dbfd4525" data-widget="container" data-container="container" data-css-name="moto-container_content_59dbfd4525">
                                                            <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="sasa" data-animation="">
                                                                <div class="moto-widget-text-content moto-widget-text-editable"><p style="text-align: center;" class="moto-text_system_8"><span class="moto-color_custom1"></span><span class="moto-color_custom1"><span class="fa"></span></span></p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="moto-widget moto-widget-row__column moto-cell col-xs-9 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                                                        <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aaaa" data-animation="" data-draggable-disabled="">
                                                            <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_normal"><strong></strong><strong>Opening Hours<br></strong>7 Days a week from 9:00 am to 7:00 pm<a target="_self" data-action="url" class="moto-link" href="callto:#"></a></p></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </h2>
                        <form>
                            <div class="form-css">
                            <input type="text" name="name" placeholder="Your Name" />
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                            </div>
                            <div class="form-css">

                            <input type="email" name="email" placeholder="Email Address" />
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            </div>

                            <div class="form-css">

                                <textarea name="detail" placeholder="Type your Message"></textarea>
                            @if ($errors->has('detail'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('detail') }}</strong>
                                    </span>
                            @endif
                            </div>

                            <input type="submit" value="Send" />
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </div>
    <style type="text/css">
        .form-css{
            margin-bottom: 10%;
            margin-left: 7%;
        }
        .form-style-6{
            font: 95% Arial, Helvetica, sans-serif;
            max-width: 1000px;
            margin: 10px auto;
            padding: 16px;
            background: #F7F7F7;
        }
        .form-style-6 h1{
            background: #1f1f1f;
            padding: 25px 0;
            font-size: 150%;
            font-weight: 300;
            text-align: center;
            color: white;
            margin: -16px -16px 16px -16px;
        }
        .form-style-6 h2{
            background: #1f1f1f;
            padding: 25px 0;
            font-size: 150%;
            font-weight: 300;
            text-align: center;
            color: white;
            margin: -16px -16px 16px -16px;
        }
        .form-style-6 input[type="text"],
        .form-style-6 input[type="date"],
        .form-style-6 input[type="datetime"],
        .form-style-6 input[type="email"],
        .form-style-6 input[type="number"],
        .form-style-6 input[type="search"],
        .form-style-6 input[type="time"],
        .form-style-6 input[type="url"],
        .form-style-6 textarea,
        .form-style-6 select
        {
            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;
            outline: none;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            width: 100%;
            background: #fff;
            margin-bottom: 2%;
            border: 1px solid #ccc;
            padding: 3%;
            color: #555;
            font: 95% Arial, Helvetica, sans-serif;
        }
        .form-style-6 input[type="text"]:focus,
        .form-style-6 input[type="date"]:focus,
        .form-style-6 input[type="datetime"]:focus,
        .form-style-6 input[type="email"]:focus,
        .form-style-6 input[type="number"]:focus,
        .form-style-6 input[type="search"]:focus,
        .form-style-6 input[type="time"]:focus,
        .form-style-6 input[type="url"]:focus,
        .form-style-6 textarea:focus,
        .form-style-6 select:focus
        {
            box-shadow: 0 0 5px #43D1AF;
            padding: 3%;
            border: 1px solid #43D1AF;
        }

        .form-style-6 input[type="submit"],
        .form-style-6 input[type="button"]{
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            width: 100%;
            padding: 3%;
            background: grey;
            border-bottom: 2px solid grey;
            border-top-style: none;
            border-right-style: none;
            border-left-style: none;
            color: white;
        }
        .form-style-6 input[type="submit"]:hover,
        .form-style-6 input[type="button"]:hover{
            background: #2EBC99;
        }
    </style>
@endsection