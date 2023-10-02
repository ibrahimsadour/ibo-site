@extends('front.layouts.master')
@section('title',trans("front/home-blade.services"))
@section('seo_keyword',get_default_seo_keyword())
@section('seo_description',get_default_seo_description())
@section('seo_url', URL::route('services.index'))
@section('content')
    {{-- Begin Second section --}}
    <div id="tie-block_1837" class="mag-box miscellaneous-box first-post-gradient has-first-big-post media-overlay has-custom-color">
        <div class="container">
            <nav id="breadcrumb">
                <a href="{{ URL::route('site.index')}}" title="@lang('front/home-blade.home_page')"><span class="tie-icon-home"></span>@lang('front/home-blade.home_page')</a><em class="delimiter">/</em>
                <a title="@lang('front/home-blade.services')" >@lang('front/home-blade.services')</a><em class="delimiter"></em>
            </nav>
            <div id="tag_cloud-6" class="container-wrapper widget widget_tag_cloud">
                <div class="widget-title the-global-title">
                    <div class="the-subtitle">@lang('front/home-blade.services')<span class="widget-title-icon tie-icon"></span></div>
                </div>
                <div class="tagcloud">
                    @isset($services)
                        @foreach($services as $service)
                            <a href="{{ URL::route('service.index',$service -> slug) }}" title="{{$service -> name}}" >{{ Str::limit($service -> name, 45) }}</a>
                        @endforeach
                    @endisset
                </div>
                <div class="clearfix"></div>
            </div>




            <div class="clearfix"></div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
