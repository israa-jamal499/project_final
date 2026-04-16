@extends('cms.admin.parent')

@section('title','اضافة طالب')
@section('main-title','اضافة طالب')


@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">اضافة طالب جديدة</h3>
    </div>

    <form>
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">اسم الطالب</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter student name">
                </div>

                <div class="form-group col-md-6">
                    <label for="name">الرقم الجامعي </label>
                    <input type="text" class="form-control" id="university_id" name="university_id" placeholder="Enter university id">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">المستوى</label>
                    <input type="text" class="form-control" id="level" name="level" placeholder="Enter level">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">العنوان</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">تاريخ الميلاد</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Enter birth date">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">رقم الهاتف</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label>الايميل </label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="user->id" name="user->id" style="width: 100%;">
                    {{-- <option selected="selected">Alabama</option> --}}
                    @foreach ($users as $user )
                        <option value="{{ $user->id }}">{{ $user->user_email }}</option>
                    @endforeach


                  </select>
                </div>
                <div class="form-group">
                  <label>القسم  </label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="user->id" name="user->id" style="width: 100%;">
                    {{-- <option selected="selected">Alabama</option> --}}
                    @foreach ($colleges as $colleg )
                        <option value="{{ $colleg->id }}">{{ $colleg->colleg_id }}</option>
                    @endforeach


                  </select>
                </div>

                <!-- /.form-group -->
              </div>


            </div>
        </div>

        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
            <a href="{{ route('Supervisormsstudent.index') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('university_id', document.getElementById('university_id').value);
        formData.append('level', document.getElementById('level').value);
        formData.append('address', document.getElementById('address').value);
        formData.append('birth_date', document.getElementById('birth_date').value);
        formData.append('phone', document.getElementById('phone').value);
        formData.append('user->id',document.getElementById('user->id').value);
        formData.append('colleg->id',document.getElementById('colleg->id').value);
        store('/cms/supervisor/student', formData);
    }
</script>
@endsection
