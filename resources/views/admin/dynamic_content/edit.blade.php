@extends('admin.layouts.admin')
@section('title','>تعديل المحتوى الافتراضي الخاص بالعلامات (Dynamic Tag Content)')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">>تعديل المحتوى الافتراضي الخاص بالعلامات (Dynamic Tag Content)
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
                                        <form class="form"
                                              action="{{route('admin.dynamic_content.update',$dynamic_content -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input name="id" value="{{$dynamic_content -> id}}" type="hidden">

                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$dynamic_content->photo}}"
                                                        style="width: 10%; height: 10%;" alt="صورة القسم  ">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label id="projectinput7" class="btn btn-float btn-float-lg btn-outline-pink">
                                                    <i class="la la-camera"></i>تعجيل صورة للصفحة<span>يجب ان يكون حجم الصورة  "780x470px"</span>
                                                    <input type="file" style="display: none;" id="file" name="photo" >
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            {{--edit name--}}
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> تعديل الكود</h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> عنوان الكود</label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   value="{{$dynamic_content -> name}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                {{--  محتوى المقالة --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1">محتوى المقالة: </label><br>
                                                        <b class="success">العلامات الدلالية (tag): </b> <label for="projectinput1"><?php echo '{{$tag->name}} => -  الكلمة المفتاحية(العلامة الدلالية)';?> || <?php  echo '{{get_default_country()}} => اسم الدولة الافتراضي'?></label><br>
                                                        <b class="warning"> المدن (city): </b> <label for="projectinput1"><?php echo '{{$slugTag}} => -  الكلمة المفتاحية(العلامة الدلالية)';?> || <?php echo '{{$city->name}} => - اسم المدينة';?> || <?php  echo '{{get_default_country()}} => اسم الدولة الافتراضي'?></label><br>
                                                        <b class="primary"> السيارات (car) : </b> <label for="projectinput1"><?php echo '{{$slugTag}} => -  الكلمة المفتاحية(العلامة الدلالية)';?> || <?php echo '{{$car->name}} => - اسم السيارة';?> || <?php  echo '{{get_default_country()}} => اسم الدولة الافتراضي'?></label>

                                                        <div class="form-group">
                                                            <textarea id="ckeditor" class="form-control" name="content" value="content">{{$dynamic_content->content}} </textarea>
                                                            <small id="content_error" class="form-text text-danger"></small>
                                                            <script> 
                                                            CKEDITOR.replace('ckeditor', {
                                                                entities: false,
                                                       
                                                            });
                                                            </script>
                                                        </div>
                                                        @error("name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-body">
                                                {{--edit status --}}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   @if($dynamic_content ->active == 1)checked @endif/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">الحالة</label>

                                                            @error("active")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> الرجوع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> تحديث
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
