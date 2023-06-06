@extends('layouts.default')

@section('title', 'Home Page')

@section('content')
<div class="flash-news-banner">
    <div class="container">
        <div class="d-lg-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <span class="badge badge-dark mr-3">Flash news</span>
                <p class="mb-0">
                    Lorem Ipsum has been the industry's standard dummy text ever
                    since the 1500s.
                </p>
            </div>
            <div class="d-flex">
                <span class="mr-3 text-danger">Wed, March 4, 2020</span>
                <span class="text-danger">30°C,London</span>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-xl-8 stretch-card grid-margin">
                <div class="position-relative">
                    <img src="assets/images/dashboard/banner.jpg" alt="banner" class="img-fluid" />
                    <div class="banner-content">
                        <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                            global news
                        </div>
                        <h1 class="mb-0">GLOBAL PANDEMIC</h1>
                        <h1 class="mb-2">
                            Coronavirus Outbreak LIVE Updates: ICSE, CBSE Exams
                            Postponed, 168 Trains
                        </h1>
                        <div class="fs-12">
                            <span class="mr-2">Photo </span>10 Minutes ago
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 stretch-card grid-margin">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h2> Latest News </h2>
                        @foreach($news as $key=> $item)
                        @if($key<=2) <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                            <div class="pr-3">
                                <a href="{{route('view-news',$item->id) }}">
                                    {{strlen($item->title) > 20 ? substr($item->title,0,20)."..." : $item->title;}}
                                </a>
                                <div class="fs-12">
                                    <span class="mr-2"></span>{{$item->category}}
                                </div>
                            </div>
                            <div class="rotate-img">
                                <img src="{{ asset('uploads/' . $item->image) }}" alt="thumb" class="img-fluid img-lg" style="width: 100px;" />
                            </div>
                    </div>
                    @endif
                    @endforeach

                    <!-- <div class="d-flex border-bottom-blue pb-4 pt-4 align-items-center justify-content-between">
                            <div class="pr-3">
                                <h5>Virus Kills Member Of Advising Iran’s Supreme</h5>
                                <div class="fs-12">
                                    <span class="mr-2">Photo </span>10 Minutes ago
                                </div>
                            </div>
                            <div class="rotate-img">
                                <img src="assets/images/dashboard/home_2.jpg" alt="thumb" class="img-fluid img-lg" />
                            </div>
                        </div>

                        <div class="d-flex pt-4 align-items-center justify-content-between">
                            <div class="pr-3">
                                <h5>Virus Kills Member Of Advising Iran’s Supreme</h5>
                                <div class="fs-12">
                                    <span class="mr-2">Photo </span>10 Minutes ago
                                </div>
                            </div>
                            <div class="rotate-img">
                                <img src="assets/images/dashboard/home_3.jpg" alt="thumb" class="img-fluid img-lg" />
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row" data-aos="fade-up">
        <div class="col-lg-3 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2>Category</h2>
                    <ul class="vertical-menu">
                        @foreach($categories as $item)
                        <li><a href="{{route ('view-categories',$item->id)}}">{{$item->title}}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    @foreach($news as $item)
                    <div class="row">
                        <div class="col-sm-4 grid-margin">
                            <div class="position-relative">
                                <div class="rotate-img">
                                    <img src="/uploads/{{ $item->image }}" alt="thumb" class="img-fluid" />
                                </div>
                                <div class="badge-positioned">
                                    <span class="badge badge-danger font-weight-bold">{{$item->category}} </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8  grid-margin">
                            <h2 class="mb-2 font-weight-600">
                                {{$item->title}}
                            </h2>
                            <div class="fs-13 mb-2">
                                <span class="mr-2">{{$item->created_by}} </span>{{$item->created_at}}
                            </div>
                            <p class="mb-0">
                                {{strlen(strip_tags($item->content)) > 50 ? substr(strip_tags($item->content),0,50)."..." : strip_tags($item->content);}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                    <!--    
                        <div class="row">
                            <div class="col-sm-4 grid-margin">
                                <div class="position-relative">
                                    <div class="rotate-img">
                                        <img src="assets/images/dashboard/home_5.jpg" alt="thumb" class="img-fluid" />
                                    </div>
                                    <div class="badge-positioned">
                                        <span class="badge badge-danger font-weight-bold">Flash news</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8  grid-margin">
                                <h2 class="mb-2 font-weight-600">
                                    No charges over 2017 Conservative battle bus cases
                                </h2>
                                <div class="fs-13 mb-2">
                                    <span class="mr-2">Photo </span>10 Minutes ago
                                </div>
                                <p class="mb-0">
                                    Lorem Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="position-relative">
                                    <div class="rotate-img">
                                        <img src="assets/images/dashboard/home_6.jpg" alt="thumb" class="img-fluid" />
                                    </div>
                                    <div class="badge-positioned">
                                        <span class="badge badge-danger font-weight-bold">Flash news</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h2 class="mb-2 font-weight-600">
                                    Kaine: Trump Jr. may have committed treason
                                </h2>
                                <div class="fs-13 mb-2">
                                    <span class="mr-2">Photo </span>10 Minutes ago
                                </div>
                                <p class="mb-0">
                                    Lorem Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an
                                </p>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row" data-aos="fade-up">
        <div class="col-sm-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-title">
                                Video
                            </div>
                            <div class="row">
                                @foreach($videos as $item)
                                <div class="col-sm-6 grid-margin">
                                    <div class="position-relative">
                                        <!--
                                             if need to display thumbnail and play video to another tab
                                             by provided url uncomment ta commented part and comment iframe and add/update
                                             video url with url insted of outube video id
                                             -->

                                        <!-- <div class="rotate-img">
                                                <img src="/uploads/{{ $item->image }}" alt="thumb" class="img-fluid" />
                                            </div>
                                            <div class="badge-positioned w-90">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="badge badge-danger font-weight-bold">Lifestyle</span>
                                                    <div class="video-icon">
                                                        <a href="{{$item->url}}" target="_blank"><i class="mdi mdi-play"></i></a>
                                                    </div>
                                                </div>
                                            </div> -->
                                        <h4 class="font-weight-400 mb-1">{{$item->title}}</h4>
                                        <iframe width="100%" height="auto" src="http://www.youtube.com/embed/{{$item->url}}?autoplay=1" frameborder="1" allowfullscreen></iframe>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card-title">
                                    Latest Video
                                </div>
                                <p class="mb-3">See all</p>
                            </div>
                            @foreach($videos as $item)
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                                <div class="div-w-80 mr-3">
                                    <div class="rotate-img">
                                        <img src="/uploads/{{ $item->image }}" alt="thumb" class="img-fluid" />
                                    </div>
                                </div>
                                <h3 class="font-weight-600 mb-0"><a href="https://www.youtube.com/watch?v={{$item->url}}" target="_blank">{{$item->title}}</a></h3>
                            </div>
                            @endforeach
                            <!-- <div class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2">
                                    <div class="div-w-80 mr-3">
                                        <div class="rotate-img">
                                            <img src="assets/images/dashboard/home_12.jpg" alt="thumb" class="img-fluid" />
                                        </div>
                                    </div>
                                    <h3 class="font-weight-600 mb-0">
                                        SEO Strategy & Google Search
                                    </h3>
                                </div>
                                <div class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2">
                                    <div class="div-w-80 mr-3">
                                        <div class="rotate-img">
                                            <img src="assets/images/dashboard/home_13.jpg" alt="thumb" class="img-fluid" />
                                        </div>
                                    </div>
                                    <h3 class="font-weight-600 mb-0">
                                        Cycling benefit & disadvantag
                                    </h3>
                                </div>
                                <div class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2">
                                    <div class="div-w-80 mr-3">
                                        <div class="rotate-img">
                                            <img src="assets/images/dashboard/home_14.jpg" alt="thumb" class="img-fluid" />
                                        </div>
                                    </div>
                                    <h3 class="font-weight-600">
                                        The Major Health Benefits of
                                    </h3>
                                </div>
                                <div class="d-flex justify-content-between align-items-center pt-3">
                                    <div class="div-w-80 mr-3">
                                        <div class="rotate-img">
                                            <img src="assets/images/dashboard/home_15.jpg" alt="thumb" class="img-fluid" />
                                        </div>
                                    </div>
                                    <h3 class="font-weight-600 mb-0">
                                        Powerful Moments of Peace
                                    </h3>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" data-aos="fade-up">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Sport light
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="row">
                                @foreach($sports as $key => $item)
                                @if($key == 0)
                                <div class="col-xl-12 col-lg-8 col-sm-6">
                                    <div class="rotate-img">
                                        <img src="/uploads/{{ $item->image }}" alt="thumb" class="img-fluid" />
                                    </div>
                                    <h2 class="mt-3 text-primary mb-2">{{$item->title}}</h2>
                                    <p class="fs-13 mb-1 text-muted">
                                        <span class="mr-2"> </span>
                                    </p>
                                    <p class="my-3 fs-15">
                                        {{$item->content}}
                                    </p>
                                    <a href="#" class="font-weight-600 fs-16 text-dark">{{$item->updated_at}}</a>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    @foreach($sports as $key => $item)
                                    @if($key != 0)
                                    <div class="border-bottom pb-3">
                                        <div class="rotate-img">
                                            <img src="/uploads/{{ $item->image }}" alt="thumb" class="img-fluid" />
                                        </div>
                                        <p class="fs-16 font-weight-600 mb-0 mt-3">
                                            {{$item->title}}
                                        </p>
                                        <p class="fs-13 text-muted mb-0">
                                            <span class="mr-2">Creator</span>{{$item->created_at}}
                                        </p>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop