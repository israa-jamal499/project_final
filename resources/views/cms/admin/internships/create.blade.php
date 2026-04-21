@extends('cms.admin.parent')

@section('title','اضافة تدريب')
@section('main-title','اضافة تدريب')


@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">اضافة تدريب جديد</h3>
    </div>

    <form>
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>اسم الطالب </label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="student_id" name="student_id" style="width: 100%;">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" {{ $internships->student_id == $student->id ? 'selected' : '' }}>
                              {{ $student->student_name }}
                        </option>
                    @endforeach
                  </select>
                 </div>

                <div class="form-group">
                  <label>القسم  </label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="college_id" name="college_id" style="width: 100%;">
                    {{-- <option selected="selected">Alabama</option> --}}
                    @foreach ($colleges as $colleg )
                        <option value="{{ $colleg->id }}">{{ $colleg->colleg_name }}</option>
                    @endforeach


                  </select>
                </div>

                <div class="form-group col-md-6">
                     <label>اسم الشركة</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="company_id" name="company_id" style="width: 100%;">
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $internships->company_id == $company->id ? 'selected' : '' }}>
                              {{ $company->company_name }}
                        </option>
                    @endforeach
                  </select>
                 </div>
                <div class="form-group col-md-6">
                    <label>اسم المشرف</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="supervisor_id" name="supervisor_id" style="width: 100%;">
                    @foreach ($supervisors as $supervisor)
                        <option value="{{ $supervisor->id }}" {{ $internships->supervisor_id == $supervisor->id ? 'selected' : '' }}>
                              {{ $supervisor->supervisor_name }}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">تاريخ البداية</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter start date">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">تاريخ النهاية</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Enter end date">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">الحالة</label>
        <select name="status" class="form-control form-select">
          @foreach(['active'=>'نشط','paused'=>'موقوف','completed'=>'مكتمل','terminated'=>'منتهي'] as $v=>$l)
          <option value="{{ $v }}" {{ $internship->status==$v?'selected':'' }}>{{ $l }}
            </option>@endforeach
        </select>
     </div>
                 <div class="form-group col-md-6">
                    <label for="name">ملاحظات</label>
                    <input type="text" class="form-control" id="notes" name="notes" placeholder="Enter notes">
                </div>


              </div>


            </div>
        </div>

        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
            <a href="{{ route('student.index') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData = new FormData();
        formData.append('student_id', document.getElementById('student_id').value);
        formData.append('colleg->id', document.getElementById('colleg->id').value);
        formData.append('company_id', document.getElementById('company_id').value);
        formData.append('supervisor_id', document.getElementById('supervisor_id').value);
        formData.append('start_date', document.getElementById('start_date').value);
        formData.append('end_date', document.getElementById('end_date').value);
        formData.append('status',document.getElementById('status').value);
        store('/front/student/student', formData);
    }
</script>
@endsection
