@extends('front.layouts.master')
@if(isset($car))
    @section('title',$slugTag.' '.$car->name.' '.trans("front/home-blade.in").' '.trans("front/home-blade.city").' '.get_default_country().' '.trans('front/home-blade.24_hours_a_day'))
    @section('seo_keyword',$slugTag.' '.$car->name)
    @section('seo_description',trans('front/home-blade.We_provide_you_with_the_best_service').' '.$slugTag.' '.$car->name. ' '.trans("front/home-blade.in_all_cities").' '.get_default_country().' '.trans('front/home-blade.24_hours_a_day'))
    @section('seo_image',$car->photo)
    @section('seo_url', URL::route('car.index',str_replace(' ', '-', $slugTag).'/'.$car ->slug))
@endif
@section('content')
    <style>

        .big-posts-box .posts-items li:nth-child(2n+1) {
            clear: none;
        }
        .mag-box .posts-items li {
            width: 20%;
             margin-top: 0px;
        }
        @media (max-width: 670px) {
            .big-posts-box .posts-items li {
                width:33%
            }
            .big-posts-box .posts-items li .post-title {
                font-size: 18px;

            }
        }
        @media (max-width: 670px) {
            .mag-box .posts-items li:not(:first-child) {
                margin-top: 0px
            }
        }

        .big-posts-box .posts-items li .post-title {
            font-size: 18px;

        }

    </style>

    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
                        <nav id="breadcrumb">
                            <a href="{{ URL::route('site.index')}}" title="@lang('front/home-blade.home_page')">@lang('front/home-blade.home_page')</a><em class="delimiter">/</em>
                            <a href="{{ URL::route('cars.index')}}" title="@lang('front/home-blade.all') @lang('front/home-blade.cars')">@lang('front/home-blade.all') @lang('front/home-blade.cars')</a><em class="delimiter">/</em>
                            <a href="{{ URL::route('car.index',$car ->slug)}}" title="{{$car ->name}}" >{{$car ->name}}</a><em class="delimiter">/</em>
                            <span  title="{{$slugTag.' '.$car ->name}}" >{{$slugTag.' '.$car ->name}}</span><em class="delimiter"></em>
                        </nav>


                        {{--Content of the article--}}
                        <div class="entry-content entry clearfix">
                            @if(isset($car_contents))
                                    {{-- @foreach($car_contents as $tag_content) --}}
                                    {{--Imgage of the car--}}
                                    <div class="featured-area">
                                        <div class="featured-area-inner">
                                            <figure class="single-featured-image">
                                                <img
                                                    width="780"
                                                    height="470"
                                                    src="{{$car_contents ->photo}}"
                                                    class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                                    alt="{{$slugTag.' '.$car ->name}}"
                                                    title="{{$slugTag.' '.$car ->name}}"
                                                    decoding="async"
                                                    data-main-img="1"
                                                    loading="lazy"
                                                />
                                            </figure>
                                        </div>
                                    </div>
                                    {{--Content of the article--}}
                                        <?php 
                                        $compiledTemplate = Blade::compileString($car_contents ->content);

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
                            <p>{!! $car ->description !!} </p>
                            
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
