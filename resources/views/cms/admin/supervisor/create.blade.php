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
        formData.append('user->id',document.getElementById('user->id').value);
        formData.append('colleg->id',document.getElementById('colleg->id').value);
        store('/cms/supervisor/supervisor', formData);
    }
</script>
@endsection
