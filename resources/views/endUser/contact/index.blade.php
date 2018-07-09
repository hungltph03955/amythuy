@extends('layouts.endUser.homepage')
@section('title')
Contact for us
@endsection
@section('content')
<!-- Title Page -->
@include('element.detail.title', [
        'titleCat' => 'Contact',
        'descriptionCat' => '',
        'imgCat' => PATH_NO_IMAGE_CATEGORY])
<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-b-30">
                <div class="p-r-20 p-r-0-lg">
                    <div class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781"
                         data-pin="{{asset('endUser/images/icons/icon-position-map.png')}}" data-scrollwhell="0"
                         data-draggable="1"></div>
                </div>
            </div>

            <div class="col-md-6 p-b-30">
                <div class="block-billing">
                    <div class="block-title">Send us your message</div>
                    <div class="block-content">
                        {{ Form::open(['route' => 'endUser.contact.addContract', 'method' => 'POST']) }}
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22 {{$errors->has('name')? 'error' : ''}}" 
                                   value="{{ old('name') }}" type="text" name="name" placeholder="Full Name *">
                        </div>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22 {{$errors->has('email')? 'error' : ''}}" 
                                   value="{{ old('email') }}" type="email" name="email" placeholder="Email Address * ">
                        </div>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" 
                                   value="{{ old('phone_number') }}" type="number" name="phone_number" placeholder="Phone Number">
                        </div>
                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20 {{$errors->has('message')? 'error' : ''}}" 
                                  value="{{ old('message') }}" name="message" placeholder="Message *"></textarea>
                        <div class="w-size25">
                            <!-- Button -->
                            <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">Send</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div><!-- /block-billing -->
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
<script src="{{asset('endUser/js/map-custom.js')}}"></script>
@endpush