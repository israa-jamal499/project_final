<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إرسال التقرير الأسبوعي</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; background-color: #f4f7f6; }
        .card { border: none; border-radius: 15px; }
        .card-header { border-radius: 15px 15px 0 0 !important; font-weight: bold; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @if(session('success'))
                <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">نموذج التقرير الأسبوعي</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('reports.store') }}" method="POST">
                        @csrf <div class="mb-3">
                            <label class="form-label">رقم الأسبوع:</label>
                            <input type="number" name="week_number" class="form-control" placeholder="مثلاً: 1" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">المهام المنجزة:</label>
                            <textarea name="tasks_completed" class="form-control" rows="4" placeholder="ما هي المهام التي أتممتها هذا الأسبوع؟" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">التحديات والمشاكل:</label>
                            <textarea name="challenges" class="form-control" rows="3" placeholder="هل واجهت أي صعوبات؟" required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">إرسال التقرير للمشرف</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="text-center mt-3">
                <a href="{{ url('/student/hours/create') }}" class="text-decoration-none text-muted">← العودة لتسجيل الساعات اليومية</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>