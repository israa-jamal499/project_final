@extends('cms.admin.parent')

@section('title','Edit College')

@section('main-title','Edit College')

{{-- @section('sub-title','sub-title') --}}

@section('styles')

@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit College</h3>
    </div>

    <form>
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="name">College Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $college->name }}" name="name" placeholder="College Name">
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="button" onclick="performUpdate({{ $college->id }})" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.colleges.index') }}" class="btn btn-primary">Go Back</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('_method', 'PUT');
        formData.append('_token', '{{ csrf_token() }}');

        storeRoute('/cms/admin/colleges/' + id, formData);
    }
</script>
@endsection
