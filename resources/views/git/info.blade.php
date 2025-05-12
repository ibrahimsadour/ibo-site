<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديثات GitHub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>🔗 اسم الريبوستري: {{ $repoUrl }}</h2>
    <h4>🌱 الفرع النشط: {{ $branch }}</h4>
    <h5>📝 آخر 5 تحديثات:</h5>
    <pre>{{ $logs }}</pre>

    @if (session('message'))
        <div class="alert alert-info mt-3">{{ session('message') }}</div>
    @endif

    <form action="{{ route('updates.pull') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">🔄 سحب آخر التحديثات</button>
    </form>
</div>
</body>
</html>
