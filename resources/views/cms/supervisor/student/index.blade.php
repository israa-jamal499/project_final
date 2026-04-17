@extends('cms.admin.parent')

@section('title','عرض الطلاب ')
@section('main-title','عرض الطلاب')


@section('content')
<div class="card">
   <div class="card-header">
    <span class="card-title">قائمة الطلاب ({{ $students->total() }})
        </span>
        <div class="head-actions">
        <a href="{{ route('Supervisormsstudent.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> إضافة طالب</a></div>
    </div>
  <form method="GET" style="display:flex;gap:10px;margin-bottom:14px;flex-wrap:wrap">
    <input type="text" name="search" class="form-control" style="width:auto;min-width:180px" placeholder="بحث بالاسم أو الرقم..." value="{{ request('search') }}">
    <select name="status" class="form-control form-select" style="width:auto">
      <option value="">كل الحالات</option>
      <option value="active">نشط</option>
      <option value="paused">موقوف</option>
    </select>
    <button class="btn btn-outline btn-sm"><i class="fa fa-search"></i></button>
  </form>
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
            <th>#</th>
            <th>اسم الطالب </th>
            <th>الرقم الجامعي</th>
            <th>الشركة</th>
            <th>حالة التدريب</th>
            <th>الإجراءات</th>
    </tr>
</thead>
      <tbody>
        @forelse($students as $student)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><strong>{{ $student->name }}</strong></td>
          <td><code>{{ $student->university_id }}</code></td>
          <td>{{ $student->user->company->name ?? '—' }}</td>
          <td><span class="badge {{ $student->internships->where('status','active')->count() ? 'badge-success' : 'badge-gray' }}">{{ $student->internships->where('status','active')->count() ? 'جاري التدريب' : 'لا يوجد' }}</span></td>
          <td><a href="{{ route('supervisor.student.show',$student) }}" class="btn btn-outline btn-sm"><i class="fa fa-eye"></i> عرض</a></td>
      </tr>
        </tr>
        @empty
        <tr><td colspan="7" style="text-align:center;color:var(--muted);padding:30px">لا يوجد طلاب مُسندون إليك</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div style="padding:12px 0">{{ $students->links() }}</div>
  <div style="margin-top:10px; display:flex; justify-content:flex-start;">
        <button class="btn btn-soft" id="clearBtn">🧹 مسح البيانات (localStorage)</button>
      </div>
</div>
@endsection

@section('scripts')
<script>
    function performDestroy(id , reference){
        confirmDestroy('/cms/supervisor/student/Supervisormsstudent' + id , reference);
    }
</script>
@endsection
