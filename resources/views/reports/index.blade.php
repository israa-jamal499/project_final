@extends('parent') {{-- سنحاول ربطه بالتنسيق الأصلي --}}
@section('content')
<div class="container mt-4">
    <h3>مراجعة التقارير الأسبوعية (للمشرف)</h3>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>اسم الطالب</th>
                <th>الأسبوع</th>
                <th>المهام</th>
                <th>التحديات</th>
                <th>الحالة</th>
                <th>الإجراء</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->internship->student->user->name ?? 'طالب' }}</td>
                <td>{{ $report->week_number }}</td>
                <td>{{ $report->tasks_completed }}</td>
                <td>{{ $report->challenges }}</td>
                <td><span class="badge bg-warning">{{ $report->status }}</span></td>
                <td>
                    <button class="btn btn-success btn-sm">قبول</button>
                    <button class="btn btn-danger btn-sm">رفض</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection