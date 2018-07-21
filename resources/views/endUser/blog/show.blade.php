@extends('layouts.endUser.homepage')
@section('title')
{{$newsDetail->name}}
@endsection
@push('styles')
@endpush
@section('content')
    <!-- breadcrumb -->
    <div class="bread-crumb bgwhite flex-w p-l-250 p-r-15 p-t-30 p-l-15-sm link-home-discount">
        <a href="/" class="s-text16">{{ __('messages.home') }}
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>
        <a href="{{route('endUser.blog.index')}}" class="s-text16">{{ __('messages.blog') }}
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>
        <span class="s-text17">{{$newsDetail->name}}</span>
    </div>
    <section class="bgwhite p-t-60 p-b-25">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 p-b-80">
                    <div class="p-r-50 p-r-0-lg">
                        <div class="p-b-40">
                            <div class="blog-detail-img wrap-pic-w">
                                @if(file_exists(public_path().PATH_IMAGE_NEWS. $newsDetail->img))
                                    <img src="{{PATH_IMAGE_NEWS. $newsDetail->img}}"
                                        alt="{{$newsDetail->name}}">
                                @else
                                    <img src="{{PATH_NO_IMAGE}}">
                                @endif
                            </div>

                            <div class="blog-detail-txt p-t-33">
                                <h4 class="p-b-11 m-text24">{{$newsDetail->name}}</h4>
                                <div class="s-text8 flex-w flex-m p-b-21">
                                    <span>By Admin
                                        <span class="m-l-3 m-r-6">|</span>
                                    </span>
                                    <span>{{$newsDetail->created_at}}</span>
                                </div>

                                <?php echo $newsDetail->description ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection