@extends('cms.admin.parent')

@section('title','عرض الطلاب ')
@section('main-title','عرض الطلاب')


@section('content')
<div class="card">
  <div class="card-header">
    <span class="card-title">إدارة المشرفين  ({{ $supervios->total() }})</span>
    <a href="{{ route('student.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> إضافة مشرف</a>
  </div>
   <form method="GET" class="filters-bar">
    <input type="text" name="search" class="form-control" placeholder="بحث..." value="{{ request('search') }}">
    <select name="dept" class="form-control form-select">
        @foreach ($colleges as $colleg )
                        <option value="{{ $colleg->id }}">{{ $colleg->colleg_id }}</option>
                    @endforeach
                </select>
    <button class="btn btn-outline btn-sm"><i class="fa fa-search"></i></button>
  </form>
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>القسم</th>
            <th>البريد</th>
            <th>الهاتف</th>
            <th>عدد الطلاب</th>
            <th>الحالة</th>
            <th>الإجراءات</th>
    </tr>
</thead>
      <tbody>
        @forelse($supervios as $supervios)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><strong>{{ $supervios->name }}</strong></td>
          <td>{{ $supervios->college->name }}</td>
          <td><small style="color:var(--muted)">{{ $supervios->user->email }}</small></td>
          <td><code>{{ $supervios->phone }}</code></td>
          <td>{{ $supervios->users->whereNotNull('student')->count() }}</td>

          <td><span class="badge {{ $supervios->is_active ? 'badge-success' : 'badge-gray' }}">{{ $supervios->is_active ? 'نشط' : 'موقوف' }}</span></td>
          <td>
            <a href="{{ route('admin.students.show',$supervios) }}" class="btn btn-outline btn-sm"><i class="fa fa-eye"></i></a>
            <a href="{{ route('admin.students.edit',$supervios) }}" class="btn btn-outline btn-sm"><i class="fa fa-edit"></i></a>
            <form action="{{ route('admin.students.destroy',$s) }}" method="POST" style="display:inline" onsubmit="return confirm('حذف الطالب؟')">@csrf @method('DELETE')
              <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="7" style="text-align:center;color:var(--muted);padding:30px">لا يوجد طلاب</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div style="padding:12px 0">{{ $supervios->links() }}</div>
</div>
@endsection

@section('scripts')
<script>
    function performDestroy(id , reference){
        confirmDestroy('/cms/admin/supervisor/' + id , reference);
    }
</script>
@endsection
