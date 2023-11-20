@extends('admin.layouts.admin')
@section('title','قسم الاكواد')
@section('content')
    <div class="app-content content">
        
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">قسم Footer</h3>
                </div>
            </div>
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-underline no-hover-bg">
                                <li class="nav-item">
                                    <a class="nav-link" id="base-pages" data-toggle="tab" aria-controls="pages" href="#pages" aria-expanded="true">صفحات الموقع</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-social-media" data-toggle="tab" aria-controls="social-media" href="#social-media" aria-expanded="true">وسال التواصل الاجتماعي</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="base-copyright" data-toggle="tab" aria-controls="copyright" href="#copyright" aria-expanded="false">copyright</a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                                {{-- footer pages --}}
                                <div role="tabpanel" class="tab-pane" id="pages" aria-expanded="true" aria-labelledby="base-pages">
                                    <div class="row">
                                        <div class="col-12 col-xl-12 border-right-blue-grey border-right-lighten-4 pr-2">
                                            <form class="form form-horizontal" action="{{route('admin.footer.store')}}" method="POST" enctype="multipart/form-data">
                                                <div class="form-body" >
                                                    {{ csrf_field() }}
                                                    <div class="form-body">
                                                        <h4 class="form-section"><i class="ft-home"></i>اضافة رابط صفحة </h4>
                                                        <img src="{{asset('assets/admin/images/Pictures-clarification/footer-pages.png')}}" width="1200" height="400">
                                                        
                                                        <div class="row">
                                                            {{--  عنوان الكود --}}
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">عنوان الصفحة </label>
                                                                    <input type="text" id="title"
                                                                            class="form-control"
                                                                            placeholder="الخدمات | اتصل بنا | الرئيسية"
                                                                            value="{{old('title')}}"
                                                                            name="title">
                                                                    @error("title")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            {{--  رابط الصفحة --}}
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">رابط الصفحة</label>
                                                                    <input type="text" id="link"
                                                                            class="form-control"
                                                                            placeholder="https://kw-moving.com/tags"
                                                                            value="{{old('link')}}"
                                                                            name="link">
                                                                    @error("link")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                                <span class="text-danger">{{$message}} </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <button type="button" class="btn btn-warning mr-1"
                                                                onclick="history.back();">
                                                            <i class="ft-x"></i> الرجوع
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i>اضافة
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
                                                            <!-- // Basic form layout section end -->
                                                            <div class="card-content collapse show">
                                                                <div class="card-body card-dashboard">
                                                                    <table
                                                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                                                        <thead>
                                                                        <tr>صفحات الموقع
                                                                            <th>ID</th>
                                                                            <th>العنوان</th>
                                                                            <th> الرابط</th>
                                                                            <th>الحالة</th>
                                                                            <th>الإجرءات</th>
                                                                            <th></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @isset($page_links)
                                                                            @foreach($page_links as $page_link)
                                                                                <tr>
                                                                                    <td>{{$page_link ->id}}</td>
                                                                                    <td>{{$page_link ->title}}</td>
                                                                                    <td>{{ Str::limit($page_link ->link, 45) }}</td>

                                                                                    <td>
                                                                                        @if($page_link -> getActive() === "active" || $page_link -> getActive() === "مفعل")
                                                                                            <b class="success">{{$page_link -> getActive() }}
                                                                                                @else
                                                                                                    <b class="warning">{{$page_link -> getActive()}}</b>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="btn-group" role="group"
                                                                                                aria-label="Basic example">
                                                                                            <a href="{{route('admin.footer.edit',$page_link -> id)}}"
                                                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                                            <a href="{{route('admin.footer.delete',$page_link -> id)}}"
                                                                                                class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                                                            @if($page_link -> active == 0)
                                                                                                <a href="{{route('admin.footer.status',$page_link -> id)}}"
                                                                                                    class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                                                                            @else
                                                                                                <a href="{{route('admin.footer.status',$page_link -> id)}}"
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
                                {{-- footer social media --}}
                                <div role="tabpanel" class="tab-pane" id="social-media" aria-expanded="true" aria-labelledby="base-social-media">
                                    <img src="{{asset('assets/admin/images/Pictures-clarification/comming-soon.avif')}}" width="1000" height="400">
                                    
                                </div>  

                                {{-- footer copyright --}}
                                <div class="tab-pane active" id="copyright" aria-labelledby="base-copyright">
                                    <div class="row">
                                        <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4">
                                            <div class="row my-2">
                                                <div class="col-8">
                                                    <h5 class="text-bold-600 mb-0">copyright text</h5>
                                                    <img src="{{asset('assets/admin/images/Pictures-clarification/copyright.png')}}" width="600" height="300">
                                                    
                                                </div>
                                            </div>
                                            @if(App\Models\Footer::where('copyright_text','not like', '%copyright_pages%')->where('copyright_text','not like', '%footer_page_link%')->count() > 0)
                                                {{-- edit copyright --}}
                                                <form class="form form-horizontal" action="{{route('admin.footer.update_copyright',$copyright_string -> id)}}" method="POST">
                                                    @csrf
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <div class="col-md-9">
                                                                <input hidden name="{{$copyright_string -> id}}">
                                                                <textarea class="form-control" name="copyright_text" value="{{ $copyright_string->copyright_text}}" >{{ $copyright_string->copyright_text}}</textarea>
                                                                @error("copyright-text")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit" class="btn round btn-success btn-block btn-glow">
                                                                <i class="la la-check-square-o"></i>تعديل </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @else
                                                {{-- add copyright --}}
                                                <form class="form form-horizontal" action="{{route('admin.footer.store_copyright_text')}}" method="POST">
                                                    @csrf
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <div class="col-md-9">
                                                                <textarea class="form-control" name="copyright_text" value="" ></textarea>
                                                                @error("copyright-text")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit" class="btn round btn-success btn-block btn-glow">
                                                                <i class="la la-check-square-o"></i>اضافة </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="col-12 col-xl-6 pl-2 p-0">
                                            <div class="row my-2">
                                                <div class="col-8">
                                                    <h5 class="text-bold-600 mb-0">الرئيسية | من نحن | سياسة الخصوصية | إتصل بنا | خارطة الموقع</h5>
                                                    <img src="http://127.0.0.1:8000/assets/admin/images/Pictures-clarification/copyright-pages.jpg" width="600" height="300">
                                                </div>
                                            </div>
                                            <form class="form form-horizontal" action="{{route('admin.footer.copyright_pages_store')}}" method="POST" enctype="multipart/form-data">
                                                <div class="form-body" >
                                                    {{ csrf_field() }}
                                                    <div class="form-body">
                                                        <div class="row">
                                                            {{--  عنوان الكود --}}
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">عنوان الصفحة </label>
                                                                    <input type="text" id="copyright_page_name"
                                                                            class="form-control"
                                                                            placeholder="الخدمات | اتصل بنا | الرئيسية"
                                                                            value="{{old('copyright_page_name')}}"
                                                                            name="copyright_page_name">
                                                                    @error("copyright_page_name")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            {{--  رابط الصفحة --}}
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">رابط الصفحة</label>
                                                                    <input type="text" id="copyright_page_link	"
                                                                            class="form-control"
                                                                            placeholder="https://ibowebsolutions.com/about"
                                                                            value="{{old('copyright_page_link')}}"
                                                                            name="copyright_page_link">
                                                                    @error("copyright_page_link	")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                                <span class="text-danger">{{$message}} </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <button type="button" class="btn btn-warning mr-1"
                                                                onclick="history.back();">
                                                            <i class="ft-x"></i> الرجوع
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i>اضافة
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
                                                                <!-- // Basic form layout section end -->
                                                                <div class="card-content collapse show">
                                                                    <div class="card-body card-dashboard">
                                                                        <table
                                                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                                                            <thead class="">
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>العنوان</th>
                                                                                <th> الرابط</th>
                                                                                <th>الحالة</th>
                                                                                <th>الإجرءات</th>
                                                                                <th></th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @isset($copyright_pages)
                                                                                @foreach($copyright_pages as $copyright_page)
                                                                                    <tr>
                                                                                        <td>{{$copyright_page ->id}}</td>
                                                                                        <td>{{$copyright_page ->copyright_page_name}}</td>
                                                                                        <td>{{ Str::limit($copyright_page ->copyright_page_name, 45) }}</td>
    
                                                                                        <td>
                                                                                            @if($copyright_page -> getActive() === "active" || $copyright_page -> getActive() === "مفعل")
                                                                                                <b class="success">{{$copyright_page -> getActive() }}
                                                                                                    @else
                                                                                                        <b class="warning">{{$copyright_page -> getActive()}}</b>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="btn-group" role="group"
                                                                                                    aria-label="Basic example">
                                                                                                <a href="{{route('admin.footer.edit',$copyright_page -> id)}}"
                                                                                                    class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
    
    
                                                                                                <a href="{{route('admin.footer.delete',$copyright_page -> id)}}"
                                                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
    
                                                                                                @if($copyright_page -> active == 0)
                                                                                                    <a href="{{route('admin.footer.status',$copyright_page -> id)}}"
                                                                                                        class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                                                                                @else
                                                                                                    <a href="{{route('admin.footer.status',$copyright_page -> id)}}"
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
                    </div>
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


                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('assets/admin/vendors/js/editors/ckeditor/ckeditor.js')}}"></script>


