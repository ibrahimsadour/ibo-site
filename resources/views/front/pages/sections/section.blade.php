@extends('front.layouts.master')
@if(isset($section))
    @section('title',$section->name)
    @section('seo_keyword',$section ->seo_keyword)
    @section('seo_description',$section ->seo_description)
    @section('seo_image',$section->photo)
    {{-- @section('seo_url', URL::route('tags.index',$tag ->slug) ) --}}
@endif
@section('content')
 {{-- Begin Second section --}}
 <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
    <div class="section-item sidebar-left has-sidebar">
        <nav id="breadcrumb">
            <a href="{{ URL::route('site.index') }}" title="@lang('front/home-blade.home_page')">@lang('front/home-blade.home_page')</a><em class="delimiter">/</em>
            <a href="{{ URL::route('site.index')}}" title="@lang('front/home-blade.sections')">@lang('front/home-blade.sections')</a><em class="delimiter">/</em>
            <span title="{{$section -> name}}" >{{$section -> name}}</span><em class="delimiter"></em>
        </nav>
        <div class="container-normal">
            <div class="tie-row main-content-row">
                {{--title of the article--}}
                <header class="entry-header-outer">
                    <div class="entry-header">
                        {{--Catogry of the article--}}
                        <h2 class="post-title entry-title">@lang('front/home-blade.all_services_related_to_the_department')  {{$section -> name}}</h2>
                        <div id="tag_cloud-6" class="container-wrapper widget widget_tag_cloud">
                            <br>
                            <div class="tagcloud">
                                @isset($sectionTags)
                                    @foreach($sectionTags as $tag)
                                    <a class="section-block" style="" class="post-cat tie-cat-8" href="{{url('tags/'.$tag -> slug) }}" title="{{$tag -> name}} @lang('front/home-blade.in') {{$tag -> name}}" >{{ Str::limit($tag -> name, 40)}} </a>
                                    @endforeach
                                    <div>{{$sectionTags->links()}}</div>

                                @endisset
                                
                            </div>
                            <br>

                            {{-- <h3 class="section-second-title">تبديل بطاريات {{get_default_country()}} لجميع السيارات:</h3> --}}
                            <p>{{$section ->description}} </p>
                            <a href="{{get_default_social_link_facebook()}}" rel="nofollow" target="_blank">@lang('front/home-blade.see_also:_more_about')   {{get_default_title()}}  @lang('front/home-blade.click_here')</a> 

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