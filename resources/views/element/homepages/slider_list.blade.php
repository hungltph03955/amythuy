<div data-widget-id="wid__slider__5a780872c6b73"
     class="moto-widget moto-widget-slider moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto   moto-widget-slider-loader"
     data-widget="slider" data-preset="default">
    <ul class="moto-widget-slider-list"
        data-moto-slider-options="{&quot;slideshowEnabled&quot;:true,&quot;slideshowDelay&quot;:5,&quot;slideshowAnimationType&quot;:&quot;fade&quot;,&quot;showNextPrev&quot;:false,&quot;showPaginationDots&quot;:true,&quot;showSlideCaptions&quot;:true,&quot;itemsCount&quot;:3}">
        @foreach($imagesbanner as $image)
            <li><img src="{{asset($image->name)}}" alt="mt-1199_home_slider-1.jpg">
                <div class="bx-caption bx-caption_html moto-visible-on_mobile-h">
					<span class="moto-widget-text">
						<p class="moto-text_system_5">{{$image->banner}}</p><p
                                class="moto-text_system_3">{{$image->price}}</p><p
                                class="moto-text_system_12">&nbsp;</p><p
                                class="moto-text_system_12"><em>{{$image->description}}</em></p>                                </span>
                </div>
            </li>
        @endforeach
    </ul>
</div>
