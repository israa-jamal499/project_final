@extends('cms.admin.parent')

@section('title','عرض الشركات ')
@section('main-title','عرض الشركات')


@section('content')
<div class="card">
  <div class="card-header">
    <span class="card-title">إدارة الشركات ({{ $students->total() }})</span>
    <a href="{{ route('admin.companies.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> إضافة شركة</a>
  </div>
 <form method="GET" class="filters-bar">
    <input type="text" name="search" class="form-control" placeholder="بحث بالاسم..." value="{{ request('search') }}">
    <select name="status" class="form-control form-select">
        <option value="">كل الحالات</option>
        <option value="active">نشطة</option>
        <option value="pending">بانتظار الموافقة</option>
        <option value="inactive">موقوفة</option>
    </select>
    <button class="btn btn-outline btn-sm"><i class="fa fa-search"></i></button>
  </form>
  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
            <th>#</th>
            <th>اسم الشركة </th>
            <th>المجال</th>
            <th>البريد</th>
            <th>الهاتف</th>
            <th>عدد الفرص</th>
            <th>الحالة</th>
            <th>الإجراءات</th>
    </tr>
</thead>
      <tbody>
        @forelse($companies as $company)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><strong>{{ $company->name }}</strong></td>
          <td>{{ $company->field }}</td>
          <td><small style="color:var(--muted)">{{ $company->user->email }}</small></td>
          <td>{{ $company->phone }}</td>
          <td>{{ $company-> opportunities_count}}
          <td>{{ $company->status }}</td>
           <td>
          <form action="{{ route('admin.companies.destroy') }}" method="POST" style="display:inline" onsubmit="return confirm('حذف الشركة؟')">@csrf @method('DELETE')<button class="btn btn-danger btn-sm"><i class="fa fa-trash">حذف</i></button></form>
        </td>
      </tr>
        </tr>
        @empty
        <tr><td colspan="7" style="text-align:center;color:var(--muted);padding:30px">لا يوجد شركة</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div style="padding:12px 0">{{ $companies->links() }}</div>
</div>
@endsection

@section('scripts')
<script>
    function performDestroy(id , reference){
        confirmDestroy('/cms/admin/company/' + id , reference);
    }
</script>
@endsection
