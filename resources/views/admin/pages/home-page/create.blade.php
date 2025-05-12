@extends('admin.layouts.admin')
@section('title','أضافة معلومات الصفحة الرئيسية')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home-page')}}">قسم الصفحة الرئيسية</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">

                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.home_page.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            {{-- Images Section --}}
                                            <h4 class="form-section"><i class="ft-image"></i> اضافة صور الموقع </h4>
                                            <div class="row">
                                                @foreach([
                                                    'logo' => ['label' => 'اضافة شعار الموقع (W250xH100px)', 'width' => 250, 'height' => 100],
                                                    'background' => ['label' => 'اضافة خلفية الموقع (W2000xH475px)', 'width' => 300, 'height' => 150],
                                                    'default_seo_image' => ['label' => 'اضافة default_seo_image الموقع (W780xH470px)', 'width' => 300, 'height' => 150],
                                                    'ads_sidebar' => ['label' => 'اضافة ads_sidebar الموقع (W336xH280px)', 'width' => 300, 'height' => 150],
                                                ] as $name => $info)
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="btn btn-float btn-float-lg btn-outline-pink">
                                                                <i class="la la-camera">
                                                                    <img id="{{ $name }}_preview" width="{{ $info['width'] }}" height="{{ $info['height'] }}" />
                                                                </i> 
                                                                {{ $info['label'] }}
                                                                <input type="file" id="{{ $name }}" name="{{ $name }}" style="display: none;" onchange="previewImage('{{ $name }}')">
                                                            </label>
                                                            @error($name)
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <script>
                                                    function previewImage(id) {
                                                        const input = document.getElementById(id);
                                                        const preview = document.getElementById(id + '_preview');

                                                        if (input.files && input.files[0]) {
                                                            const reader = new FileReader();
                                                            reader.onload = function (e) {
                                                                preview.src = e.target.result;
                                                            };
                                                            reader.readAsDataURL(input.files[0]);
                                                        }
                                                    }
                                                </script>

                                            </div>                                            
                                            {{-- basic info section --}}
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>اضافة معلومات الصفحة الرئيسية </h4>
                                                <!-- title of the erticle and the slug -->
                                                <div class="row">
                                                    {{--  البلد الافتراضي  --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">اسم الدولة</label>
                                                            <input type="text" id="default_country"
                                                                    class="form-control"
                                                                    value="{{old('default_country')}}"
                                                                    name="default_country">
                                                            @error("default_country")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  عنوان الموقع --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">H1عنوان الموقع </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   value="{{old('title')}}"
                                                                   name="title"                                                                    
                                                                   maxlength="80"
                                                                   oninput="updateCharCount(this, 'title')">
                                                            <small id="title" class="char-counter"></small>
                                                            @error("title")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  Phone number --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> رقم الهاتف للتواصل
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="عنوان الموقع H2"
                                                                   value="{{old('call_us')}}"
                                                                   name="call_us">
                                                            @error("call_us")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  محتوى المقالة --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">وصف الموقع: </label>
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="description" value="{{old('description')}}" >{{old('description')}}</textarea>
                                                                <small id="description_error" class="form-text text-danger"></small>
                                                            </div>
                                                            @error("description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  Facebook--}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Facebook</label>
                                                            <input type="text" id="facebook_link"
                                                                class="form-control"
                                                                value="{{old('facebook_link')}}"
                                                                name="facebook_link">
                                                            @error("facebook_link")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  instagram --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Instagram</label>
                                                            <input type="text" id="instagram_link"
                                                                class="form-control"
                                                                value="{{old('instagram_link')}}"
                                                                name="instagram_link">
                                                            @error("instagram_link")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  Twitter --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Twitter</label>
                                                            <input type="text" id="twitter_link"
                                                                class="form-control"
                                                                value="{{old('twitter_link')}}"
                                                                name="twitter_link">
                                                            @error("twitter_link")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- extra info section --}}
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>اضافة معلومات اضافية </h4>
                                                <div class="row" >
                                                    {{--   معلومات اضافية--}}
                                                    {{--  h2_title --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عنوان الموقع H2 (اختياري)
                                                            </label>
                                                            <input type="text" id="name"
                                                                class="form-control"
                                                                placeholder="عنوان الموقع H2"
                                                                value="{{old('h2title')}}"
                                                                name="h2title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">معلومات اضافية  :(اختياري) </label>
                                                            <div class="form-group">
                                                                <textarea id="ckeditor" name="extra_info" value="{{old('extra_info')}}" >{{old('extra_info')}}</textarea>
                                                                <script> CKEDITOR.replace('ckeditor' );</script>                                                            
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            {{-- SEO  section --}}
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>اضافة معلومات SEO </h4>
                                                <!-- title of the erticle and the slug -->
                                                <div class="row">
                                                    {{--  عنوان SEO --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عنوان المقالة </label>
                                                            <input type="text" id="seo_title"
                                                                    class="form-control"
                                                                    placeholder="مثال(بنشر متنقل - كهربائي سيارات)"
                                                                    value="{{old('seo_title')}}"
                                                                    name="seo_title"
                                                                    maxlength="80"
                                                                    oninput="updateCharCount(this, 'seo_title_counter')">
                                                            <small id="seo_title_counter" class="char-counter"></small>
                                                            @error("seo_title")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  SEo الوصف --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">الوصف
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="يجب الا يتجاوز االوصف 160 حرفا"
                                                                   value="{{old('seo_description')}}"
                                                                   name="seo_description"maxlength="160"
                                                                placeholder="يجب الا يتجاوز الوصف 160 حرفا"
                                                                oninput="updateCharCount(this, 'seo_description_counter')">
                                                            <small id="seo_description_counter" class="char-counter"></small>
                                                            @error("seo_description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    {{--   كلمات البحث الرئيسية --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">كلمات البحث الرئيسية: </label>
                                                            <div class="form-group">
                                                                <textarea multiple name="seo_keyword" placeholder="بنشر, تبديل تواير, كهربائي, ميكانيكي" class="form-control" value="{{old('seo_keyword')}}" >{{old('seo_keyword')}}</textarea>
                                                            </div>
                                                            @error("seo_keyword")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- the status of the article -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1"
                                                               name="active"
                                                               id="switcheryColor4"
                                                               class="switchery" data-color="success"
                                                               checked/>
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">الحالة</label>

                                                        @error("active")
                                                        <span class="text-danger"> </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> الرجوع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>اضافة
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection
<!-- Text editor (ckeditor)  -->
<script src="{{asset('assets/admin/vendors/js/editors/ckeditor/ckeditor.js')}}"></script>

