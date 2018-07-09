@extends('layouts.endUser.homepage')
@section('title')
Blog
@endsection
@push('styles')
@endpush
@section('content')
<section class="bgwhite p-t-66 p-b-38">
    <div class="container">
        @if(!empty($listNews))
            @foreach($listNews as $new)
                <div class="row">
                    <div class="col-md-3 p-b-30">
                        <div class="hov-img-zoom blog-image">
                            @if(file_exists(public_path().PATH_IMAGE_NEWS. $new->img))
                                <img src="{{PATH_IMAGE_NEWS. $new->img}}"
                                     alt="{{$new->name}}">
                            @else
                                <img src="{{PATH_NO_IMAGE}}">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-9 p-b-30">
                        <h3 class="m-text26 p-t-15 p-b-16">{{$new->name}}</h3>
                        <p class="p-b-28">{{strEntitie($new->description, TEXT_DESCRIPTION)}}</p>

                        <div class="bo13 p-l-29 m-l-9 p-b-10">
                            <a href="{{route('endUser.blog.detail',['id'=> $new->id, 'slug'=> $new->slug])}}" class="s-text20">Continue Reading
                                <i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>

<section class="bgwhite">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 p-b-75">
                <div class="pagination flex-m flex-w p-t-26">
                    <div class="pagination-center endUserCategory">
                        {{$listNews->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection