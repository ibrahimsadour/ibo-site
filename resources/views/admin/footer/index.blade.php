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
                                                        <form class="form" action="{{route('admin.footer.store')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="form-body">
                                                                <h4 class="form-section"><i class="ft-home"></i>اضافة رابط صفحة </h4>
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
                                                        </form>
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
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('assets/admin/vendors/js/editors/ckeditor/ckeditor.js')}}"></script>


