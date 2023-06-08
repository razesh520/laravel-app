<?php

use App\Models\Menu;
use App\Models\Socials;

$menus = Menu::orderBy('position', 'asc')->where([['status', 'active'], ['type', 'menu']])->get();
$ribbons = Menu::orderBy('position', 'asc')->where([['status', 'active'], ['type', 'ribbon']])->get();
$socials = Socials::orderBy('id', 'asc')->where('status', 'active')->get();
?>

<!-- partial:partials/_navbar.html -->
<header id="header">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="navbar-top">
        <div class="d-flex justify-content-between align-items-center">
          <ul class="navbar-top-left-menu">
            @foreach ($ribbons as $key => $ribbon)
            <li class="nav-item">
              <a href="{{$ribbon->url}}" class="nav-link">{{$ribbon->title}}</a>
            </li>
            @endforeach
          </ul>
          <ul class="navbar-top-right-menu">
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Sign in</a>
            </li> -->
          </ul>
        </div>
      </div>
      <div class="navbar-bottom">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <a class="navbar-brand" href="#"><img src="/assets/images/logo.svg" alt="" /></a>
          </div>
          <div>
            <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
              <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                <li>
                  <button class="navbar-close">
                    <i class="mdi mdi-close"></i>
                  </button>
                </li>
                @foreach ($menus as $key => $menu)
                <li class="nav-item ">
                  <a class="nav-link" href="{{$menu->url}}">{{$menu->title}}</a>
                </li>
                @endforeach
                <!-- <li class="nav-item">
                  <a class="nav-link" href="pages/magazine.html">MAGAZINE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/business.html">Business</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/sports.html">Sports</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/art.html">Art</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/politics.html">POLITICS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/travel.html">Travel</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/contactus.html">Contact</a>
                </li> -->
              </ul>
            </div>
          </div>
          <ul class="social-media">
            @foreach ($socials as $item)
            <li>
              <a href="{{$item->facebook_link}}" target="_blank">
                <i class="mdi mdi-facebook"></i>
              </a>
            </li>
            @endforeach
            @foreach ($socials as $item)
            <li>
              <a href="{{$item->youtube_link}}" target="_blank">
                <i class="mdi mdi-youtube"></i>
              </a>
            </li>
            @endforeach
            @foreach ($socials as $item)
            <li>
              <a href="{{$item->twitter_link}}" target="_blank">
                <i class="mdi mdi-twitter"></i>
              </a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>