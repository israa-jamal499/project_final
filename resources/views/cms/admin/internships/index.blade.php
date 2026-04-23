@extends('cms.admin.parent')
@section('title', 'إدارة التدريب')
@section('main-title', 'إدارة التدريب')
@section('sub-title', 'سجلات التدريب')
 
@section('content')
<main class="page" data-page="internships">
 
    <div class="page-head" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <div class="page-title">
            <p>متابعة تسجيلات التدريب، حالة الطالب، الشركة، المشرف، وتواريخ البداية والنهاية.</p>
        </div>
        <div class="page-actions">
            <a href="{{ route('admin.internships.create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> إضافة تدريب
            </a>
        </div>
    </div>
 
    {{-- Stats --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $internships->total() }}</h3>
                            <p>إجمالي التدريبات</p>
                        </div>
                        <div class="icon"><i class="ion ion-bag"></i></div>
                        <a href="#" class="small-box-footer">عدد سجلات التدريب <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $internships->where('status','active')->count() }}</h3>
                            <p>قيد التدريب</p>
                        </div>
                        <div class="icon"><i class="ion ion-stats-bars"></i></div>
                        <a href="#" class="small-box-footer">طلاب بدأوا التدريب <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $internships->where('status','completed')->count() }}</h3>
                            <p>مكتمل</p>
                        </div>
                        <div class="icon"><i class="ion ion-person-add"></i></div>
                        <a href="#" class="small-box-footer">طلاب أنهوا التدريب <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $internships->where('status','terminated')->count() }}</h3>
                            <p>متوقف</p>
                        </div>
                        <div class="icon"><i class="ion ion-pie-graph"></i></div>
                        <a href="#" class="small-box-footer">تدريب موقوف <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    {{-- Table --}}
    <section class="card">
        <div class="card-body">
            <h2 class="card-title">سجلات التدريب</h2>
 
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الطالب</th>
                            <th>الشركة</th>
                            <th>المشرف</th>
                            <th>تاريخ البداية</th>
                            <th>تاريخ النهاية</th>
                            <th>الساعات المطلوبة</th>
                            <th>الساعات المنجزة</th>
                            <th>الحالة</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($internships as $internship)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $internship->student->name ?? '-' }}</td>
                            <td>{{ $internship->company->name ?? '-' }}</td>
                            <td>{{ $internship->supervisor->name ?? '-' }}</td>
                            <td>{{ $internship->start_date ?? '-' }}</td>
                            <td>{{ $internship->end_date ?? '-' }}</td>
                            <td>{{ $internship->required_hours }}</td>
                            <td>{{ $internship->completed_hours }}</td>
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
                            <td>
                                <a href="{{ route('admin.internships.show', $internship->id) }}"
       class="btn btn-sm btn-primary">
        <i class="fa fa-eye"></i> عرض
    </a>
                                <a href="{{ route('admin.internships.edit', $internship->id) }}"
                                   class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i> تعديل
                                </a>
                                <form action="{{ route('admin.internships.destroy', $internship->id) }}"
                                      method="POST" style="display:inline"
                                      onsubmit="return confirm('هل تريد حذف هذا التدريب؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i> حذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted py-4">لا توجد تدريبات مسجلة</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
 
            {{-- Pagination --}}
            <div class="mt-3">
                {{ $internships->links() }}
            </div>
        </div>
    </section>
 
</main>
@endsection
 