<?php

use App\Models\Category;
use App\Models\News;
use App\Models\Socials;

$socials = Socials::orderBy('id', 'asc')->where('status', 'active')->get();
$news = News::orderBy('id', 'asc')->limit(3)->get();
$categories = Category::orderBy('id', 'asc')->limit(5)->get();
?>
<!-- partial:partials/_footer.html -->
<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-5">
          <img src="assets/images/logo.svg" class="footer-logo" alt="" />
          @foreach($socials as $item)
          <h5 class="font-weight-normal mt-4 mb-5">
            {{ $item->content}}
          </h5>
          @endforeach
          <ul class="social-media mb-3">
            <li>
              <a href="{{$item->facebook_link}}" target="_blank">
                <i class="mdi mdi-facebook"></i>
              </a>
            </li>
            <li>
              <a href="{{$item->youtube_link}}" target="_blank">
                <i class="mdi mdi-youtube"></i>
              </a>
            </li>
            <li>
              <a href="{{$item->twitter_link}}" target="_blank">
                <i class="mdi mdi-twitter"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-sm-4">
          <h3 class="font-weight-bold mb-3">RECENT NEWS</h3>
          <div class="row">
            @foreach($news as $item)
            <div class="col-sm-12">
              <div class="footer-border-bottom pb-2">
                <div class="row">
                  <div class="col-3">
                    <img src="/uploads/{{ $item->image }}" alt="thumb" class="img-fluid" />
                  </div>
                  <div class="col-9">
                    <h5 class="font-weight-600">
                      <a href="{{route('view-news',$item->slug) }}">
                        {{($item->title)}}
                      </a>
                    </h5>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <!-- <div class="row">
            <div class="col-sm-12">
              <div class="footer-border-bottom pb-2 pt-2">
                <div class="row">
                  <div class="col-3">
                    <img src="assets/images/dashboard/home_2.jpg" alt="thumb" class="img-fluid" />
                  </div>
                  <div class="col-9">
                    <h5 class="font-weight-600">
                      Cotton import from USA to soar was American traders
                      predict
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div>
                <div class="row">
                  <div class="col-3">
                    <img src="assets/images/dashboard/home_3.jpg" alt="thumb" class="img-fluid" />
                  </div>
                  <div class="col-9">
                    <h5 class="font-weight-600 mb-3">
                      Cotton import from USA to soar was American traders
                      predict
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <div class="col-sm-3">
          <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
          @foreach($categories as $item)
          <div class="footer-border-bottom pb-2">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0 font-weight-600"><a href="{{route ('view-categories',$item->slug)}}">{{$item->title}}</a></h5>
              <div class="count">{{$item->news->count()}}</div>
            </div>
          </div>
          @endforeach
          <!-- <div class="footer-border-bottom pb-2 pt-2">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0 font-weight-600">Business</h5>
              <div class="count">1</div>
            </div>
          </div>
          <div class="footer-border-bottom pb-2 pt-2">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0 font-weight-600">Sports</h5>
              <div class="count">1</div>
            </div>
          </div>
          <div class="footer-border-bottom pb-2 pt-2">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0 font-weight-600">Arts</h5>
              <div class="count">1</div>
            </div>
          </div>
          <div class="pt-2">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0 font-weight-600">Politics</h5>
              <div class="count">1</div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="d-sm-flex justify-content-between align-items-center">
            <div class="fs-14 font-weight-600">
              © 2023 @ copied by Rajesh Chaudhary.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- partial -->