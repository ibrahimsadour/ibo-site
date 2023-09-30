@extends('front.layouts.master')
@section('title',trans("front/home-blade.services"))
@section('seo_keyword',get_default_seo_keyword())
@section('seo_description',get_default_seo_description())
@section('content')
    {{-- Begin Second section --}}
    <div id="tie-block_1837" class="mag-box miscellaneous-box first-post-gradient has-first-big-post media-overlay has-custom-color">
        <div class="container">
            <div class="mag-box-title the-global-title">
                <h3>@lang("front/home-blade.services")</h3>
            </div>
                <ul class="posts-items posts-list-container">
                    <li style="display: none"></li>
                    @isset($articles)
                        @foreach($articles as $article)
                            <li class="post-item tie-standard">
                                <a  href="{{URL::route('article.index',$article -> slug)}}" title="{{$article ->name}}" class="post-thumb">
                                    <img style="width:100%; height:100%"  src="{{$article ->photo}}" class="attachment-jannah-image-large size-jannah-image-large lazy-img wp-post-image box-shadow" alt="{{$article ->name}}" title="{{$article ->name}}" decoding="async" loading="lazy"  /></a>
                                <div class="clearfix"></div>
                                <div class="post-overlay">
                                    <div class="post-content">
                                        <div class="post-meta clearfix">
                                            <span class="post-cat tie-cat-75">{{$article ->section->name ?? '' }}</span>

                                            {{-- <span class="date meta-item tie-icon" style="float: left;">{{$article -> created_at->diffForHumans()}}</span> --}}
                                        </div>
                                        <h2 class="post-title"><a href="{{ URL::route('article.index',$article -> slug) }}" title="{{$article ->name}}">{{ Str::limit($article -> name, 45) }}</a></h2>
                                        <div class="dUihZb whiteBg width-100">
                                            <div class="flex gap-10 mb-8">
                                                <a type="button" href="@if(get_default_phone_number() != Null){{'tel:00'.get_default_phone_number()}}@else{{'phone number empty'}} @endif"  class="flex justifyContent alignItems btn vMiddle blueBtn" style="height: 35px;font-size: 12px;">
                                                    <svg viewBox="0 0 16 16" width="15" height="15" class=" vMiddle me-8" data-name="iconPhone">
                                                        <path fill="#ffff" d="M4.25 0.5H1.33333C0.875 0.5 0.5 0.875 0.5 1.33333C0.5 9.15833 6.84167 15.5 14.6667 15.5C15.125 15.5 15.5 15.125 15.5 14.6667V11.7583C15.5 11.3 15.125 10.925 14.6667 10.925C13.6333 10.925 12.625 10.7583 11.6917 10.45C11.6083 10.4167 11.5167 10.4083 11.4333 10.4083C11.2167 10.4083 11.0083 10.4917 10.8417 10.65L9.00833 12.4833C6.65 11.275 4.71667 9.35 3.51667 6.99167L5.35 5.15833C5.58333 4.925 5.65 4.6 5.55833 4.30833C5.25 3.375 5.08333 2.375 5.08333 1.33333C5.08333 0.875 4.70833 0.5 4.25 0.5Z"></path>
                                                    </svg>
                                                    @lang('front/home-blade.call_now')
                                                </a>
                                                <a  type="button" href="@if(get_default_phone_number() != Null){{'http://wa.me/'.get_default_phone_number()}}@else{{'phone number empty'}} @endif" class="sc-1ccec9e8-26 dtuwSc flex justifyContent alignItems whiteBtn" style="height: 35px;font-size: 12px;">
                                                    <svg viewBox="0 0 26 26" class="vMiddle me-8" width="20" height="20" data-name="iconChat">
                                                        <path d="M16.6 14C16.4 13.9 15.1 13.3 14.9 13.2C14.7 13.1 14.5 13.1 14.3 13.3C14.1 13.5 13.7 14.1 13.5 14.3C13.4 14.5 13.2 14.5 13 14.4C12.3 14.1 11.6 13.7 11 13.2C10.5 12.7 10 12.1 9.6 11.5C9.5 11.3 9.6 11.1 9.7 11C9.8 10.9 9.9 10.7 10.1 10.6C10.2 10.5 10.3 10.3 10.3 10.2C10.4 10.1 10.4 9.90001 10.3 9.80001C10.2 9.70001 9.7 8.50001 9.5 8.00001C9.4 7.30001 9.2 7.30001 9 7.30001C8.9 7.30001 8.7 7.30001 8.5 7.30001C8.3 7.30001 8 7.50001 7.9 7.60001C7.3 8.20001 7 8.90001 7 9.70001C7.1 10.6 7.4 11.5 8 12.3C9.1 13.9 10.5 15.2 12.2 16C12.7 16.2 13.1 16.4 13.6 16.5C14.1 16.7 14.6 16.7 15.2 16.6C15.9 16.5 16.5 16 16.9 15.4C17.1 15 17.1 14.6 17 14.2C17 14.2 16.8 14.1 16.6 14ZM19.1 4.90001C15.2 1.00001 8.9 1.00001 5 4.90001C1.8 8.10001 1.2 13 3.4 16.9L2 22L7.3 20.6C8.8 21.4 10.4 21.8 12 21.8C17.5 21.8 21.9 17.4 21.9 11.9C22 9.30001 20.9 6.80001 19.1 4.90001ZM16.4 18.9C15.1 19.7 13.6 20.2 12 20.2C10.5 20.2 9.1 19.8 7.8 19.1L7.5 18.9L4.4 19.7L5.2 16.7L5 16.4C2.6 12.4 3.8 7.40001 7.7 4.90001C11.6 2.40001 16.6 3.70001 19 7.50001C21.4 11.4 20.3 16.5 16.4 18.9Z" fill="#ffffff"></path>
                                                    </svg>
                                                    @lang('front/home-blade.whatsapp')
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        @endforeach
                    @endisset
                </ul>
        </div>
    </div>
    {{-- {{ End Second section --}}
@endsection
