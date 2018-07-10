<section class="blog bgwhite p-b-65">
    <div class="container">
        <div class="sec-title p-b-52">
            <h3 class="m-text5 t-center">Our Blog</h3>
        </div>

        <div class="row">
            @foreach($news as $new)
                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="{{route('endUser.blog.detail',['id'=> $new->id, 'slug'=> $new->slug])}}" class="block3-img dis-block hov-img-zoom">
                            @if(file_exists(public_path().PATH_IMAGE_NEWS. $new->img))
                                <img src="{{PATH_IMAGE_NEWS. $new->img}}"
                                        alt="{{$new->name}}">
                            @else
                                <img src="{{PATH_NO_IMAGE}}">
                            @endif
                        </a>
                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="{{route('endUser.blog.detail',['id'=> $new->id, 'slug'=> $new->slug])}}" class="s-text20">{{$new->name}}</a>
                            </h4>
                            <span class="s-text6">By Admin</span>
                            <span class="s-text6">on {{$new->created_at->format('M d Y')}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>