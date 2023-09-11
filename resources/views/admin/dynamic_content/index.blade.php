@extends('admin.layouts.admin')
@section('title','قسم الصفحات الافتراضية ')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">قسم الصفحات الافتراضية </h3>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Basic form layout section start -->
                                <section id="basic-form-layouts">
                                    <div class="row match-height">
                                        <div class="col-md-12">
                                            <div class="card">

                                                @include('admin.includes.alerts.success')
                                                @include('admin.includes.alerts.errors')
                                                <div class="card-content collapse show">
                                                    <div class="card-body">
                                                        <form class="form" action="{{route('admin.dynamic_content.store')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <!-- the photo of the article -->
                                                            <div class="form-group">

                                                                    <label id="projectinput7" class="btn btn-float btn-float-lg btn-outline-pink">
                                                                        <i class="la la-camera"><img  id="photo"  width="400" height="200"/></i><span>يجب ان يكون حجم الصورة  "780x470px"</span>
                                                                        <input type="file" id="file" name="photo"  style="display: none"   onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])">
                                                                        <span class="file-custom"></span>
                                                                    </label>


                                                                </label>
                                                                @error('photo')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-body">
                                                                <h4 class="form-section"><i class="ft-home"></i>اضافة عنوان القسم الذي تتبع له الصفحة  </h4>
                                                                <div class="row">
                                                                    {{--  عنوان الكود --}}
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <input type="text" id="name"
                                                                                    class="form-control"
                                                                                    placeholder="city | tag | car"
                                                                                    value="{{old('name')}}"
                                                                                    name="name">
                                                                            @error("name")
                                                                            <span class="text-danger"> {{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-body">
                                                                <h4 class="form-section"><i class="ft-home"></i>اضافة معلومات الصفحة </h4>
                                                                <div class="row" >
                                                                    {{--  محتوى المقالة --}}
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <b class="success">العلامات الدلالية: </b> <label for="projectinput1"><?php echo '{{$tag->name}} => -  الكلمة المفتاحية(العلامة الدلالية)';?> || <?php  echo '{{get_default_country()}} => اسم الدولة الافتراضي'?></label><br>
                                                                            <b class="warning"> المدن: </b> <label for="projectinput1"><?php echo '{{$slugTag}} => -  الكلمة المفتاحية(العلامة الدلالية)';?> || <?php echo '{{$city->name}} => - اسم المدينة';?> || <?php  echo '{{get_default_country()}} => اسم الدولة الافتراضي'?></label><br>
                                                                            <b class="primary"> السيارات (car) : </b> <label for="projectinput1"><?php echo '{{$slugTag}} => -  الكلمة المفتاحية(العلامة الدلالية)';?> || <?php echo '{{$car->name}} => - اسم السيارة';?> || <?php  echo '{{get_default_country()}} => اسم الدولة الافتراضي'?></label>

                                                                            <div class="form-group">
                                                                                <textarea id="ckeditor" name="content" value="{{old('content')}}" ></textarea>
                                                                                <small id="content_error" class="form-text text-danger"></small>
                                                                                <script> CKEDITOR.replace('ckeditor');</script>
                                                                            </div>
                                                                            @error("content")
                                                                            <span class="text-danger">{{$message}}</span>
                                                                            @enderror
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
                                                                                   class="card-name ml-1">الحالة</label>
                
                                                                            @error("active")
                                                                            <span class="text-danger"> </span>
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
                                                                    <i class="la la-check-square-o"></i>اضافة
                                                                </button>
                                                            </div>
                
                                                        </form>
                                                        <!-- // Basic form layout section end -->
                                                        <div class="card-content collapse show">
                                                            <div class="card-body card-dashboard">
                                                                <table
                                                                    class="table display nowrap table-striped table-bordered scroll-horizontal">
                                                                    <thead class="">
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>اسم الصفحة</th>
                                                                        <th>الحالة</th>
                                                                        <th>الصورة</th>
                                                                        <th>الإجرءات</th>
                                                                        <th></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @isset($dynamic_contents)
                                                                        @foreach($dynamic_contents as $dynamic_content)
                                                                            <tr>
                                                                                <td>{{$dynamic_content ->id}}</td>
                                                                                <td> 
                                                                                    @if($dynamic_content ->name === "tag")
                                                                                    <b class="success">العلامات الدلالية</b>
                                                                                    @elseif($dynamic_content ->name === "car")
                                                                                    <b class="primary">السيارات </b>
                                                                                    @elseif($dynamic_content ->name === "city")
                                                                                    <b class="warning">المدن </b>
                                                                                    @endif
                                                                                <td>
                                                                                    @if($dynamic_content -> getActive() === "active" || $dynamic_content -> getActive() === "مفعل")
                                                                                        <b class="success">{{$dynamic_content -> getActive() }}
                                                                                            @else
                                                                                                <b class="warning">{{$dynamic_content -> getActive()}}</b>
                                                                                    @endif
                                                                                </td>
                                                                                <td> <img style="width: 150px; height: 100px;" src="{{$dynamic_content ->photo}}"></td>

                                                                                <td>
                                                                                    <div class="btn-group" role="group"
                                                                                            aria-label="Basic example">
                                                                                        <a href="{{route('admin.dynamic_content.edit',$dynamic_content -> id)}}"
                                                                                            class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                                        <a href="{{route('admin.dynamic_content.delete',$dynamic_content -> id)}}"
                                                                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                                                        @if($dynamic_content -> active == 0)
                                                                                            <a href="{{route('admin.dynamic_content.status',$dynamic_content -> id)}}"
                                                                                                class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                                                                        @else
                                                                                            <a href="{{route('admin.dynamic_content.status',$dynamic_content -> id)}}"
                                                                                                class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                                                إلغاء التفعيل</a>
                                                                                        @endif


                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endisset
                                                                    </tbody>
                                                                </table>
                                                                <div class="justify-content-center d-flex">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('assets/admin/vendors/js/editors/ckeditor/ckeditor.js')}}"></script>


