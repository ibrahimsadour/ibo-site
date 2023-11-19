<footer id="footer" class="site-footer dark-skin dark-widgetized-area">
    <div id="footer-widgets-container">
        <div class="container">
            <div class="footer-widget-area">
                <div class="tie-row">
                    <div class="tie-col-md-3 normal-side">
                        <div id="posts-list-widget-9" class="container-wrapper widget posts-list">
                            <div class="widget-title the-global-title">
                                <div class="the-subtitle">{{ preg_replace('#^https?://#', '', url('/')) }}</div>
                            </div>
                            <div class="widget-posts-list-wrapper">
                                <div class="widget-posts-list-container timeline-widget">
                                    <ul class="posts-list-items widget-posts-wrapper">
                                        <?php $count = 0; ?>
                                        @isset($page_links)
                                        @foreach($page_links as $page_link)
                                            <?php if($count == 3) break; ?>
                                                <li class="widget-single-post-item">
                                                    <a href="{{$page_link->link}}">
                                                        <h3>{{$page_link->title}}</h3>
                                                    </a>
                                                </li>

                                            <?php $count++; ?>
                                            @endforeach
                                        @endisset       

                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="tie-col-md-3 normal-side">
                        <div id="posts-list-widget-8" class="container-wrapper widget posts-list">
                            <div class="widget-title the-global-title">
                                <div class="the-subtitle">@lang('front/home-blade.new_services')<span class="widget-title-icon tie-icon"></span></div>
                            </div>
                            <div class="widget-posts-list-wrapper">
                                <div class="widget-posts-list-container posts-pictures-widget">
                                    <div class="tie-row widget-posts-wrapper">
                                        <?php $count = 0; ?>
                                        @isset($articles)
                                            @foreach($articles as $article)
                                                <?php if($count == 6) break; ?>
                                                    <div class="widget-single-post-item tie-col-xs-4 tie-standard">
                                                        <a
                                                            aria-label="{{ Str::limit($article -> name, 45) }}"
                                                            href="{{url($article ->slug)}}"
                                                            class="post-thumb"
                                                        >
                                                            <img
                                                                src="{{$article ->photo}}"
                                                                class="attachment-jannah-image-large size-jannah-image-large wp-post-image"
                                                                alt="{{ Str::limit($article -> name, 45) }}"
                                                                title="{{ Str::limit($article -> name, 45) }}"
                                                                decoding="async"
                                                                loading="lazy"
                                                                data-src="{{$article ->photo}}"
                                                                width="780" height="470"
                                                            />
                                                        </a>
                                                    </div>
                                                <?php $count++; ?>
                                            @endforeach
                                         @endisset

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="tie-col-md-3 normal-side">
                        <div id="tag_cloud-6" class="container-wrapper widget widget_tag_cloud">
                            <div class="widget-title the-global-title">
                                <div class="the-subtitle">@lang('front/home-blade.tags')</div>
                            </div>
                            <div class="tagcloud">
                                @isset($tags)
                                    @foreach($tags as $tag)
                                        <a href="{{ URL::route('tag.index',$tag -> slug) }}">{{ Str::limit($tag -> name, 10) }}</a>
                                    @endforeach
                                @endisset
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="tie-col-md-3 normal-side">
                        <div id="latest_tweets_widget-4" class="container-wrapper widget latest-tweets-widget">
                            <div class="widget-title the-global-title">
                                <div class="the-subtitle">@lang('front/home-blade.follow_us'):</div>
                            </div>
                            <div class="widget-posts-list-wrapper">
                                <div class="widget-posts-list-container timeline-widget">
                                    <ul class="posts-list-items widget-posts-wrapper">

                                        <li class="widget-single-post-item">
                                            <a href="{{get_default_social_link_facebook()}}" rel="nofollow"><h3>@lang('front/home-blade.facebook')</h3></a>
                                        </li>
                                        <li class="widget-single-post-item">
                                            <a href="{{get_default_social_link_instagram()}}" rel="nofollow"><h3>@lang('front/home-blade.instagram')</h3></a>
                                        </li>
                                        <li class="widget-single-post-item">
                                            <a href="{{get_default_social_link_twitter()}}" rel="nofollow"><h3>@lang('front/home-blade.twitter')</h3></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="site-info" class="site-info site-info-layout-2">
        <div class="container">
            <div class="tie-row">
                <div class="tie-col-md-12">
                    <div class="copyright-text copyright-text-first"> {!! FooterCopyrights()!!} </div>
                    <div class="footer-menu">
                        <ul class="menu">
                            @foreach (FooterCopyrightsPages() as $footer_copyrights_page)
                            <li class="menu-item"><a href="{{$footer_copyrights_page->copyright_page_link}}" title="{{$footer_copyrights_page->copyright_page_name}}">{{$footer_copyrights_page->copyright_page_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
