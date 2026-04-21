@extends('cms.admin.parent')

@section('title','Edit internships')

@section('main-title','Edit internships')

@section('sub-title','Edit internships')

@section('styles')
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">تعديل التدريب</h3>
    </div>

    <form>
        @csrf
        <div class="card-body">
            <div class="form-group">
                 <div class="form-group">
                  <label>اسم الطالب </label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="student_id" name="student_id" style="width: 100%;">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" {{ $internships->student_id == $student->id ? 'selected' : '' }}>
                              {{ $student->student_name }}
                        </option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="form-group">
                 <div class="form-group">
                  <label>القسم</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="college_id" name="college_id" style="width: 100%;">
                    @foreach ($colleges as $college)
                        <option value="{{ $college->id }}" {{ $internships->college_id == $college->id ? 'selected' : '' }}>
                              {{ $college_id->college_name }}
                        </option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="form-group">
                 <div class="form-group">
                  <label>اسم الشركة</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="company_id" name="company_id" style="width: 100%;">
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $internships->company_id == $company->id ? 'selected' : '' }}>
                              {{ $company->company_name }}
                        </option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="form-group">
                 <div class="form-group">
                  <label>اسم المشرف</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="supervisor_id" name="supervisor_id" style="width: 100%;">
                    @foreach ($supervisors as $supervisor)
                        <option value="{{ $supervisor->id }}" {{ $internships->supervisor_id == $supervisor->id ? 'selected' : '' }}>
                              {{ $supervisor->supervisor_name }}
                        </option>
                    @endforeach
                  </select>
                </div>
            </div>


            <div class="form-group">
                <label for="name"> تاريخ البداية</label>
                <input type="data" class="form-control" id="start_date"
                       value="{{ $internships->start_date }}" name="start_date"
                       placeholder="Enter start date">
            </div>
            <div class="form-group">
                <label for="name">تاريخ النهاية </label>
                <input type="data" class="form-control" id="end_date"
                       value="{{ $internships->end_date }}" name="end_date"
                       placeholder="Enter end date">
            </div>

            <div class="form-group">
        <label class="form-label">الحالة</label>
        <select name="status" class="form-control form-select">
          @foreach(['active'=>'نشط','paused'=>'موقوف','completed'=>'مكتمل','terminated'=>'منتهي'] as $v=>$l)
          <option value="{{ $v }}" {{ $internships->status==$v?'selected':'' }}>{{ $l }}
            </option>@endforeach
        </select>
      </div>
        </div>

        <div class="card-footer">
            <button type="button" onclick="performUpdate({{ $internships->id }})" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.colleges.index') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append('student_id', document.getElementById('student_id').value);
        formData.append('college_id', document.getElementById('college_id').value);
        formData.append('company_id', document.getElementById('company_id').value);
        formData.append('supervisor_id', document.getElementById('supervisor_id').value);
        formData.append('start_date', document.getElementById('start_date').value);
        formData.append('end_date', document.getElementById('end_date').value);
        formData.append('status', document.getElementById('status').value);

        storeRoute('/cms/admin/specializations/' + id, formData);
    }
</script>
@endsection
