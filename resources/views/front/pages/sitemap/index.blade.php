@extends('front.layouts.master')
@section('title',trans("front/home-blade.sitemap"))
@section('seo_keyword',get_default_seo_keyword())
@section('seo_description',get_default_seo_description())
@section('seo_url', URL::route('sitemap'))

<style>
#content {
    padding: 20px 30px;
    background: #fff;
    max-width: 75%;
    margin: 0 auto;
}
p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}
table {
    border: none;
    border-collapse: collapse;
    font-size: .9em;
    width: 100%;
}
table {
    display: table;
    border-collapse: separate;
    box-sizing: border-box;
    text-indent: initial;
    white-space: normal;
    line-height: normal;
    font-weight: normal;
    font-size: medium;
    font-style: normal;
    color: -internal-quirk-inherit;
    text-align: start;
    border-spacing: 2px;
    border-color: grey;
    font-variant: normal;
}
th {
    background-color: #4275f4;
    color: #fff;
    text-align: right;
    padding: 15px 10px;
    font-size: 14px;
    cursor: pointer;
}

</style>
@section('content')
    {{-- Begin Second section --}}
    <div id="tie-block_1837" class="mag-box miscellaneous-box first-post-gradient has-first-big-post media-overlay has-custom-color">
        <div class="container">
            


                <div id="content">
                    <table id="sitemap" cellpadding="3">
                        <thead>
                            <tr>
                                <th width="75%">@lang("front/home-blade.link")</th>
                                <th width="25%">@lang("front/home-blade.title")</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="{{ url('sitemap_index.xml')}}">{{ url('sitemap_index.xml')}}</a></td>
                                <td>@lang("front/home-blade.home_page")</td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('sitemap_articles.xml')}}">{{ url('sitemap_articles.xml')}}</a></td>
                                <td>@lang("front/home-blade.articles")</td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('sitemap_tags.xml')}}">{{ url('sitemap_tags.xml')}}</a></td>
                                <td>@lang("front/home-blade.tags")</td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('sitemap_services.xml')}}">{{ url('sitemap_services.xml')}}</a></td>
                                <td>@lang("front/home-blade.services")</td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('sitemap_sections.xml')}}">{{ url('sitemap_sections.xml')}}</a></td>
                                <td>@lang("front/home-blade.sections")</td>
                            </tr>
                            @if(check_if_cars_active() === 1)
                            <tr>
                                <td><a href="{{ url('sitemap_cars.xml')}}">{{ url('sitemap_cars.xml')}}</a></td>
                                <td>@lang("front/home-blade.cars")</td>
                            </tr>                            <tr>
                                <td><a href="{{ url('sitemap_car_tags.xml')}}">{{ url('sitemap_car_tags.xml')}}</a></td>
                                <td>@lang("front/home-blade.cars_with_tags")</td>
                            </tr>
                            @endif
                            <tr>
                                <td><a href="{{ url('sitemap_cities.xml')}}">{{ url('sitemap_cities.xml')}}</a></td>
                                <td>@lang("front/home-blade.cities")</td>
                            </tr> <tr>
                                <td><a href="{{ url('sitemap_city_tags.xml')}}">{{ url('sitemap_city_tags.xml')}}</a></td>
                                <td>@lang("front/home-blade.cities_with_tags")</td>
                            </tr>
                        </tbody>
                    </table>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
    {{-- End Second section --}}
@endsection
