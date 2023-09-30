<aside class="sidebar tie-col-md-4 tie-col-xs-12 normal-side is-sticky" >
    <div class="theiaStickySidebar">
        <div id="stream-item-widget-13" class="widget stream-item-widget widget-content-only">
            <div class="stream-item-widget-content"><img class="widget-stream-image" alt="{{get_default_title()}}" title="{{get_default_title()}}" src="{{get_default_ads_sidebare()}}" loading="lazy" data-src="" width="336" height="280"></div>
        </div>

        <div id="tie-newsletter-5" class="container-wrapper widget subscribe-widget">
            <div class="widget-title the-global-title">
                <div class="the-subtitle">@lang('front/home-blade.newsletter')<span class="widget-title-icon tie-icon"></span></div>
            </div>
            <div class="widget-inner-wrap">
                <span class="tie-icon-envelope newsletter-icon" aria-hidden="true"></span>
                <div class="subscribe-widget-content">
                    <h3>@lang('front/home-blade.​​​​​​​Sign_up_for_our_newsletter')</h3>
                    <p>@lang('front/home-blade.Weekly_news_about_our_services_and_promotions_in_your_email')</p>
                </div>
                <div id="mc_embed_signup-tie-newsletter-5">
                    <form action="mo3aser" method="post" id="mc-embedded-subscribe-form-tie-newsletter-5" name="mc-embedded-subscribe-form" class="subscribe-form validate" target="_blank" novalidate>
                        <div class="mc-field-group"> <label class="screen-reader-text" for="mce-EMAIL-tie-newsletter-5"> @lang('front/home-blade.your_E-mail')</label> <input type="email" id="mce-EMAIL-tie-newsletter-5" placeholder="@lang('front/home-blade.your_E-mail')" name="EMAIL"
                                                                                                                                                             class="subscribe-input required email"> </div>
                        <input type="submit" value="@lang('front/home-blade.​​​​​​​sign_up')" name="subscribe" class="button subscribe-submit">
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div id="tie-widget-categories-8" class="container-wrapper widget widget_categories tie-widget-categories">
            <div class="widget-title the-global-title">
                <div class="the-subtitle">@lang('front/home-blade.categories')</div>
            </div>
            <ul>
                @isset($sections)
                    @foreach($sections as $section)
                        <li class=" cat-counter "><a href="{{url('sections/'.$section ->slug)}}" title="{{$section ->name}}">  {{ $section -> name}}</a> <span>1</span> </li>
                    @endforeach
                @endisset
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>
</aside>
