@extends('cms.admin.parent')

@section('title','create-colleges')

@section('main-title','create-colleges')

@section('styles')
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">اضافة قسم جديد</h3>
    </div>

    <form>
        @csrf
        <div class="card-body">
            <div class="row">

                {{-- اسم الكلية فقط --}}
                <div class="form-group col-md-12">
                    <label for="name">اسم القسم</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter College Name">
                </div>

            </div>
        </div>

        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
            <a href="{{ route('admin.colleges.index') }}" class="btn btn-primary">Go Back</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData = new FormData();
        formData.append('name', document.getElementById('name').value);

        store('/cms/admin/colleges', formData);
    }
</script>
@endsection
