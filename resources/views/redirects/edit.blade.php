@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h2>تعديل التوجيه</h2>
    <form action="{{ route('redirects.update', $redirect->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>الرابط القديم</label>
            <input type="text" name="source_url" class="form-control" value="{{ $redirect->source_url }}" required>
        </div>

        <div class="form-group">
            <label>الرابط الجديد</label>
            <input type="text" name="target_url" class="form-control" value="{{ $redirect->target_url }}" required>
        </div>

        <div class="form-group">
            <label>نوع التوجيه</label>
            <select name="status_code" class="form-control" required>
                <option value="301" {{ $redirect->status_code == 301 ? 'selected' : '' }}>301 (دائم)</option>
                <option value="302" {{ $redirect->status_code == 302 ? 'selected' : '' }}>302 (مؤقت)</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection
