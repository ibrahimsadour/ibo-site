<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
       <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

              <li class="{{ Request::is('admin') ? 'nav-item active' : '' }}"><a href="{{route('admin.dashboard')}}"><i class="la la-home"></i><span
                            class="menu-title" data-i18n="nav.add_on_drag_drop.main">لوحة التحكم</span></a>
              </li>
              {{--   الصفحات   --}}
              <li class="{{ Request::is('admin/cars') ? 'nav-item active' : '' }}">
               <a href=""><i class="icon-globe"></i>
                   <span class="menu-title" data-i18n="nav.dash.main">الصفحات</span>
                   <span class="badge badge badge-info badge-pill float-right mr-2">6</span>
               </a>
               <ul class="menu-content">
                   <li class="{{ Request::is('admin/home-page') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.home-page')}}"> الرئيسية</a></li>
                   <li class="{{ Request::is('admin/dynamic-content') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.dynamic_content.index')}}" > الصفحات الافتراضية </a></li>
                   <li class="{{ Request::is('admin/about') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.about')}}" > من نحن </a></li>
                   <li class="{{ Request::is('admin') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.cars')}}" > الاتصال </a></li>
                   <li class="{{ Request::is('admin/privacy-policy') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.privacy-policy')}}" > سياسة الخصوصية </a></li>
                   <li class="{{ Request::is('admin/terms-condition') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.terms-condition')}}" > اتفاقية الاستخدام </a></li>
               </ul>
           </li>

               {{--   الاقسام   --}}
               <li class="{{ Request::is('admin/sections') ? 'nav-item active' : '' }}">
                   <a href=""><i class="icon-globe"></i>
                       <span class="menu-title" data-i18n="nav.dash.main">اسماءالاقسام</span>
                       <span class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\Section::count()}}</span>
                   </a>
                   <ul class="menu-content">
                       <li class="{{ Request::is('admin/sections') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.sections')}}"
                                                                                      data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                       </li>
                       <li class="{{ Request::is('admin/cars/sections') ? 'active' : '' }}" >
                           <a class="menu-item" href="{{route('admin.sections.create')}}" data-i18n="nav.dash.crypto">أضف قسم جديد </a>
                       </li>
                   </ul>
               </li>
                {{--   السيارات   --}}
                @if(check_if_cars_active() === 1)
                    <li class="{{ Request::is('admin/cars') ? 'nav-item active' : '' }}"  style="color: #787878;">
                     <a href="">
                            <span class="menu-title" data-i18n="nav.dash.main">اسماء ماركات السيارات</span>
                            <span class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\Car::count()}}</span>
                     </a>
                     <ul class="menu-content">
                            <li class="{{ Request::is('admin/cars') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.cars')}}"
                                                 data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                            </li>
                            <li class="{{ Request::is('admin/cars/create') ? 'active' : '' }}" >
                                   <a class="menu-item" href="{{route('admin.cars.create')}}" data-i18n="nav.dash.crypto">أضف سيارة جديدة </a>
                            </li>
                     </ul>
              </li>
              @else
              <li class="{{ Request::is('admin/cars') ? 'nav-item active' : '' }}">
                <a href="{{route('admin.cars')}}" style="    color: #ff4961;">
                       <span class="menu-title" data-i18n="nav.dash.main">هذا القسم معطل</span>
                       <span class="badge badge badge-danger badge-pill float-right mr-2">معطل</i></span>
                    </a>
         </li>
              @endif

                 {{--   المدن   --}}
              <li class="{{ Request::is('admin/cities') ? 'nav-item active' : '' }}"><a href=""><i class="ft-map-pin"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">اسماء المدن</span>
                      <span class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\City::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/cities') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.cities')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل</a>
                    </li>
                    <li class="{{ Request::is('admin/cities/create') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.cities.create')}}" data-i18n="nav.dash.crypto"> اضافة مدينة جديدة </a>
                    </li>
                </ul>
              </li>
           {{--   الخدمات   --}}
           <li class="{{ Request::is('admin/services') ? 'nav-item active' : '' }}">
               <a href=""><i class="icon-globe"></i>
                   <span class="menu-title" data-i18n="nav.dash.main">الخدمات</span>
                   <span class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\Service::count()}}</span>
               </a>
               <ul class="menu-content">
                   <li class="{{ Request::is('admin/services') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.services')}}"
                                                                                  data-i18n="nav.dash.ecommerce"> عرض كل الخدمات</a>
                   </li>
                   <li class="{{ Request::is('admin/services/create') ? 'active' : '' }}" >
                       <a class="menu-item" href="{{route('admin.services.create')}}" data-i18n="nav.dash.crypto">أضف خدمة جديدة </a>
                   </li>
               </ul>
           </li>

           {{--   العلامات   --}}
           <li class="{{ Request::is('admin/tags') ? 'nav-item active' : '' }}">
               <a href=""><i class="la la-tags"></i>
                   <span class="menu-title" data-i18n="nav.dash.main">العلامات</span>
                   <span class="badge badge badge-warning badge-pill float-right mr-2">{{App\Models\Tag::count()}}</span>
               </a>
               <ul class="menu-content">
                   <li class="{{ Request::is('admin/tags') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.tags')}}"
                                                                                      data-i18n="nav.dash.ecommerce"> عرض كل العلامات</a>
                   </li>
                   <li class="{{ Request::is('admin/tags/create') ? 'active' : '' }}" >
                       <a class="menu-item" href="{{route('admin.tags.create')}}" data-i18n="nav.dash.crypto">أضف علامة جديدة </a>
                   </li>
               </ul>
           </li>

           <li class="{{ Request::is('admin/articles') ? 'nav-item active' : '' }}">
               <a href=""><i class="la la-briefcase"></i>
                   <span class="menu-title" data-i18n="nav.dash.main">المقالات</span>
                   <span class="badge badge badge-warning badge-pill float-right mr-2">{{App\Models\Article::count()}}</span>
               </a>
               <ul class="menu-content">
                   <li class="{{ Request::is('admin/articles') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.articles')}}"
                                                                                      data-i18n="nav.dash.ecommerce"> عرض كل المقالات</a>
                   </li>
                   <li class="{{ Request::is('admin/articles/create') ? 'active' : '' }}" >
                       <a class="menu-item" href="{{route('admin.articles.create')}}" data-i18n="nav.dash.crypto">أضف مقالة جديدة </a>
                   </li>
               </ul>
           </li>

            <li class="nav-item has-sub"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="Templates">SEO</span></a>
                <ul class="menu-content" style="">
                    {{--   روابط غوغل  --}}
                    <li class="{{ Request::is('admin/google') ? 'nav-item active' : '' }}">
                        <a href=""><i class="icon-globe"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">روابط غوغل Google codes</span>
                        </a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('admin/google') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.google')}}"
                                                                                        data-i18n="nav.dash.ecommerce"> عرض كل الاكواد</a>
                            </li>
                            <li class="{{ Request::is('admin/google/create') ? 'active' : '' }}" >
                                <a class="menu-item" href="{{route('admin.google.create')}}" data-i18n="nav.dash.crypto">أضف كود جديد </a>
                            </li>
                        </ul>
                    
                    </li>   
                    {{--   خريطة الموقع   --}}
                    <li class="{{ Request::is('admin/cars') ? 'nav-item active' : '' }}">
                        <a href=""><i class="icon-globe"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">خريطة الموقع</span>
                        </a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('sitemap-index')}}">الصفحات</a></li>
                            <li><a class="menu-item" href="{{route('sitemap-articles')}}" > المقالات </a></li>
                            <li class="has-sub is-shown"><a class="menu-item" href="#"><i></i><span data-i18n="Buttons">خريطة المدن</span></a>
                            <ul class="menu-content" style="">
                            <li class=""><a class="menu-item" href="{{route('sitemap-cities')}}"><i></i><span data-i18n="Basic Buttons">المدن فقط</span></a>
                            </li>
                            <li class=""><a class="menu-item" href="{{route('sitemap-city-tags')}}"><i></i><span data-i18n="Extended Buttons">المدن مع العلامات الدلالية</span></a>
                            </li>
                        </ul>
                        </li>
                        @if(check_if_cars_active() === 1)
                        <li class="has-sub is-shown"><a class="menu-item" href="#"><i></i><span data-i18n="Buttons">خريطة السيارات</span></a>
                            <ul class="menu-content" style="">
                            <li class=""><a class="menu-item" href="{{route('sitemap-cars')}}"><i></i><span data-i18n="Basic Buttons">السيارات فقط</span></a>
                            </li>
                            <li class=""><a class="menu-item" href="{{route('sitemap-car-tags')}}"><i></i><span data-i18n="Extended Buttons">السيارات مع العلامات الدلالية</span></a>
                            </li>
                            </ul>
                        </li>
                        @endif
                            <li><a class="menu-item" href="{{route('sitemap-tags')}}" >العلامات الدلالية</a></li>
                            <li><a class="menu-item" href="{{route('sitemap-services')}}" >الخدمات</a></li>
                            <li><a class="menu-item" href="{{route('sitemap-sections')}}" >الاقسام</a></li>

                        </ul>
                    </li>
                    {{--   Robots.txt   --}}
                    <li class="{{ Request::is('admin/robots') ? 'nav-item active' : '' }}">
                        <a href="{{route('admin.robots.index')}}"><i class="icon-globe"></i>
                            <span>Robots.txt</span>
                        </a>
                    </li>  
                </ul>
            </li>








            {{--   ذاكرة التخزين المؤقت   --}}
            <li>    
                <a><i class="la la-tags"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">ذاكرة التخزين المؤقت </span>
                    <span class="badge badge badge-success badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('admin.cache.clear.cache')}}">Cache Clear</a></li>
                    <li><a class="menu-item" href="{{route('admin.cache.optimize')}}">Optimize</a></li>
                    <li><a class="menu-item" href="{{route('admin.cache.optimize.clear')}}">Optimize clear</a></li>
                    <li><a class="menu-item" href="{{route('admin.cache.route.cache')}}">route cache</a></li>
                    <li><a class="menu-item" href="{{route('admin.cache.route.clear')}}">route clear</a></li>
                    <li><a class="menu-item" href="{{route('admin.cache.view.clear')}}">view clear</a></li>
                    <li><a class="menu-item" href="{{route('admin.cache.view.cache')}}">view cache</a></li>
                    <li><a class="menu-item" href="{{route('admin.cache.config.cache')}}">config cache</a></li>
                    <li><a class="menu-item" href="{{route('admin.cache.config.clear')}}">config clear</a></li>
                    <li><a class="menu-item" href="{{route('admin.cache.compiled.clear')}}">compiled clear</a></li>

                </ul>
            </li>

            {{--   Footer   --}}
           <li class="{{ Request::is('admin/footer') ? 'nav-item active' : '' }}">
            <a href=""><i class="la la-tags"></i>
                <span class="menu-title" data-i18n="nav.dash.main">Footer</span>
                <span class="badge badge badge-warning badge-pill float-right mr-2">اضغط هنا للتعديل</span>
            </a>
            <ul class="menu-content">
                <li class="{{ Request::is('admin/footer') ? 'active' : '' }}"><a class="menu-item" href="{{route('admin.footer')}}"
                                                                                   data-i18n="nav.dash.ecommerce"> تعديل قائمة الصفحات</a>
                </li>
            </ul>
        </li>
            <li class=" nav-item"><a href="/" ><i class="la la-support"></i><span
                class="menu-title" data-i18n="nav.support_raise_support.main">الموفع</span></a>
            </li>
            <li class=" nav-item">
                <a target="_blank" href="https://demos.pixinvent.com/modern-html-admin-template/html/ltr/vertical-modern-menu-template/"><i
                        class="la la-text-height"></i>
                    <span class="menu-title" data-i18n="nav.support_documentation.main">Documentation</span>
                </a>
           </li>
       </ul>
    </div>
</div>
