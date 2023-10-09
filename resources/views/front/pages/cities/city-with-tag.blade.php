@extends('front.layouts.master')
@if(isset($city))
    @section('title',$slugTag.' '.$city->name.' '.trans("front/home-blade.in").' '.get_default_country().' '.trans('front/home-blade.24_hours_a_day'))
    @section('seo_keyword',$slugTag.' '.$city->name)
    @section('seo_description',trans('front/home-blade.We_provide_you_with_the_best_service').' '.$slugTag.' '.trans("front/home-blade.in").' '.$city->name. ' '.trans("front/home-blade.and").' '.trans("front/home-blade.in_all_cities").' '.get_default_country().' '.trans('front/home-blade.24_hours_a_day'))
    @section('seo_image',asset('assets/images/pages/default_seo_image.webp'))
    @section('seo_url', URL::route('city.index',str_replace(' ', '-', $slugTag).'/'.$city ->slug))
@endif
@section('content')
    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
                        <nav id="breadcrumb">
                            <a href="{{ URL::route('site.index')}}" title="@lang('front/home-blade.home_page')">@lang('front/home-blade.home_page')</a><em class="delimiter">/</em>
                            <a href="{{ URL::route('cities.index')}}" title="@lang('front/home-blade.all') @lang('front/home-blade.cities')">@lang('front/home-blade.all') @lang('front/home-blade.cities')</a><em class="delimiter">/</em>
                            <a href="{{ URL::route('city.index',$city ->slug)}}" title="{{$city ->name}}" >{{$city ->name}}</a><em class="delimiter">/</em>
                            <span  title="{{$slugTag.' '.$city ->name}}" >{{$slugTag.' '.$city ->name}}</span><em class="delimiter"></em>

                        </nav>
                        {{--Content of the article--}}
                        <h2 class="post-title entry-title">@lang('front/home-blade.service') {{$slugTag}} {{$city->name}} @lang('front/home-blade.in') {{get_default_country()}}  @lang('front/home-blade.at_your_fingertips_24_hours_a_day_in_all_regions')</h2>

                        <div class="entry-content entry clearfix">

                                @if(isset($city_contents))
                                    {{-- @foreach($city_contents as $tag_content) --}}
                                    {{--Imgage of the car--}}
                                    <div class="featured-area">
                                        <div class="featured-area-inner">
                                            <figure class="single-featured-image">
                                                <img
                                                    width="780"
                                                    height="470"
                                                    src="{{$city_contents ->photo}}"
                                                    class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                                    alt="{{$slugTag.' '.$city ->name}}"
                                                    title="{{$slugTag.' '.$city ->name}}"
                                                    decoding="async"
                                                    data-main-img="1"
                                                    loading="lazy"
                                                />
                                            </figure>
                                        </div>
                                    </div>
                                    {{--Content of the article--}}
                                        <?php 
                                        $compiledTemplate = Blade::compileString($city_contents ->content);

                                        $compiledTemplate = str_replace(['&',''], [';',''], $compiledTemplate);

                                        eval("?>$compiledTemplate<?php");?>

                                        {{-- @endforeach --}}
                                @else
                                    <div class="featured-area">
                                        <div class="featured-area-inner">
                                            <figure class="single-featured-image">
                                                <img
                                                    width="780"
                                                    height="470"
                                                    src="{{asset('assets/images/pages/page-is-not-added.webp')}}"
                                                    class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                                    alt="page-is-not-added"
                                                    title="page-is-not-added"
                                                    decoding="async"
                                                    data-main-img="1"
                                                    loading="lazy"
                                                />
                                            </figure>
                                        </div>
                                    </div>
                                @endif
                        
                               
                                {{-- dynamic content --}}
                                <p>{!! $city ->description !!} </p>
                                <br>
                        </div>
                    </div>
                    @include('front.includes.first-main-sidebar')
                    @include('front.includes.second-main-sidebar')
                    @include('front.pages.articles.featured-articles')
                </div>
            </div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
