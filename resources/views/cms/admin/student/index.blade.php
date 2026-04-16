@extends('cms.admin.parent')

@section('title','عرض الطلاب ')
@section('main-title','عرض الطلاب')


@section('content')
<div class="card">
  <div class="card-header">
    <span class="card-title">إدارة الطلاب ({{ $students->total() }})</span>
    <a href="{{ route('student.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> إضافة طالب</a>
  </div>
  <form method="GET" class="filters-bar">
    <input type="text" name="search" class="form-control" placeholder="بحث بالاسم أو الرقم..." value="{{ request('search') }}">
    <select name="status" class="form-control form-select">
      <option value="">كل الحالات</option>
      <option value="active" {{ request('status')=='active'?'selected':'' }}>نشط</option>
      <option value="paused" {{ request('status')=='paused'?'selected':'' }}>موقوف</option>
      <option value="graduated" {{ request('status')=='graduated'?'selected':'' }}>خريج</option>
    </select>
    <button class="btn btn-outline"><i class="fa fa-search"></i> بحث</button>
    <a href="{{ route('admin.students.index') }}" class="btn btn-outline">مسح</a>
  </form>
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>الرقم الجامعي</th>
            <th>التخصص</th>
            <th>الايميل</th>
            <th>الشركة</th>
            <th>الحالة</th>
            <th>الإجراءات</th>
    </tr>
</thead>
      <tbody>
        @forelse($students as $student)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><strong>{{ $student->name }}</strong></td>
          <td><small style="color:var(--muted)">{{ $student->user->email }}</small></td>
          <td><code>{{ $student->university_id }}</code></td>
          <td>{{ $student->college->name }}</td>
          <td>{{ $student->supervisor->name ?? '—' }}</td>
          <td>
            @php $sb=['active'=>'badge-success','paused'=>'badge-warning','graduated'=>'badge-info','suspended'=>'badge-danger']; @endphp
            <span class="badge {{ $sb[$student->status] ?? 'badge-gray' }}">{{ ['active'=>'نشط','paused'=>'موقوف','graduated'=>'خريج','suspended'=>'موقوف نهائياً'][$s->status] ?? $student->status }}</span>
          </td>
          <td>
            <a href="{{ route('admin.students.show',$s) }}" class="btn btn-outline btn-sm"><i class="fa fa-eye"></i></a>
            <a href="{{ route('admin.students.edit',$s) }}" class="btn btn-outline btn-sm"><i class="fa fa-edit"></i></a>
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
  <div style="padding:12px 0">{{ $students->links() }}</div>
</div>
@endsection

@section('scripts')
<script>
    function performDestroy(id , reference){
        confirmDestroy('/cms/admin/student/' + id , reference);
    }
</script>
@endsection
