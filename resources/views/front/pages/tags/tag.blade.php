@extends('front.layouts.master')
@if(isset($tag))
    @section('title',$tag ->name.' '.'في'.' '.get_default_country())
    @section('seo_keyword',$tag ->seo_keyword)
    @section('seo_description',$tag ->seo_description)
    @section('seo_url', URL::route('tag.index',$tag ->slug) )
@endif
@section('content')
    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
                        <nav id="breadcrumb">
                            <a href="{{ URL::route('site.index')}}" title="الرئيسية">الرئيسية</a><em class="delimiter">/</em>
                            <a href="{{ URL::route('tags.index')}}" title="جميع العلامات الدلالية">جميع العلامات الدلالية</a><em class="delimiter">/</em>
                            <span  title="{{$tag->name}}" >{{$tag->name}}</span><em class="delimiter"></em>

                        </nav>

                        @if(isset($tag_contents))
                            {{-- @foreach($tag_contents as $tag_content) --}}
                            {{--Imgage of the car--}}
                            <div class="featured-area">
                                <div class="featured-area-inner">
                                    <figure class="single-featured-image">
                                        <img
                                            width="780"
                                            height="470"
                                            src="{{$tag_contents ->photo}}"
                                            class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                            alt="{{$tag->name}}"
                                            title="{{$tag->name}}"
                                            decoding="async"
                                            data-main-img="1"
                                            loading="lazy"
                                        />
                                    </figure>
                                </div>
                            </div>
                            {{--Content of the article--}}
                            <div class="entry-content entry clearfix">
                                <?php 
                                $compiledTemplate = Blade::compileString($tag_contents ->content);

                                $compiledTemplate = str_replace(['&',''], [';',''], $compiledTemplate);

                                eval("?>$compiledTemplate<?php");?>

                            </div>
                            {{-- @endforeach --}}
                        @else
                        <div class="featured-area">
                            <div class="featured-area-inner">
                                <figure class="single-featured-image">
                                    <img
                                        width="780"
                                        height="470"
                                        src="{{asset('assets/images/pages/page-is-not-added.webp')}}"
                                        class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                        alt="page-is-not-added"
                                        title="page-is-not-added"
                                        decoding="async"
                                        data-main-img="1"
                                        loading="lazy"
                                    />
                                </figure>
                            </div>
                        </div>
                        @endif
                        {{-- Backlinks site --}}
                        <div class="back_link">
                            <br>
                            <center><h6> خدمات اعلانية اخرى في الكويت </h6></center>
                            <p><br>إذا كنت في الكويت وتبحث عن خدمات متعددة تلبي احتياجاتك، فأنت في المكان الصحيح. من <a href="https://scrapkw.com/" data-type="link" data-id="https://scrapkw.com/" target="_blank" title="سكراب السالمي" >سكراب السالمي</a> إلى <a href="https://scrap.kw-service.net/" data-type="link" data-id="https://scrap.kw-service.net/" target="_blank" title="قطع غيار سيارات">قطع غيار سيارات</a> وخدمات النقل وترفيه الـ <a href="https://sat.kw-service.net/sections/%D8%A7%D8%B4%D8%AA%D8%B1%D8%A7%D9%83%D8%A7%D8%AA-iptv-%D8%A8%D8%A7%D9%84%D9%83%D9%88%D9%8A%D8%AA" data-type="link" title="اشتراك IPTV" data-id="https://sat.kw-service.net/">اشتراك IPTV</a>،  <a href="https://cars.kw-service.net/" data-type="link" title="بنشر متنقل" data-id="https://cars.kw-service.net/">بنشر متنقل</a> يمكنك العثور على كل ما تحتاجه في هذا البلد الجميل.</p>

                            <p><strong>1. <a href="https://scrapkw.com/" data-type="link" data-id="https://scrapkw.com/" title="سكراب السالمي" target="_blank">سكراب السالمي</a>:</strong> إذا كنت بحاجة إلى التخلص من الأشياء القديمة والغير مرغوب فيها بشكل آمن وفعال، فإن ال <a href="https://scrapkw.com/" data-type="link" data-id="https://scrapkw.com/" target="_blank" title="سكراب السالمي">سكراب السالمي</a> هو حلاً مثاليًا لك. <strong>scrapkw.com</strong> يمكنك التخلص من سكراب بسهولة وبيئة بمساعدتهم.</p>
                            
                            <p><strong>2. <a href="https://scrap.kw-service.net/" data-type="link" data-id="https://scrap.kw-service.net/"  title="قطع غيار سيارات">قطع غيار سيارات</a>:</strong> صيانة وإصلاح السيارات مهمة ضرورية، وهنا في الكويت <strong>scrap.kw-service.net</strong> ، يمكنك العثور بسهولة على <a href="https://scrap.kw-service.net/" data-type="link" data-id="https://scrap.kw-service.net/" title="قطع غيار">قطع غيار الأصلية</a> والمعتمدة لسيارتك. هذه الخدمة تجعل صيانة سيارتك أمرًا ممكنًا وبأسعار معقولة.</p>
                            
                            <p><strong>3. <a href="https://auto.kw-service.net/" data-type="link" data-id="https://auto.kw-service.net/" title="كراج متنقل">كراج متنقل</a>:</strong> إذا كنت بحاجة إلى خدمة صيانة لسيارتك في مكانك، فال <a href="https://auto.kw-service.net/" data-type="link" data-id="https://auto.kw-service.net/" title="كراج متنقل">كراج متنقل</a> هو الحلا. يأتون إلى منزلك أو مكان عملك لإجراء الصيانة والإصلاحات الضرورية. ( <strong>auto.kw-service.net</strong> )</p>
                            
                            <p><strong>4. <a href="https://key.kw-service.net/" data-type="link" data-id="https://key.kw-service.net/" title="فتح سيارات الكويت">فتح سيارات الكويت</a>:</strong> إذا نسيت مفتاح سيارتك داخلها، فلا تقلق <strong>key.kw-service.net</strong> . خدمة <a href="https://key.kw-service.net/" data-type="link" data-id="https://key.kw-service.net/" title="فتح سيارات">فتح سيارات</a> الكويت متاحة على مدار الساعة لمساعدتك في الوصول إلى سيارتك بسرعة.</p>
                            
                            <p><strong>5. <a href="https://carservicekuwait.com/" data-type="link" data-id="https://carservicekuwait.com/" target="_blank" title="كراج تصليح سيارات">كراج تصليح سيارات</a></strong> <strong>:</strong> إذا كنت تحتاج إلى إجراء إصلاحات أكبر لسيارتك، <strong>carservicekuwait.com</strong>  فإن <a href="https://carservicekuwait.com/" data-type="link" data-id="https://carservicekuwait.com/" target="_blank" title="كراج تصليح">كراج تصليح السيارات</a> يقدم خدمات شاملة تضمن أن سيارتك في حالة ممتازة.</p>
                            
                            <p><strong>6. <a href="https://kw-moving.com/" data-type="link" data-id="https://kw-moving.com/" target="_blank" title="نقل عفش">نقل العفش الكويت</a>:</strong>  <strong>kw-moving.com</strong> عند الانتقال إلى منزل جديد في الكويت، ستحتاج إلى خدمة <a href="https://kw-moving.com/" data-type="link" data-id="https://kw-moving.com/" target="_blank" title="نقل عفش">نقل عفش</a>. هناك العديد من الشركات المتخصصة في هذا المجال لمساعدتك في <a href="https://kw-moving.com/" data-type="link" data-id="https://kw-moving.com/" target="_blank" title="نقل اثاث">نقل أثاث</a> منزلك بأمان.</p>
                            
                            <p><strong>7. <a href="https://sat.kw-service.net/sections/%D8%A7%D8%B4%D8%AA%D8%B1%D8%A7%D9%83%D8%A7%D8%AA-iptv-%D8%A8%D8%A7%D9%84%D9%83%D9%88%D9%8A%D8%AA" data-type="link" data-id="https://sat.kw-service.net/" title="اشتراك iptv">اشتراك IPTV</a>:</strong> لأولئك الذين يبحثون عن ترفيه منزلي،<strong>sat.kw-service.net</strong> يمكنك الاشتراك في <a href="https://sat.kw-service.net/sections/%D8%A7%D8%B4%D8%AA%D8%B1%D8%A7%D9%83%D8%A7%D8%AA-iptv-%D8%A8%D8%A7%D9%84%D9%83%D9%88%D9%8A%D8%AA" data-type="link" data-id="https://sat.kw-service.net/" title="اشتراك iptv">خدمة IPTV</a> للحصول على مجموعة متنوعة من القنوات والبرامج التلفزيونية عبر الإنترنت.بالاضافة الى <a href="https://sat.kw-service.net/sections/%D8%A7%D8%B4%D8%AA%D8%B1%D8%A7%D9%83%D8%A7%D8%AA-iptv-%D8%A8%D8%A7%D9%84%D9%83%D9%88%D9%8A%D8%AA" data-type="link" data-id="https://sat.kw-service.net/sections/%D8%A7%D8%B4%D8%AA%D8%B1%D8%A7%D9%83%D8%A7%D8%AA-iptv-%D8%A8%D8%A7%D9%84%D9%83%D9%88%D9%8A%D8%AA" title="فني ستلايت">فني ستلايت</a></p>

                            <p><strong>8. <a href="https://bazaralkhaleej.com/" data-type="link" data-id="https://bazaralkhaleej.com/" target="_blank" title="بازار الخليج">بازار الخليج</a>:</strong> إذا كنت مهتمًا بالتسوق واستكشاف منتجات متنوعة، <strong>bazaralkhaleej.com</strong> يمكنك زيارة <a href="https://bazaralkhaleej.com/" data-type="link" data-id="https://bazaralkhaleej.com/" target="_blank" title="بازار الخليج">بازار الخليج</a> للعثور على العديد من البضائع والسلع من جميع أنحاء المنطقة.</p>
                            
                            <p><strong>9.<a href="https://kw-service.com/" data-type="link" data-id="https://kw-service.com/" target="_blank" title="بنشر متنقل">بنشر متنقل</a> :</strong> <strong>kw-service.com </strong>خدمة <a href="https://kw-service.com/" data-type="link" data-id="https://kw-service.com/" target="_blank" title="بنشر">بنشر </a>المتنقل هي خدمة توفر للعملاء الراحة والسهولة في إجراء صيانة وإصلاح لسياراتهم دون الحاجة إلى الانتقال إلى ورشة العمل التقليدية. يأتي فنيو <a href="https://kw-service.com/" data-type="link" data-id="https://kw-service.com/" target="_blank" title="بنشر متنقل">بنشر متنقل</a> إلى موقع العميل، سواء كان ذلك في منزلهم أو مكان عملهم، <a href="https://kw-service.com/" data-type="link" data-id="https://kw-service.com/" target="_blank" title="تبديل تواير">تبديل تواير</a> والمعدات اللازمة للقيام بمجموعة متنوعة من الخدمات، مثل <a href="https://kw-service.com/" target="_blank" title="تبديل بطارية">تبديل بطارية</a> ، و<a href="https://kw-service.com/" data-type="link" data-id="https://kw-service.com/" target="_blank" title="تبديل بنشر">تبديل بنشر</a> ، <a href="https://kw-service.com/" data-type="link" data-id="https://kw-service.com/" target="_blank" title="بنجرجي">بنجرجي</a>، وأكثر من ذلك.</p>
                            
                            <p><strong>10. <a href="https://kwgarage.com/" data-type="link" data-id="https://kwgarage.com/" target="_blank" title="معاونات هيدروليك">معاونات هيدروليك</a></strong> <strong>: kwgarage.com</strong> تشمل خدمة <a href="https://kwgarage.com/" data-type="link" data-id="https://kwgarage.com/" target="_blank" title="معاونات هيدروليك الكويت">معاونات هيدروليك الكويت</a> للسيارات في الكويت صيانة دورية لأنظمة الهيدروليك في السيارة. يتم فحص وتقديم الصيانة اللازمة للمكابح الهيدروليكية والمساعدين وأنظمة التوجيه للحفاظ على أداء سيارتك بشكل ممتاز.</p>
                            
                            <p>باختصار، في الكويت، <a href="https://kw-service.net/" data-type="link" data-id="https://kw-service.net/" title="اعلانات الكويت">اعلانات الكويت</a>  <strong>kw-service.net</strong> يمكنك العثور على جميع الخدمات والمنتجات التي تحتاجها لجعل حياتك أسهل وأكثر متعة. استفد من هذه الخدمات المتنوعة لتلبية احتياجاتك بكل سهولة وراحة.</p>
                            
                        </div>
                        <div class="post-bottom-meta post-bottom-tags post-tags-modern">
                            <b><span id="more-1787"></span>للمزيد حول خدمة {{$tag->name}} و جميع الخدمات المتعلقة بالسيارات في {{get_default_country()}} يمكنك زيارة احد مواقعنا:</b><br>
                            <br>
                            <a class="post-cat tie-cat-6" href="https://kw-service.com/" title="بنشر متنقل">بنشر متنقل</a>
                            <a class="post-cat tie-cat-6" href="https://scrapkw.com/" title="سكراب السالمي">سكراب السالمي</a>
                            <a class="post-cat tie-cat-6" href="https://carservicekuwait.com/" title="كراج متنقل">كراج متنقل</a>
                            <a class="post-cat tie-cat-6" href="https://carservicekuwait.com/" title="بازار الخليج">بازار الخليج</a>
                            <a class="post-cat tie-cat-6" href="http://kw-service.net/" title="اعلانات الكويت">اعلانات الكويت</a>
                            <a class="post-cat tie-cat-6" href="https://kw-moving.com/" title="نقل عفش">نقل عفش</a>
                            <a class="post-cat tie-cat-6" href="https://sat.kw-service.net/" title="فني ستلايت الكويت">فني ستلايت الكويت</a>
                            <a class="post-cat tie-cat-6" href="https://auto.kw-service.net/" title="تبديل بطارية">تبديل بطارية</a>
                            <a class="post-cat tie-cat-6" href="https://cars.kw-service.net/" title="تبديل تواير">تبديل تواير</a>
                            <a class="post-cat tie-cat-6" href="https://scrap.kw-service.net/" title="قطع غيار سيارات في الكويت<">قطع غيار سيارات في الكويت</a>
                            <a class="post-cat tie-cat-6" href="https://sa-4sale.com/" title="بنشر السعودية">بنشر السعودية</a>
                        </div>
                    </div>
                    @include('front.includes.first-main-sidebar')
                    @include('front.includes.second-main-sidebar')
                    @include('front.pages.articles.featured-articles')
                    {{--Content of the article--}}
                </div>
            </div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
