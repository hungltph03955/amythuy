@extends('layouts.endUser.homepage')
@section('title'){{ __('messages.about') }}@endsection
@push('styles')
@endpush
@section('content')
    <!-- Title Page -->
    @include('element.section.title', [
            'titleCat' => __('messages.about'),
            'descriptionCat' => '',
            'imgCat' => asset('endUser/images/find-a-stylist.jpg')])

    <section class="bgwhite p-t-66 p-b-38">
        <div class="container">
            <div class="row">
                <div class="col-md-4 p-b-30">
                    <div class="hov-img-zoom">
                        <img src="{{asset(PATH_IMAGE_ABOUT.$getAbout->img)}}" alt="IMG-ABOUT">
                    </div>
                </div>

                <div class="col-md-8 p-b-30">
                    <h3 class="m-text26 p-t-15 p-b-16">
                        {{ $getAbout->name }}
                    </h3>
                    <p class="p-b-28">
                        {!!$getAbout->description!!}
                    </p>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection