@extends('cms.admin.parent')

@section('title','Colleges')

@section('main-title','Colleges')

{{-- @section('sub-title','sub-title') --}}

@section('styles')

@endsection

@section('content')
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ route('admin.colleges.create') }}" type="submit" class="btn btn-primary">Add New College</a>
              </div>

              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>College Name</th>
                      <th class="text-center action-col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($colleges as $college)
                    <tr>
                      <td>{{ $college->id }}</td>
                      <td>{{ $college->name }}</td>

                      <td class="text-center">
                        <div class="d-flex justify-content-center gap-1">

                          <a href="{{ route('admin.colleges.edit',$college->id) }}" class="btn btn-primary btn-sm" title="edit">
                            <i class="fas fa-edit"></i>
                          </a>

                          <form action="{{ route('admin.colleges.destroy',$college->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="delete" onclick="return confirm('Are you sure?')">
                              <i class="fas fa-trash"></i>
                            </button>
                          </form>

                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>

       {{ $colleges->links() }}
      </div>
    </section>
@endsection

@section('scripts')
@endsection
