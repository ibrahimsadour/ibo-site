@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h2>إضافة توجيه جديد</h2>
    <form action="{{ route('redirects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>الرابط القديم</label>
            <input type="text" name="source_url" class="form-control" required>
        </div>

        <div class="form-group">
            <label>الرابط الجديد</label>
            <input type="text" name="target_url" class="form-control" required>
        </div>

        <div class="form-group">
            <label>نوع التوجيه</label>
            <select name="status_code" class="form-control" required>
                <option value="301">301 (دائم)</option>
                <option value="302">302 (مؤقت)</option>
            </select>
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
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection
