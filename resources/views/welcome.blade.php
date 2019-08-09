@include('includes.header')

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{$lattest_post->img}}" alt="post-image">
                            <div class="overlay"></div>
                            <a href="{{$lattest_post->img}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title text-center ">
                                        <a href="{{route('single.post', ['slug'=>$lattest_post->slug])}}">{{$lattest_post->title}}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$lattest_post->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">Video</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{$second_post->img}}" alt="seo">
                            <div class="overlay"></div>
                            <a href="{{$second_post->img}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title text-center">
                                        <a href="{{route('single.post', ['slug'=>$second_post->slug])}}">{{$second_post->title}}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$second_post->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">Video</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{$third_post->img}}" alt="post-image">
                            <div class="overlay"></div>
                            <a href="{{$third_post->img}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title text-center ">
                                        <a href="{{route('single.post', ['slug'=>$third_post->slug])}}">{{$third_post->title}}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$third_post->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">Video</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>
                </article>
            </div>
        </div>
      </div>
    <div class="container-fluid">
        <div class="row medium-padding60 bg-border-color ">
            <div class="container">
                <div class="col-lg-12">
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{$wordpress->name}}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                          @foreach($wordpress->post()->orderBy('created_at', 'desc')->take(3)->get() as $posts)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{$posts->img}}" alt="{{$posts->title}}">
                                    </div>
                                    <h6 class="case-item__title text-center"><a href="{{route('single.post', ['slug'=>$posts->slug])}}">{{$posts->title}}</a></h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                <div class="offers">
                  <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                      <div class="heading">
                          <h4 class="h1 heading-title">{{$laravel->name}}</h4>
                          <div class="heading-line">
                              <span class="short-line"></span>
                              <span class="long-line"></span>
                          </div>
                      </div>
                  </div>
                    <div class="row">
                      @foreach($laravel->post()->orderBy('created_at', 'desc')->take(3)->get() as $post)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb">
                                    <img src="{{$post->img}}" alt="{{$post->title}}">
                                </div>
                                <h6 class="case-item__title text-center"><a href="{{route('single.post', ['slug'=>$posts->slug])}}">{{$post->title}}</a></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="padded-50"></div>
                    <div class="offers">
                      <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                          <div class="heading">
                              <h4 class="h1 heading-title">{{$android->name}}</h4>
                              <div class="heading-line">
                                  <span class="short-line"></span>
                                  <span class="long-line"></span>
                              </div>
                          </div>
                      </div>
                    <div class="row">
                        <div class="case-item-wrap">
                          @foreach($android->post()->orderBy('created_at', 'desc')->take(3)->get() as $android)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{$android->img}}" alt="{{$android->title}}">
                                    </div>
                                    <h6 class="case-item__title text-center"><a href="{{route('single.post', ['slug'=>$posts->slug])}}">{{$android->title}}</a></h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
            </div>
            </div>
        </div>
    </div>

<!-- Subscribe Form -->

<!-- End Subscribe Form -->
</div>



<!-- Footer -->

@include('includes.footer')

<!-- End Footer -->
