@extends('front.layouts.master')
@section('title',trans("front/home-blade.contact_us"))
@section('seo_keyword',get_default_seo_keyword())
@section('seo_description',get_default_seo_description())
@section('seo_url', URL::route('contact-us.index') )
@section('content')
<style>

div.form {
  background-color: #eee;
}
.contact-submit-btn {
  float: left;
}
.reset-btn {
  float: right;
}

.form-input:focus,
textarea:focus{
  outline: 1.5px solid #ec1c24;
}
.form-input,
textarea {
  width: 100%;
  border: 1px solid #bdbdbd;
  border-radius: 5px;
}
form {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 20px;
}
form label {
  display: block;
}
form p {
  margin: 0;
}

.full-width {
  grid-column: 1 / 3;
}
button,
.submit-btn,
.form-input,
textarea {
  padding: 1em;
}

</style>
    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
                        {{--title of the article--}}
                        <header class="entry-header-outer">
                            <div class="entry-header">
                                <h1 class="post-title entry-title">@lang("front/home-blade.contact_us")</h1>
                            </div>
                        </header>
                        {{--Imgage of the article--}}
                        <div class="featured-area">
                            <div class="featured-area-inner">
                                <figure class="single-featured-image">
                                    <img
                                        width="780"
                                        height="470"
                                        src="{{asset('assets/images/pages/contact-us/contact-us.webp')}}"
                                        class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                        title="contact-us"
                                        decoding="async"
                                        data-main-img="1"
                                        alt="contact-us"
                                        loading="lazy"
                                    />
                                </figure>
                            </div>
                        </div>
                        {{--Content of the article--}}
                        <div class="entry-content entry clearfix">
                            <p>@lang("front/home-blade.lets_see_how_we_can_help_Get_in_touch_today_and_speak_to_our_friendly_team_via_email_whatever_your_query_may_be")</p>
                            <p>@lang("front/home-blade.Since_we_receive_a_lot_of_messages_via_email_and_social_media_here_are_some_guidelines_to_make_sure_we_see_your_message_and_are_able_to_respond_in_a_timely_manner")</p>
                        </div>
                        <br>
                        <h2 class="entry-sub-title">@lang("front/home-blade.Send_us_a_message")</h2>
                        <br>
                        <div class="form">
                            <form id="submit-form" action="">
                              <p>
                                <input id="name" class="form-input" type="text" placeholder="@lang("front/home-blade.name")*">
                                <small class="name-error"></small>
                              </p>
                              <p>
                                <input id="email" class="form-input" type="email" placeholder="@lang('front/home-blade.your_E-mail') *">
                                <small class="name-error"></small>
                              </p>
                              <p class="full-width">
                                <input id="company-name" class="form-input" type="text" placeholder="@lang('front/home-blade.phone') *" required>
                                <small></small>
                              </p>
                              <p class="full-width">
                                <textarea  minlength="20" id="message" cols="30" rows="7" placeholder="@lang('front/home-blade.your_message') *" required></textarea>
                                <small></small>
                              </p>
                              <p class="full-width">
                                <input type="button" class="contact-submit-btn button" value="@lang('front/home-blade.send')" onclick="checkValidations()">
                                <button style="float: right;" class="button" onclick="reset()">@lang('front/home-blade.reset')</button>
                              </p>
                            </form>
                        </div>
                    </div>
                    {{-- Main side menu  --}}
                    @include('front.includes.first-main-sidebar')

                    @include('front.includes.second-main-sidebar')

                </div>
            </div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
