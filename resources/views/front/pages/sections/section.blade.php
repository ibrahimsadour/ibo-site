@extends('front.layouts.master')
@if(isset($section))
    @section('title',$section->name.' '.'نقل اغراض البيت وتحريك أثاث ايكيا نقل اثاث')
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
            <a href="{{ URL::route('site.index') }}" title="الرئيسية">الرئيسية</a><em class="delimiter">/</em>
            <a href="{{ URL::route('site.index')}}" title="جميع الاقسام">جميع الاقسام</a><em class="delimiter">/</em>
            <span title="{{$section -> name}}" >{{$section -> name}}</span><em class="delimiter"></em>
        </nav>
        <div class="container-normal">
            <div class="tie-row main-content-row">
                {{--title of the article--}}
                <header class="entry-header-outer">
                    <div class="entry-header">
                        {{--Catogry of the article--}}
                        <h2 class="post-title entry-title">جميع الخدمات  الخاصة بقسم  {{$section -> name}}</h2>
                        <div id="tag_cloud-6" class="container-wrapper widget widget_tag_cloud">
                            <br>
                            <div class="tagcloud">
                                @isset($sectionTags)
                                    @foreach($sectionTags as $tag)
                                    <a class="section-block" style="" class="post-cat tie-cat-8" href="{{url('tags/'.$tag -> slug) }}" title="{{$tag -> name}} في {{get_default_country()}} " >{{ Str::limit($tag -> name, 40)}} في {{get_default_country()}}  </a>
                                    @endforeach
                                    <div>{{$sectionTags->links()}}</div>

                                @endisset
                                
                            </div>
                            <br>
                            <p>{{$section ->description}} </p>
                            <a href="{{get_default_social_link_facebook()}}" rel="nofollow" target="_blank">شاهد ايضا: للمزيد حول {{get_default_title()}} اضغط هنا</a> 

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