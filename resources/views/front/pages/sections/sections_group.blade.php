<style>

@media only screen and (max-width: 600px) {
    .big-posts-box .posts-items li .post-title {
        font-size:15px;
        
    }
    .box-shadow {
        height: 140px;
    }
}
@media only screen and (max-width: 500px) {
    .big-posts-box .posts-items li .post-title {
        font-size:14px;
    }
    .box-shadow {
        height: 120px;
    }
}
@media only screen and (max-width: 400px) {
    .big-posts-box .posts-items li .post-title {
        font-size:13px
    }
    .box-shadow {
        height: 100px;
    }
}
</style>



{{-- Begin section --}}
<div id="tie-s_1441" class="mag-box big-posts-box has-custom-color" data-current="1">
    <div class="container">
        <div class="mag-box-title the-global-title section-name">
            <h3>@lang('front/home-blade.our_services')</h3>
        </div>
        <div class="mag-box-container">
            <ul class="posts-items posts-list-container">
                @isset($sections)
                    @foreach($sections as $section)
                        <li class="post-item post-1892 post type-post status-publish format-standard has-post-thumbnail category-64 tag-94 tie-standard section-items"
                        <?php if(get_default_lang() === 'ar'){
                            echo "style='float: right;'";
                        }else{
                            echo "style='float: left;'";
                        } ?>
                        >
                    <a href="{{url('sections/'.$section -> slug)}}" title="{{ $section -> name}}" class="post-thumb"><img src="{{ $section -> photo}}"  alt="{{ $section -> name}}" title="{{ $section -> name}}" height="300" width="300" class="attachment-jannah-image-large size-jannah-image-large lazy-img wp-post-image box-shadow"
                            alt="{{ $section -> name}}" decoding="async" loading="lazy"/>
                    </a>
                    <div class="post-details">
                        <h5 class="post-title section-title"><a href="{{url('sections/'.$section -> slug)}}" title="{{ $section -> name}}">{{ $section -> name}}</a></h5>
                    </div>
                </li>
                    @endforeach
                @endisset
            </ul>
        </div>
    </div>
</div>
