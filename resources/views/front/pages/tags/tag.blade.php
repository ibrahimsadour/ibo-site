@extends('front.layouts.master')
@if(isset($tag))
    @section('title',$tag ->name.' '.'في'.' '.get_default_country())
    @section('seo_keyword',$tag ->seo_keyword)
    @section('seo_description',$tag ->seo_description)
    @section('seo_url', URL::route('tag.index',$tag ->slug) )
@endif
@section('content')
    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
                        <nav id="breadcrumb">
                            <a href="{{ URL::route('site.index')}}" title="الرئيسية">الرئيسية</a><em class="delimiter">/</em>
                            <a href="{{ URL::route('tags.index')}}" title="جميع العلامات الدلالية">جميع العلامات الدلالية</a><em class="delimiter">/</em>
                            <span  title="{{$tag->name}}" >{{$tag->name}}</span><em class="delimiter"></em>

                        </nav>

                        @if(isset($tag_contents))
                            {{-- @foreach($tag_contents as $tag_content) --}}
                            {{--Imgage of the car--}}
                            <div class="featured-area">
                                <div class="featured-area-inner">
                                    <figure class="single-featured-image">
                                        <img
                                            width="780"
                                            height="470"
                                            src="{{$tag_contents ->photo}}"
                                            class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                            alt="{{$tag->name}}"
                                            title="{{$tag->name}}"
                                            decoding="async"
                                            data-main-img="1"
                                            loading="lazy"
                                        />
                                    </figure>
                                </div>
                            </div>
                            {{--Content of the article--}}
                            <div class="entry-content entry clearfix">
                                <?php 
                                $compiledTemplate = Blade::compileString($tag_contents ->content);

                                $compiledTemplate = str_replace(['&',''], [';',''], $compiledTemplate);

                                eval("?>$compiledTemplate<?php");?>

                            </div>
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
                    </div>
                    @include('front.includes.first-main-sidebar')
                    @include('front.includes.second-main-sidebar')
                    @include('front.pages.articles.featured-articles')
                    {{--Content of the article--}}
                </div>
            </div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
