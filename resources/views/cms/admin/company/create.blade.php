@extends('cms.admin.parent')

@section('title','اضافة شركة')
@section('main-title','اضافة شركة')


@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">اضافة شركة جديدة</h3>
    </div>

    <form>
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">اسم الشركة</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter student name">
                </div>

                <div class="form-group col-md-6">
                    <label for="name">رقم الهاتف</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">الايميل</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter phone">
                </div>

                <div class="form-group col-md-6">
                    <label for="name">العنوان</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                </div>

                <div class="form-group col-md-6">
                    <label for="name">الموقع</label>
                    <input type="text" class="form-control" id="website" name="website" placeholder="Enter website">
                </div>
                <div class="form-group col-md-6">
                    <label for="name"> الوصف </label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter description">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">المجال </label>
                    <input type="text" class="form-control" id="field" name="field" placeholder="Enter field">
                </div>


                <div class="form-group">
                  <label>المدينة </label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="city->id" name="city->id" style="width: 100%;">
                    {{-- <option selected="selected">Alabama</option> --}}
                    @foreach ($cities as $city )
                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                    @endforeach


                  </select>
                </div>
                 <div class="form-group">
          <label class="form-label">الحالة </label>
            <select name="status" id="status" class="form-control form-select">
              <option value="">اختر</option>
              <option value="active">نشط</option>
              <option value="pending">انتظار</option>
              <option value="suspended">معلق</option>
            </select>

        </div>
                 <div class="form-group col-md-6">
                    <label for="name">كلمة المرور</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Enter password">
                </div>

                 <div class="form-group col-md-6">
                    <label for="name">الشعار </label>
                    <input type="file" class="form-control" id="logo" name="logo" placeholder="Enter logo">
                </div>

                <!-- /.form-group -->
              </div>


            </div>
        </div>

        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
            <a href="{{ route('admin.company.index') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('phone', document.getElementById('phone').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('address', document.getElementById('address').value);
        formData.append('website', document.getElementById('website').value);
        formData.append('description', document.getElementById('description').value);
        formData.append('field', document.getElementById('field').value);
        formData.append('city_id',document.getElementById('city_id').value);
        formData.append('status', document.getElementById('status').value);
        formData.append('password',document.getElementById('password').value);
        formData.append('logo', document.getElementById('logo').files[0]);
        store('/cms/admin/company/companies', formData);
    }
</script>
@endsection
