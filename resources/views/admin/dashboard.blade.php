@extends('admin.layouts.admin')
@section('title','لوحة التحكم')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>الإعلانات</h4>
                                            <h6 class="text-muted">جميع الاعلانات المنشورة</h6>
                                        </div>
                                        <div class="col-5 text-right">
{{--                                            <h4>{{App\Models\Product::count()}}</h4>--}}
                                            <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>المتاجر</h4>
                                            <h6 class="text-muted">جميع المتاجر الموجودة لديك</h6>
                                        </div>
                                        <div class="col-5 text-right">
{{--                                            <h4>{{App\Models\Vendor::count()}}</h4>--}}
                                            <h6 class="success darken-4">12% <i class="la la-arrow-up"></i></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>البائعين</h4>
                                            <h6 class="text-muted">جميع البائعين الموجودة لديك</h6>
                                        </div>
                                        <div class="col-5 text-right">
{{--                                            <h4>{{App\Models\User::count()}}</h4>--}}
                                            <h6 class="danger">20% <i class="la la-arrow-down"></i></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Candlestick Multi Level Control Chart -->

                <div class="row match-height">
                    <!-- section -->
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('admin/dashboard-blade.section')</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>@lang('admin/dashboard-blade.title')</th>
                                            <th>@lang('admin/dashboard-blade.status')</th>
                                            <th>@lang('admin/dashboard-blade.photo')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 0; ?>
                                            @isset($active_sctions)
                                                @foreach($active_sctions as $section)
                                                    <?php if($count == 3) break; ?>  
                                                        <tr>
                                                            <td>{{ Str::limit($section -> name, 45) }}</td>
                                                            <td>
                                                                @if($section -> getActive() === "active" || $section -> getActive() === "مفعل")
                                                                    <b class="success">{{$section -> getActive() }}
                                                                        @else
                                                                            <b class="warning">{{$section -> getActive()}}</b>
                                                                @endif
                                                            </td>                                                             
                                                            <td> <img style="width: 150px; height: 100px;" src="{{$section ->photo}}"></td>
                                                        </tr>
                                                    <?php $count++; ?>
                                                @endforeach
                                            @endisset         
   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end section -->

                    <!-- tags -->
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('admin/dashboard-blade.tags')</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>@lang('admin/dashboard-blade.date')</th>
                                            <th>@lang('admin/dashboard-blade.title')</th>
                                            <th>@lang('admin/dashboard-blade.status')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 0; ?>
                                            @isset($select_10_active_tags)
                                                @foreach($select_10_active_tags as $tag)
                                                    <?php if($count == 10) break; ?>  
                                                        <tr>
                                                            <td>{{ Str::limit($tag ->created_at) }}</td>
                                                            <td>{{ Str::limit($tag -> name, 45) }}</td>
                                                            <td>
                                                                @if($tag -> getActive() === "active" || $tag -> getActive() === "مفعل")
                                                                    <b class="success">{{$tag -> getActive() }}
                                                                        @else
                                                                            <b class="warning">{{$tag -> getActive()}}</b>
                                                                @endif
                                                            </td>                                                             
                                                        </tr>
                                                    <?php $count++; ?>
                                                @endforeach
                                            @endisset 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end tags -->

                </div>
                
                <!-- Latest_articles_added -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('admin/dashboard-blade.Latest_articles_added')</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <td>
                                        <button class="btn btn-sm round btn-danger btn-glow"><i class="la la-close font-medium-1"></i> Cancel all</button>
                                    </td>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">

                                        <table class="table table-de mb-0">
                                            <thead>
                                            <tr>
                                                <th>@lang('admin/dashboard-blade.date')</th>
                                                <th>@lang('admin/dashboard-blade.title')</th>
                                                <th>@lang('admin/dashboard-blade.slug')</th>
                                                <th>@lang('admin/dashboard-blade.status')</th>
                                                <th>@lang('admin/dashboard-blade.keywoord')</th>
                                                <th>@lang('admin/dashboard-blade.photo')</th>
                                                <th>@lang('admin/dashboard-blade.delete')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count = 0; ?>
                                                @isset($last_articles)
                                                    @foreach($last_articles as $article)
                                                        <?php if($count == 3) break; ?>    
                                                        <tr>
                                                            <td>{{$article -> created_at}}</td>
                                                            <td>{{ Str::limit($article -> name, 45) }}</td>
                                                            <td>{{ Str::limit($article -> slug, 45) }}</td>

                                                            <td>
                                                                @if($article -> getActive() === "active" || $article -> getActive() === "مفعل")
                                                                    <b class="success">{{$article -> getActive() }}
                                                                        @else
                                                                            <b class="warning">{{$article -> getActive()}}</b>
                                                                @endif
                                                            </td>                                                            
                                                            <td>{{ Str::limit($article -> seo_keyword, 45) }}</td>
                                                            <td> <img style="width: 150px; height: 100px;" src="{{$article ->photo}}"></td>
                                                            <td>
                                                                <a href="{{route('admin.articles.delete',$article -> id)}}"class="btn btn-sm round btn-outline-danger"><i class="la la-trash"></i>حذف</a>
                                                            </td>
                                                        </tr>
                                                        <?php $count++; ?>
                                                    @endforeach
                                                @endisset         

                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Latest_articles_added -->

            </div>
        </div>
    </div>
@endsection
