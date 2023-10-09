@extends('front.layouts.master')
@if(isset($city))
    @section('title',trans('front/home-blade.all_city_services').' '.$city ->name)
    @section('seo_keyword','')
    @section('seo_description','')
    @section('seo_url', URL::route('city.index',$city ->slug) )
@endif
@section('content')

    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <nav id="breadcrumb">
                <a href="{{ URL::route('site.index') }}" title="@lang('front/home-blade.home_page')">@lang('front/home-blade.home_page')</a><em class="delimiter">/</em>
                <a href="{{ URL::route('cities.index')}}" title="@lang('front/home-blade.in_all_cities')">@lang('front/home-blade.in_all_cities')</a><em class="delimiter">/</em>
                <span title="{{$city -> name}}" >{{$city -> name}}</span><em class="delimiter"></em>
            </nav>
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    {{--title of the article--}}
                    <header class="entry-header-outer">
                        <div class="entry-header">
                            {{--Catogry of the article--}}
                            <h2 class="post-title entry-title"> @lang('front/home-blade.all_city_services') {{$city -> name}}</h2>
                            <div class="">
                                <p>{{$city ->description}} </p>
                                <div id="tag_cloud-6" class="container-wrapper widget widget_tag_cloud">
                                    <div class="tagcloud">
                                        @isset($cityTags)
                                            @foreach($cityTags as $tag)
                                                <a href="{{url('cities/'.$tag ->slug.'/'.$city -> slug) }}" title="{{$tag -> name}} @lang('front/home-blade.in') {{$city -> name}}" >{{ Str::limit($tag -> name, 45)}} @lang('front/home-blade.in') {{$city -> name}}</a>
                                            @endforeach
                                            <div>{{$cityTags->links()}}</div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    {{--Content of the article--}}
                </div>
            </div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
