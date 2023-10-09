@extends('admin.layouts.admin')
@section('title','قسم المدن')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">قسم اسماء المدن</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">جميع اسماء المدن
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('admin.cities.create')}}">أضافة اسم مدينة  جديدة</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-underline no-hover-bg">
                                <li class="nav-item">
                                    <a class="nav-link" id="base-limit" data-toggle="tab" aria-controls="limit" href="#limit" aria-expanded="true">اضافة المدن عبر ملف Excel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="base-market" data-toggle="tab" aria-controls="market" href="#market" aria-expanded="false">مزامنة المدن مع العلامات الدلالية</a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                                <div role="tabpanel" class="tab-pane" id="limit" aria-expanded="true" aria-labelledby="base-limit">
                                    <div class="row">
                                        <div class="col-12 col-xl-12 border-right-blue-grey border-right-lighten-4 pr-2">
                                            <form class="form form-horizontal" action="{{route('admin.cities.import')}}" method="POST" enctype="multipart/form-data">
                                                <div class="form-body" >
                                                    {{ csrf_field() }}
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="btc-limit-buy-total">أضافة هنا</label>
                                                        <div class="col-md-9">
                                                            <label id="projectinput7" class="dropzone dropzone-area dz-clickable">
                                                                <input type="file" name="select_cities_file" />
                                                            </label>
                                                            @error('select_cities_file')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-actions pb-0">
                                                            <input type="submit" name="upload" class="btn round btn-success btn-block btn-glow" value="اضافة">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="market" aria-labelledby="base-market">
                                    <div class="row">
                                        <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4">
                                            <div class="row my-2">
                                                <div class="col-8">
                                                    <h5 class="text-bold-600 mb-0">ربط كل مدينة مع جميع العلامات الدلالية بشكل فردي من خلال ال ID الخاص بكل مدينة</h5>
                                                </div>
                                            </div>
                                            <form class="form form-horizontal" action="{{route('insert-all-tags-to-one-city')}}" method="POST">
                                                @csrf

                                                <div class="form-body">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="btc-market-buy-price">ادخل ID المدينة</label>
                                                        <div class="col-md-9">
                                                            <input type="number"
                                                            class="form-control"
                                                            value="{{old('id')}}"
                                                            placeholder="city ID"
                                                            name="id">
                                                            @error("id")
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
                                        </div>
                                        <div class="col-12 col-xl-6 pl-2 p-0">
                                            <div class="row my-2">
                                                <div class="col-8">
                                                    <h5 class="text-bold-600 mb-0">مزامنة او حذف جميع المدن مع جميع العلامات الدلالية بضغطة زر واحدة</h5>
                                                </div>
                                            </div>
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="btc-mrk-price">ربط</label>
                                                        <div class="col-md-9">
                                                            <a href="{{route('insert-all-tags-to-all-cities')}}" class="btn btn-warning btn-block btn-glow"><i class="la la-check-square-o"></i>مزامنة الكل</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="btc-market-sell-amount">حذف</label>
                                                        <div class="col-md-9">
                                                            <a href="{{route("admin.cities.destroyAll")}}"  class="btn btn-danger btn-block btn-glow"><i class="la la-remove"></i>حذف المدن مع العلامات  </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
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

                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')



                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>ID</th>
                                                <th>الأسم</th>
                                                <th>اسم الرابط</th>
                                                <th>الحالة</th>
                                                <th>التاريخ</th>
                                                <th>العلامات الدلالية</th>
                                                <th>الإجرءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($cities)
                                                @foreach($cities as $city)
                                                    <tr>
                                                        <td>{{$city -> id}}</td>
                                                        <td>{{$city -> name}}</td>
                                                        <td>{{$city -> slug}}</td>
                                                        <td>
                                                            @if($city -> getActive() === "active" || $city -> getActive() === "مفعل")
                                                                <b class="success">{{$city -> getActive() }}
                                                                    @else
                                                                        <b class="warning">{{$city -> getActive()}}</b>
                                                            @endif
                                                        </td>
                                                        <td>{{$city -> created_at}}</td>
                                                        <td>
                                                            @if(isset($city ->tags))
                                                                <b class="success">{{$city ->tags->count()}}
                                                                    @if($city ->tags->count() > 0)
                                                                    <a href="{{route('delete-all-tags-of-one-city',$city -> id)}}"
                                                                        class="btn btn-outline-danger">حذف</a>
                                                                    @endif
                                                            @else
                                                                <b class="warning">لم يتم اضافة اي علامات بعد</b>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.cities.edit',$city -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="{{route('admin.cities.delete',$city -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                                @if($city -> active == 0)
                                                                    <a href="{{route('admin.cities.status',$city -> id)}}"
                                                                       class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                                                @else
                                                                    <a href="{{route('admin.cities.status',$city -> id)}}"
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
                                        <div class="d-flex flex-row justify-content-center">{{$cities->links('pagination::bootstrap-4')}}</div>
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
