

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الساعات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @if ($errors->any())
    <div class="alert alert-danger mx-5 mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success mx-5 mt-3">
        {{ session('success') }}
    </div>
@endif
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>طلب اعتماد ساعات العمل</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('hours.store') }}" method="POST">
                
                   @csrf <div class="mb-3">
                        <label class="form-label">التاريخ:</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">عدد الساعات:</label>
                        <input type="number" name="Number_of_hours" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">وصف العمل:</label>
                        <textarea name="Job_description" class="form-control" rows="4" required placeholder="ماذا أنجزت اليوم؟"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">إرسال الطلب</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>