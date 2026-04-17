@extends('cms.admin.parent')

@section('title','اضافة مشرف')
@section('main-title','اضافة مشرف')


@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">اضافة مشرف جديد</h3>
    </div>

    <form>
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">اسم مشرف</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter student name">
                </div>

                 <div class="form-group col-md-6">
                    <label for="name">رقم الهاتف</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                </div>

                <div class="form-group col-md-6">
                    <label for="name">ملاحظات</label>
                    <input type="text" class="form-control" id="notes" name="notes" placeholder="Enter notes">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">الايميل</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                 </div>
                <div class="form-group col-md-6">
                    <label for="name">كلمة المرور</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Enter password">
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

                <div class="form-group">
                  <label>القسم  </label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="user->id" name="user->id" style="width: 100%;">
                    {{-- <option selected="selected">Alabama</option> --}}
                    @foreach ($colleges as $colleg )
                        <option value="{{ $colleg->id }}">{{ $colleg->colleg_name }}</option>
                    @endforeach


                  </select>
                </div>
                 <div class="form-group col-md-6">
                    <label for="name">الصورة</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter image">
                </div>

                <!-- /.form-group -->
              </div>


            </div>
        </div>

        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
            <a href="{{ route('cms.admin.supervisor') }}" class="btn btn-secondary">Go Back</a>
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
        formData.append('notes', document.getElementById('notes').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('password', document.getElementById('password').value);
        formData.append('status', document.getElementById('status').value);
        formData.append('colleg->id',document.getElementById('colleg->id').value);
        formData.append('image', document.getElementById('image').files[0]);
        store('/cms/admin/supervisor/supervisor', formData);
    }
</script>
@endsection
