@extends('front.layouts.master')
@section('title',trans("front/home-blade.page_not_found"))
@section('seo_keyword',get_default_seo_keyword())
@section('seo_description',get_default_seo_description())
@section('content')
<div id="content" class="site-content container">
    <div id="main-content-row" class="tie-row main-content-row">
        <div class="main-content tie-col-md-12" role="main">
            <div class="container-404">
                <h2>404 :(</h2>
                <h3>@lang("front/home-blade.Sorry_deze_pagina_bestaat_niet")</h3>
                <h4>@lang("front/home-blade.It_looks_like_we_couldnt_find_what_you_were_looking_for_Research_can_help")</h4>
                <div id="content-404">
                    <form role="search" method="get" class="search-form" action="./">
                        <label> <span class="screen-reader-text">@lang("front/home-blade.serch")</span> <input type="search" class="search-field" placeholder="@lang("front/home-blade.what_are_you_looking_for")" name="s" /> </label> <input type="submit" class="search-submit" value="@lang("front/home-blade.serch")" />
                    </form>
                </div>
                <div id="menu-404">
                    <ul id="menu-404" class="menu">
                        <li id="menu-item-2613" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2613"><a href="{{ URL::route('site.index')}}" title="@lang('front/home-blade.home_page')">@lang('front/home-blade.home_page')</a></li>
                        <li id="menu-item-2613" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2613"><a href="{{ URL::route('about.index')}}" title="@lang('front/home-blade.about')">@lang('front/home-blade.about')</a></li>
                        <li id="menu-item-2610" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2610"><a href="{{ URL::route('privacy-policy.index')}}" title="@lang('front/home-blade.privacy_policy')">@lang('front/home-blade.privacy_policy')</a></li>
                        <li id="menu-item-2611" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2611"><a href="{{ URL::route('contact-us.index')}}" title="@lang('front/home-blade.contact_us')">@lang('front/home-blade.contact_us')</a></li>
                        <li id="menu-item-2612" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2612"><a href="{{ URL::route('sitemap')}}" title="@lang('front/home-blade.sitemap')">@lang('front/home-blade.sitemap')</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
