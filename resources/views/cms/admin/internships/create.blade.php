@extends('cms.admin.parent')
@section('title', 'إضافة تدريب جديد')
@section('main-title', 'إدارة التدريب')
@section('sub-title', 'إضافة تدريب جديد')
 
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">إضافة تدريب جديد</h3>
        <a href="{{ route('admin.internships.index') }}" class="btn btn-secondary btn-sm float-left">
            <i class="fa fa-arrow-right"></i> رجوع
        </a>
    </div>
 
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
 
        <form action="{{ route('admin.internships.store') }}" method="POST">
            @csrf
            <div class="row">
 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الطالب <span class="text-danger">*</span></label>
                        <select name="student_id" class="form-control" required>
                            <option value="">-- اختر الطالب --</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الشركة <span class="text-danger">*</span></label>
                        <select name="company_id" class="form-control" required>
                            <option value="">-- اختر الشركة --</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>المشرف <span class="text-danger">*</span></label>
                        <select name="supervisor_id" class="form-control" required>
                            <option value="">-- اختر المشرف --</option>
                            @foreach($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الكلية</label>
                        <select name="college_id" class="form-control">
                            <option value="">-- اختر الكلية --</option>
                            @foreach($colleges as $college)
                                <option value="{{ $college->id }}">{{ $college->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>تاريخ البداية <span class="text-danger">*</span></label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>
                </div>
 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>تاريخ النهاية</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>
                </div>
 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الساعات المطلوبة <span class="text-danger">*</span></label>
                        <input type="number" name="required_hours" class="form-control"
                               placeholder="مثال: 120" min="1" required>
                    </div>
                </div>
 
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الحالة</label>
                        <select name="status" class="form-control">
                            <option value="active">قيد التدريب</option>
                            <option value="paused">متوقف مؤقتاً</option>
                            <option value="completed">مكتمل</option>
                            <option value="terminated">منتهي</option>
                        </select>
                    </div>
                </div>
 
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ملاحظات</label>
                        <textarea name="notes" class="form-control" rows="3"
                                  placeholder="أي ملاحظات إضافية..."></textarea>
                    </div>
                </div>
 
            </div>
 
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> حفظ التدريب
                </button>
                <a href="{{ route('admin.internships.index') }}" class="btn btn-secondary mr-2">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@endsection