@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h2>جميع التوجيهات</h2>
    <a href="{{ route('redirects.create') }}" class="btn btn-primary mb-3">إضافة توجيه جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>الرابط القديم</th>
                <th>الرابط الجديد</th>
                <th>نوع التوجيه</th>
                <th>الحالة</th>
                <th>التاريخ</th>
                <th>التحكم</th>
            </tr>
        </thead>
        <tbody>
            @foreach($redirects as $redirect)
                <tr>
                    <td>{{ $redirect->source_url }}</td>
                    <td>{{ $redirect->target_url }}</td>
                    <td>{{ $redirect->status_code }}</td>
                    <td>
                        @if($redirect -> getActive() === "active" || $redirect -> getActive() === "مفعل")
                            <b class="success">{{$redirect -> getActive() }}
                                @else
                                    <b class="warning">{{$redirect -> getActive()}}</b>
                        @endif
                    </td>
                    <td>{{$redirect ->created_at}}</td>
                    <td>
                        <a href="{{ route('redirects.edit', $redirect->id) }}" class="btn btn-sm btn-primary">تعديل</a>

                        <form action="{{ route('redirects.destroy', $redirect->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                        </form>
                        @if($redirect -> active == 0)
                            <a href="{{route('redirects.changeStatus',$redirect -> id)}}"
                                class="btn btn-sm btn-success">تفعيل</a>
                        @else
                            <a href="{{route('redirects.changeStatus',$redirect -> id)}}"
                                class="btn btn-sm btn-warning">
                                إلغاء التفعيل</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
