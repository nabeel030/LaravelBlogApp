@include('includes.header')

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Tag: {{$tagId->tag}}</h1>
    </div>
</div>
<br><br>

<div class="container-fluid">
    <div class="row medium-padding60 bg-border-color ">
        <div class="container">
            <div class="col-lg-12">
            <div class="offers">
                <div class="row">
                    <div class="case-item-wrap">
                      @if($tagId->posts()->count() === 0)
                        <h4 class="text-center">Sorry! No Posts For This Tag Yet</h4>
                      @else
                      @foreach($tagId->posts()->orderBy('created_at','desc')->get() as $posts)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb">
                                    <img src="{{$posts->img}}" alt="{{$posts->title}}">
                                </div>
                                <h6 class="case-item__title text-center"><a href="{{route('single.post', ['slug'=>$posts->slug])}}">{{$posts->title}}</a></h6>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="padded-50"></div>
        </div>
    </div>
</div>

@include('includes.footer')
