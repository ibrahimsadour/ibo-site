@extends('front.layouts.master')
@if(isset($article))
    @section('title',$article ->name)
    @section('seo_keyword',$article ->seo_keyword)
    @section('seo_description',$article ->seo_description)
    @section('seo_image',$article->photo)
    @section('seo_url', URL::route('article.index',$article -> slug))
@endif
@section('content')
    <style>

        .big-posts-box .posts-items li:nth-child(2n+1) {
            clear: none;
        }
        .mag-box .posts-items li {
            width: 20%;
             margin-top: 0px;
        }
        @media (max-width: 670px) {
            .big-posts-box .posts-items li {
                width:33%
            }
            .big-posts-box .posts-items li .post-title {
                font-size: 18px;

            }
        }
        @media (max-width: 670px) {
            .mag-box .posts-items li:not(:first-child) {
                margin-top: 0px
            }
        }

        .big-posts-box .posts-items li .post-title {
            font-size: 18px;

        }

    </style>

    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
                        <nav id="breadcrumb">
                            <a href="{{ URL::route('site.index')}}" title="@lang("front/home-blade.home_page")"><span class="tie-icon-home"></span>@lang("front/home-blade.home_page")</a><em class="delimiter">/</em>
                            <span  title="{{$article ->name}}">{{$article ->name}}</span><em class="delimiter"></em>

                        </nav>
                        {{--Imgage of the article--}}
                        <div class="featured-area">
                            <div class="featured-area-inner">
                                <figure class="single-featured-image">
                                    <img
                                        width="780"
                                        height="470"
                                        src="{{$article ->photo}}"
                                        class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                        alt="{{$article ->name}}"
                                        title="{{$article ->name}}"
                                    />
                                </figure>
                            </div>
                        </div>

                        {{--Content of the article--}}
                        <div class="entry-content entry clearfix">
                            {{--defualt_content of the article--}}
                            @if($article ->section_id != 0 || $article ->service_id != 0 || $article ->city_id != 0 || $article ->car_id != 0 )
                                                     {{--title of the article--}}
                        <header class="entry-header-outer">
                            <div class="entry-header">
                                {{--Catogry of the article--}}
                                <span class="post-cat-wrap">
                                    <a class="post-cat tie-cat-6" href="" title="{{$article ->section->name  ?? ''}}"> القسم : {{$article ->section->name  ?? ''}}</a>
                                    <a class="post-cat tie-cat-8" href="" title="{{$article ->service->name ?? ''}}"> الخدمة : {{$article ->service->name ?? ''}}</a>
                                    <a class="post-cat tie-cat-1" href="" title="{{$article ->city->name ?? ''}}"> المدينة : {{$article ->city->name ?? ''}}</a>
                                    <a class="post-cat tie-cat-48" href="   " title="{{$article ->car->name ?? ''}}">نواع السيارة : {{ $article ->car->name ?? '' }}</a>
                                </span>
                            </div>
                        </header>
                            <div class="defualt_content">
                                <h2 class="entry-sub-title margin-bottom">خدمة {{$article ->service->name  ?? ''}} {{$article ->car->name ?? ''}} في مدينة {{$article ->city->name ?? ''}} بين يديك على مدارالـ 24 ساعة لجميع مدن الكويت</h2>
                                
                                <p>ورشة صيانة متنقلة تحتوي على افضل خدمة {{$article ->service->name  ?? ''}} في مدينة {{$article ->city->name ?? '' }} لجميع  سيارات {{$article ->car->name ?? ''}} حيث لدينا كل وسائل الصيانة الحديثة والإصلاح، ويقودها فنيون مختصون وميكانيكيون ذو خبرة عالية. نستطيع أن نصل اليك أينما كنت وبسرعة عالية</p>
                                <p>{{$article ->service->name  ?? ''}} {{$article ->car->name ?? ''}} لخدمتك على مدار الـ 24 ساعة وانت على الطريق او عند البيت يتم ارسل اليك اقرب فني صيانة اليك. خدمة صيانة سيارات متنقلة بارخص الاسعار اطلب الفني الأن في {{$article ->city->name ?? '' }}.</p>
                                <p>ستجد معنا في {{$article ->service->name  ?? ''}} {{$article ->city->name ?? '' }} كافة خدمات صيانة السيارات، مهما كان نوع العطل الذي يواجهك؛ ستجد لدينا الحل الأمثل، مع أفضل {{$article ->service->name  ?? ''}} سيارات في {{$article ->city->name ?? '' }}. والقادر على التعامل مع أي جزء من أجزاء السيارة، والتخلص من التوصيلات، أو الأجزاء التالفة، واستبدالها بآخرى سليمة في غضون فترة وجيزة.</p>
                                <p>تقدم هذه الشركة خدمة {{$article ->service->name  ?? ''}} {{$article ->car->name ?? ''}} في {{$article ->city->name ?? '' }} إما في المنزل أو في مكان العمل أو أينما كنت بشكل سريع ومُتقن، وهي توفر أفضل الخدمات بأفضل الأسعار، حيث تتميز بفريق فني ماهر وعلى استعداد لخدمتك مهما كان نوع سيارتك،</p>
                                
                                <h3 class="entry-sub-title margin-bottom">رقم {{$article ->service->name  ?? ''}} {{$article ->car->name ?? ''}} في {{$article ->city->name ?? '' }}</h3>

                                <p>إن كنت متواجدًا في دولة {{get_default_country()}}.. فبإمكانك الاستفادة من خدمة {{$article ->service->name  ?? ''}} {{$article ->city->name ?? '' }} حيث تتيح لك تلك الخدمة إمكانية تصليح سيارتك،على اكمل وجه على الطرق.. وكذلك إمكانية الاستفادة من حلول إصلاح المركبات التي تعرضت إلى الأعطال، وإليك أهم المراكز التي تقدم تلك الخدمات عبر الآتي:</p>
                                
                                <ul>
                                    <li class="maker-list-inside-article">
                                        <p>المتميز لخدمات {{$article ->service->name  ?? ''}}: يمكنك الحصول على خدمات {{$article ->service->name  ?? ''}} من خلال هذا المركز على أعلى مستوى من الدقة.. وكذلك بالاعتماد على خبرات الموظفين ممن يملكون الخبرة في مجال تصليح المركبات وصيانتها، ومن هنا نشير إلى أنه يقدم خدمات {{$article ->service->name  ?? ''}} .. بالإضافة إلى إمكانية  معالجة أعطال الكهرباء على مدار اليوم، وللتواصل قم بالاتصال على مدارالساعة .</p>
                                    </li>
                                    <li class="maker-list-inside-article">
                                        <p>ورشة {{$article ->service->name  ?? ''}} لإصلاح وقطر المركبات: تقدم لك تلك الورشة إمكانية الحصول على خدمة {{$article ->service->name  ?? ''}} المتنقلة.. بالإضافة إلى إمكانية إصلاح المركبات في حال أن كنت متواجدًا في منطقة  {{$article ->city->name ?? '' }} ، حيث تملك الخبرة في صيانة المركبات.. ويمكنها معالجة الأعطال في العديد من المركبات والتي تتمثل في الماركات الأمريكية والكورية واليابانية والألمانية وخاصة سيارات  {{$article ->car->name ?? ''}}  ..ويقدم خدماته على مدار اليوم الواحد، وبإمكانك التواصل معه من خلال الاتصال</p>
                                    </li>
                                </ul>
                                <br>
                                <h3 class="entry-sub-title margin-bottom">ماهو {{$article ->service->name  ?? ''}} ووظيفتها:</h3>
                        
                                <p>صيانة سيارات {{$article ->car->name ?? ''}}  يتميز لدينا بالدقة والسرعة والإحترافية في العمل كما لديه القدرة على مراعاة المواعيد المتفق عليها مع العملاء، لذلك يمكنك الاعتماد عليه في الحصول على خدمة صيانة شاملة لتستلم سيارتك بالموعد دون تأخير بافضل سعر وجودة حيث سيارات {{$article ->car->name ?? ''}}  مصنفة من السيارات الفارهة التي تتطلب عناية خاصة ودقة متناهية في التعامل معها؛ وبعيداً عن مراكز صيانة السيارات الاخرى التي تقدم خدماتها بأسعار مبالغ فيها؛ قم بالاتصال  </p>
                                <strong><center><a href="{{route('cars.index')}}" >خدمات لجميع انواع السيارات في الكويت</a> </center></strong>
                                
                                <h3 class="entry-sub-title margin-bottom">اقرب {{$article ->service->name  ?? ''}} {{$article ->car->name ?? ''}}   من موقعك في {{$article ->city->name ?? '' }}:</h3>
                                
                                <p>مرحبًا بكم في افضل مركز {{$article ->service->name  ?? ''}}  سيارات {{$article ->car->name ?? ''}}  ، حيث نقدم بفخر خدمات إصلاح وصيانة السيارات والشاحنات الخفيفة الخبيرة لعملاء منطقة {{$article ->city->name ?? '' }}, كراج تصليح سيارات المانية , كورية , امريكية , يابانية , اوروبية والكثير الكثبر,</p>
                                <p>يمكنك عبر خدمة {{$article ->service->name  ?? ''}} على الطريق التواصل مع مركز المساعدة الطارئة والذي يعمل على مدار 24 ساعة طوال ايام السنة من خلال نخبة فنية متخصصة في كافة المجالات الكهربائية والميكانيكية بالاضافة لمتخصصين في دهان وحدادة السيارات.</p>
                                <h3 class="entry-sub-title margin-bottom">سعر خدمة {{$article ->service->name  ?? ''}} عند البيت:</h3>
                                <p>{{$article ->service->name  ?? ''}}   {{$article ->car->name ?? ''}} لديه أسرع خدمة طرق في {{get_default_country()}}  لسيارت {{$article ->car->name ?? ''}} الكثير من الأشخاص على حل المشكلات التي يتعرضون لها الطرق من خلال تقديم {{$article ->service->name  ?? ''}}  الذي يعد واحدًا من أفضل الوسائل بالوقت الحالي يتمثل في إمكانية سحب السيارة والعمل على إصلاحها بأحدث المعدات وعلى يد خبراء ومتخصصين لديهم القدرة على التعامل مع أي عطل قد يحدث للسيارة، بواسطة مقال اليوم نتحدث معًا عن جميع المميزات الخاصة بتلك الخدمة.</p>
                                <strong><center>شاهد ايضا: للمزيد حول {{$article ->service->name  ?? ''}} و رقم افضل {{$article ->service->name  ?? ''}} <a href="https://www.facebook.com/carservicekuwait" rel="nofollow" target="_blank">اضغط هنا</a> </center></strong>
                                <h4 class="entry-sub-title margin-bottom">خطوات {{$article ->service->name  ?? ''}} {{$article ->car->name ?? ''}} </h4>
                                <p>خطوات {{$article ->service->name  ?? ''}}  {{$article ->car->name ?? ''}} على الرغم من بساطتها، إلى أنها أحيانا تحتاج إلى متخصص للقيام بتلك الخطوات بدقة وبشكل صحيح، يمكننا توضيح تلك الخطوات لمساعدة من يرغب في محاولة {{$article ->service->name  ?? ''}} بنفسه، إذا لم تنجح في {{$article ->service->name  ?? ''}}    يمكنك التواصل معنا وطلب المساعدة، تابع معنا قراءة السطور التالية للتعرف على الخطوات:</p>

                                <h4 class="entry-sub-title margin-bottom" >مميزات خدمة {{$article ->service->name  ?? ''}} {{$article ->car->name ?? ''}} </h4>
                                <p>مميزات {{$article ->service->name  ?? ''}} هي ما جعلتنا الأفضل مقارنة بالكراجات الأخرى، فنحن نمتلك الخبرة التي كونها على مدار سنين عملنا في هذا المجال، كما نمتلك ماديات تسمح لنا باقتناء الأجهزة والأدوات الحديثة لصيانة جميع أنواع سيارات {{$article ->car->name ?? ''}} ، ولهذا نحن مميزين بخدماتنا عالية الجودة، وإليك بعض مميزاتنا والتي جعلتنا نتصدر قائمة أصحاب الكراجات {{get_default_country()}} :</p>
                                <ul>
                                    <li class="maker-list-inside-article">لدينا ورشة صيانة مجهزة على أعلى مستوى، وبها كل الماكينات والمعدات التي تستخدم في الكشف وصيانة السيارات.</li>
                                    <li class="maker-list-inside-article">لدينا فريق عمل ذو خبرة ومهارة كبيرة، ويتم تدريبهم بشكل دوري لمدهم بكافة المعلومات الجديدة الخاصة بصيانة السيارات.</li>
                                    <li class="maker-list-inside-article">نقدم خدماتنا في وقت قياسي وبدقة عالية، كما نقدم خدماتنا في أي مكان وفي أي وقت في محافظات {{get_default_country()}} المختلفة.</li>
                                    <li class="maker-list-inside-article">خدمة الدعم الفني تعمل على مدار الساعة، وذلك للرد على استفسارات العملاء وتلقي الطلبات وتسجيل البيانات الخاصة بالعميل.</li>
                                </ul>
                                <br>
                                <strong><center><a href="{{route('cities.index')}}" >خدمات لجميع  مدن ومناطق {{get_default_country()}}</a> </center></strong>

                                <h5 class="entry-sub-title margin-bottom"> {{$article ->service->name  ?? ''}}  فني {{$article ->car->name ?? ''}} متنقل خدمة طريق:</h5>
                                <p>تصل سيارات {{$article ->service->name  ?? ''}} {{$article ->car->name ?? ''}} إليكم أينما كنتم في {{get_default_country()}} ، والأندلس، واشبيلية، وأبرق خيطان، وخيطان، والعارضية، والعارضية الصناعية، والري الصناعية. وبالتأكيد نصل إليكم في الفردوس، وضاحية صباح الناصر، وضاحية عبد الله المبارك، والضجيج، الشدادية، والعمرية، والرابية، والرحاب، والرقعي، وجليب الشيوخ. ولابد لنا من نصيحتك في أن تحتفظ برقمنا&nbsp;على جوالك فلا تدري أين ومتى تحتاج خدماتنا.</p>

                                <h5 class="entry-sub-title margin-bottom" >خدمة عملاء {{$article ->service->name  ?? ''}} {{$article ->car->name ?? ''}}  في {{$article ->city->name ?? '' }} :</h5>
                                <p>{{$article ->service->name  ?? ''}} سيارات {{$article ->car->name ?? ''}} يقدم لكم جمِيع الضمانات والكفالات اللازمة وذَلك لعدم حدوث أي أضرار أو أخطاء لسيارتك {{$article ->car->name ?? ''}} تحدث بعد ذلك قد تتسبب في توقف السّيارة عن السير، بهدف تحقيق الأمن والسلام والحماية إلى جمِيع أفراد العائلة والأطفال وجميع عملائنا الكرام على الطرق الصحراوية السّريعة.</p>
                                <strong><center><a href="{{route('site.index')}}">خدمة المساعدة على الطريق</a>&nbsp;تقوم بها الورشة المتنقلة بأسرع الإمكانيات وخلال وقت قصير،.</center></strong>
                                <p>وورشة صيانة كراج سيارات {{$article ->car->name ?? ''}} تتميز أيضا بالتجديد الكامل والمستمر في كل ما يتعلق بخدمات الصيانة. سواء كان التجديد المستمر إما في معدات الورشة أو في الخدمات الرائعة والعروض الممتازة المقدمة كل يوم في مدينة {{$article ->city->name ?? '' }}، كراج متنقل {{get_default_country()}} لتصليح سيارات . فني يرسل دوما لكل عميل تتعطل سيارته في أي وقت ورشة تصل لحيث مكانه وتصلح له سيارته في أي أقل وقت وأيضا خلال وقت قصير. فورشة صيانة السيارات مجهزة تماما فني بنتلي وجميع قطع الغيار والسوائل والعاملين بالورشة أصبحوا من الخبراء فهم مهندسين وفنيين ميكانيكيين يعرفون تماما في كل ما يتعلق بأي أعطال في السيارة أو المركبة. ولكي يحصل أي زبون على الصيانة لأي سيارة يملكها عليه في أي وقت عليه فقط الاتصال على رقم فني.</p>
                                <strong><h6><center>خدمة المساعدة على الطريق تقوم بها الورشة المتنقلة بأسرع الإمكانيات  <a href="https://www.instagram.com/carservicekuwait/" rel="nofollow" target="_blank">للاستفسار هنا</a></center></h6></strong>


                            </div>
                            <p>{!! $article ->description !!} </p>
                            @else
                            <p>{!! $article ->description !!} </p>
                            @endif

                            <div class="post-bottom-meta post-bottom-tags post-tags-modern">
                                    @isset($article->tags)
                                        <b><span id="more-1787"></span> @lang('front/home-blade.tags'):</b><br>
                                        @foreach($article->tags as $tag)
                                            <a class="post-cat tie-cat-6" href="{{url('tags/'.$tag->slug )}}" title="{{$tag -> name}}">{{$tag -> name}}</a>
                                        @endforeach
                                    @endisset
                            </div>
                        </div>
                    </div>
                    @include('front.includes.first-main-sidebar')
                    @include('front.includes.second-main-sidebar')
                    @include('front.pages.articles.featured-articles')
                </div>
            </div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
