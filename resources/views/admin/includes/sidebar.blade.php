<?php

$routeArray = app('request')->route()->getAction();
$controllerAction = class_basename($routeArray['controller']);
list($controller, $action) = explode('@', $controllerAction);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="http://localhost:5050/" target="_blank" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>



        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>    
                </li>
                <li class="nav-item <?= ($controller == 'PostsController') ? 'menu-open' : ''?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Manage Posts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('posts.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('posts.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Post</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($controller == 'StudentsController') ? 'menu-open' : ''?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Manage Students
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('students.index','')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('students.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Student</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($controller == 'NewsController') ? 'menu-open' : ''?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Manage News
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('news.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage News</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('news.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create News</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('signout')}}" class="nav-link" data-method="POST">
                        <i class="fas fa-sign-out nav-icon"></i>
                        <p>
                            Signout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>