@if (Auth::check())

    <style>

        html {
            margin-top: 32px !important;
        }


        #wpadminbar a.ab-item {
        color: #f0f0f1
        }

        #wpadminbar #wp-admin-bar-site-name a.ab-item {
        white-space: nowrap
        }

        #wpadminbar ul li:after,#wpadminbar ul li:before {
        content: normal
        }

        #wpadminbar a,#wpadminbar a img,#wpadminbar a img:hover,#wpadminbar a:hover {
        border: none;
        text-decoration: none;
        background: 0 0;
        box-shadow: none
        }

        #wpadminbar a:active,#wpadminbar a:focus,#wpadminbar div {
        box-shadow: none
        }

        #wpadminbar a:focus {
        outline-offset: -1px
        }

        #wpadminbar {
        line-height: 2.46153846;
        height: 32px;
        position: fixed;
        top: 0;
        right: 0;
        width: 100%;
        min-width: 600px;
        z-index: 99999;
        background: #1d2327
        }


        #wpadminbar ul#wp-admin-bar-root-default>li {
        margin-left: 0
        }


        #wpadminbar li {
        float: right
        }

        #wpadminbar .quicklinks .ab-top-secondary>li {
        float: left
        }

        #wpadminbar .quicklinks a {
        height: 32px;
        display: block;
        padding: 0 10px;
        margin: 0
        }

        #wpadminbar .quicklinks>ul>li>a {
        padding: 0 7px 0 8px
        }

        #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus,#wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item,#wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus {
        background: #2c3338;
        color: #72aee6
        }

        #wpadminbar .ab-item:before {
        position: relative;
        float: right;
        font: 20px/1 dashicons;
        speak: never;
        padding: 4px 0;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        background-image: none!important;
        margin-left: 6px
        }

        #wpadminbar .ab-item:before {
        color: #a7aaad;
        color: rgba(240,246,252,.6)
        }

        #wpadminbar .ab-item:before {
        position: relative;
        transition: color .1s ease-in-out
        }

        #wpadminbar li .ab-item:focus:before,#wpadminbar li:hover .ab-item:before {
        color: #72aee6
        }

        #wpadminbar .ab-top-secondary {
        float: left
        }

        #wpadminbar ul li:last-child,#wpadminbar ul li:last-child .ab-item {
        box-shadow: none
        }

        #wpadminbar #wp-admin-bar-wp-logo>.ab-item {
        padding: 0 7px
        }


        @media screen and (max-width: 782px) {
        html {
            --wp-admin--admin-bar--height:46px
        }

        html #wpadminbar {
            height: 46px;
            min-width: 240px
        }

        #wpadminbar * {
            font-size: 14px;
            font-weight: 400;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
            line-height: 2.28571428
        }

        #wpadminbar .quicklinks>ul>li>a {
            padding: 0;
            height: 46px;
            line-height: 3.28571428;
            width: auto
        }

        #wpadminbar #wp-admin-bar-site-name a.ab-item {
            text-overflow: clip
        }

        #wpadminbar #wp-admin-bar-wp-logo>.ab-item {
            padding: 0
        }

        #wpadminbar .ab-item:before {
            padding: 0
        }

        #wpadminbar #wp-admin-bar-site-name>.ab-item {
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            width: 52px;
            padding: 0;
            color: #a7aaad;
            position: relative
        }

        #wpadminbar .ab-item:before {
            padding: 0;
            margin-left: 0
        }

        #wpadminbar #wp-admin-bar-site-name>.ab-item:before {
            display: block;
            text-indent: 0;
            font: 32px/1 dashicons;
            speak: never;
            top: 7px;
            width: 52px;
            text-align: center;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        #wp-toolbar>ul>li {
            display: none
        }

        #wpadminbar li#wp-admin-bar-site-name,#wpadminbar li#wp-admin-bar-wp-logo {
            display: block
        }

        #wpadminbar ul#wp-admin-bar-root-default>li {
            margin-left: 0
        }

        #wpadminbar #wp-admin-bar-site-name,#wpadminbar #wp-admin-bar-wp-logo,#wpadminbar .ab-top-menu,#wpadminbar .ab-top-secondary {
            position: static
        }
        }

        @media screen and (max-width: 600px) {
            #wpadminbar {
                position:absolute
            }

            #wpadminbar li#wp-admin-bar-wp-logo {
                display: none;
            }
        }
    </style>

    <div id="wpadminbar" class="nojq">
        <div class="quicklinks" id="wp-toolbar">
            <ul id="wp-admin-bar-root-default" class="ab-top-menu">
                {{-- logo --}}
                <li id="wp-admin-bar-wp-logo"  class="menupop">

                    <a style="display: inline-flex" class="ab-item" href="{{route('admin.dashboard')}}">
                        <img style="width: 40px; height: 30px;;" alt="modern admin logo"
                        src="{{asset('assets/admin/images/logo/admin-bar-logo.png')}}">
                        <span style="margin: 0px 5px 0px 5px;">{{get_default_title()}} </span>
                    </a>
                </li>
                <li id="wp-admin-bar-site-name" class="menupop">
                    <?php $homepage_id = App\Models\Pages\HomePage::select('id')->first(); 
                    if($homepage_id){
                        $id = $homepage_id->id;
                    }
                    ?>
                    <a class="ab-item"  href="{{route('admin.home-page.edit',$id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.1em" style="color: #ffffff; margin: 0px 4px;" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path  fill="#ffffff" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg>                    
                    تحرير الصفحة الرئيسية</a>
                </li>
                <li id="wp-admin-bar-site-name" class="menupop">
                    <a class="ab-item"  href="{{route('admin.articles.create')}}"> 
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.1em" style=" margin: 0px 4px;" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                        أضافة مقالة جديدة</a>
                </li>
            </ul>
            {{-- user name --}}
            <ul id="wp-admin-bar-top-secondary" class="ab-top-secondary ab-top-menu">
                <li class="menupop">
                    <a class="ab-item" href="{{route('logout')}}">@lang('admin/dashboard-blade.logout') </a>
                </li>
                <li class="menupop">
                    <a class="ab-item" href="">@lang('admin/dashboard-blade.hi') <span class="display-name"> @if (Auth::check()){{ Auth::user()->name }} @endif</span></a>
                </li>
            </ul>
        </div>
    </div>
@endif
