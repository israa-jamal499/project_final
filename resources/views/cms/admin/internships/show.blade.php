@extends('cms.admin.parent')
@section('title', 'تفاصيل التدريب')
@section('main-title', 'إدارة التدريب')
@section('sub-title', 'تفاصيل التدريب')
 
@section('content')
<div class="row">
 
    {{-- Main Info Card --}}
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-laptop-house ml-2"></i>
                    تفاصيل التدريب
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.internships.edit', $internship->id) }}"
                       class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i> تعديل
                    </a>
                    <a href="{{ route('admin.internships.index') }}"
                       class="btn btn-secondary btn-sm mr-1">
                        <i class="fa fa-arrow-right"></i> رجوع
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width:30%; background:#f8f9fa;">الطالب</th>
                        <td>{{ $internship->student->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="background:#f8f9fa;">الشركة</th>
                        <td>{{ $internship->company->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="background:#f8f9fa;">المشرف</th>
                        <td>{{ $internship->supervisor->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="background:#f8f9fa;">الكلية</th>
                        <td>{{ $internship->college->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="background:#f8f9fa;">تاريخ البداية</th>
                        <td>{{ $internship->start_date ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="background:#f8f9fa;">تاريخ النهاية</th>
                        <td>{{ $internship->end_date ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="background:#f8f9fa;">الساعات المطلوبة</th>
                        <td>{{ $internship->required_hours }}</td>
                    </tr>
                    <tr>
                        <th style="background:#f8f9fa;">الساعات المنجزة</th>
                        <td>{{ $internship->completed_hours }}</td>
                    </tr>
                    <tr>
                        <th style="background:#f8f9fa;">الحالة</th>
                        <td>
                            @if($internship->status == 'active')
                                <span class="badge badge-warning">قيد التدريب</span>
                            @elseif($internship->status == 'completed')
                                <span class="badge badge-success">مكتمل</span>
                            @elseif($internship->status == 'paused')
                                <span class="badge badge-secondary">متوقف مؤقتاً</span>
                            @else
                                <span class="badge badge-danger">منتهي</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th style="background:#f8f9fa;">ملاحظات</th>
                        <td>{{ $internship->notes ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
 
        {{-- Student Hours Card --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-clock ml-2"></i>
                    سجل ساعات الطالب
                </h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>التاريخ</th>
                            <th>عدد الساعات</th>
                            <th>وصف العمل</th>
                            <th>الحالة</th>
                            <th>إجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($internship->hours as $hour)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hour->date }}</td>
                            <td>{{ $hour->Number_of_hours }}</td>
                            <td>{{ $hour->Job_description }}</td>
                            <td>
                                @if($hour->status == 'approved')
                                    <span class="badge badge-success">معتمد</span>
                                @elseif($hour->status == 'rejected')
                                    <span class="badge badge-danger">مرفوض</span>
                                @else
                                    <span class="badge badge-warning">معلق</span>
                                @endif
                            </td>
                            <td>
                                @if($hour->status == 'pending')
                                <form action="{{ route('admin.hours.approve', $hour->id) }}"
                                      method="POST" style="display:inline">
                                    @csrf
                                    <input type="hidden" name="status" value="approved">
                                    <button class="btn btn-success btn-sm">
                                        <i class="fa fa-check"></i> اعتماد
                                    </button>
                                </form>
                                <form action="{{ route('admin.hours.approve', $hour->id) }}"
                                      method="POST" style="display:inline">
                                    @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-times"></i> رفض
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">
                                لا توجد ساعات مسجلة بعد
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
 
        {{-- Weekly Reports Card --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-file-alt ml-2"></i>
                    التقارير الأسبوعية
                </h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الأسبوع</th>
                            <th>الساعات</th>
                            <th>تاريخ الإرسال</th>
                            <th>الحالة</th>
                            <th>الملف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($internship->weeklyReports as $report)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>الأسبوع {{ $report->week_number }}</td>
                            <td>{{ $report->hours_worked }}</td>
                            <td>{{ $report->submitted_at }}</td>
                            <td>
                                @if($report->status == 'accepted')
                                    <span class="badge badge-success">مقبول</span>
                                @elseif($report->status == 'rejected')
                                    <span class="badge badge-danger">مرفوض</span>
                                @else
                                    <span class="badge badge-warning">قيد المراجعة</span>
                                @endif
                            </td>
                            <td>
                                @if($report->file_path)
                                <a href="{{ asset('storage/' . $report->file_path) }}"
                                   target="_blank" class="btn btn-info btn-sm">
                                    <i class="fa fa-file"></i> عرض
                                </a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">
                                لا توجد تقارير مرفوعة بعد
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 
    {{-- Side Summary Card --}}
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ملخص التدريب</h3>
            </div>
            <div class="card-body">
 
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info">
                        <i class="fas fa-clock"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">الساعات المنجزة</span>
                        <span class="info-box-number">
                            {{ $internship->completed_hours }} / {{ $internship->required_hours }}
                        </span>
                    </div>
                </div>
 
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning">
                        <i class="fas fa-file-alt"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">التقارير المرفوعة</span>
                        <span class="info-box-number">
                            {{ $internship->weeklyReports->count() }}
                        </span>
                    </div>
                </div>
 
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success">
                        <i class="fas fa-check"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">الساعات المعتمدة</span>
                        <span class="info-box-number">
                            {{ $internship->hours->where('status','approved')->sum('Number_of_hours') }}
                        </span>
                    </div>
                </div>
 
                {{-- Progress Bar --}}
                @php
                    $percent = $internship->required_hours > 0
                        ? min(100, round(($internship->completed_hours / $internship->required_hours) * 100))
                        : 0;
                @endphp
                <div class="mt-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>نسبة الإنجاز</span>
                        <strong>{{ $percent }}%</strong>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-success"
                             style="width: {{ $percent }}%">
                        </div>
                    </div>
                </div>
 
            </div>
        </div>
    </div>
 
</div>
@endsection