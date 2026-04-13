@extends('cms.admin.parent')

@section('title','Show College')

@section('main-title','Show College')

{{-- @section('sub-title','sub-title') --}}

@section('styles')

@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Show College</h3>
    </div>

    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="name">College Name</label>
                <input type="text" class="form-control" id="name" disabled value="{{ $college->name }}" name="name" placeholder="College Name">
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('admin.colleges.index') }}" class="btn btn-primary">Go To Index</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')

@endsection
