@extends('cms.admin.temp')
@section('title' ,'internships')
@section('main-title','ادارة التدريب')

@section('main-title','ادارة التدريب')
@section('css')
@endsection
@section('content')

  <main class="page" data-page="internships">

    <div class="page-head">
      <div class="page-title">

        <p>متابعة تسجيلات التدريب، حالة الطالب، الشركة، المشرف، وتواريخ البداية والنهاية.</p>
      </div>

      <div class="page-actions">
        <a href="{{ route('student.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> إضافة تدريب</a>
      </div>
    </div>

    <!-- Stats -->
     <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>اجمالي التدريبات</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">عدد سجلات التدريب<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning ">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>قيد التدريب</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">طلاب بدأوا التدريب<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success ">
              <div class="inner">
                <h3>44</h3>

                <p>مكتمل</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">طلاب انهوا التدريب<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>متوقف</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">تدريب موقوف/معلق<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

</section>

    <!-- Tools + Table -->
    <section class="card">
      <div class="card-head">
        <h2>سجلات التدريب</h2>
        <div class="hint">بحث/فلترة ثم إدارة السجل من الإجراءات</div>
      </div>

      <div class="tools-row">
        <div class="tool">
          <label for="searchInput">بحث</label>
          <input id="searchInput" type="text" placeholder="ابحث باسم الطالب أو الشركة أو المشرف..." />
        </div>

        <div class="tool">
          <label for="statusFilter">الحالة</label>
          <select id="statusFilter">
            <option value="all">الكل</option>
            <option value="قيد التدريب">قيد التدريب</option>
            <option value="مكتمل">مكتمل</option>
            <option value="متوقف">متوقف</option>
          </select>
        </div>

        <div class="tool">
          <label for="deptFilter">التخصص</label>
          <select id="deptFilter">
            <option value="all">الكل</option>
            <option value="الأمن السيبراني">الأمن السيبراني</option>
            <option value="هندسة البرمجيات">هندسة البرمجيات</option>
            <option value="نظم معلومات">نظم معلومات</option>
            <option value="شبكات">شبكات</option>
          </select>
        </div>

        <div class="tool tool-inline">
          <button class="btn btn-light" data-action="reset">إعادة تعيين</button>
          <div class="count-pill">
            المعروض: <span data-count="shown">0</span> / <span data-count="all">0</span>
          </div>
        </div>
      </div>

      <div class="table-wrap">
        <table class="table" id="internshipsTable">
          <thead>
            <tr>
              <th>#</th>
              <th>الطالب</th>
              <th>القسم</th>
              <th>الشركة</th>
              <th>المشرف</th>
              <th>البداية</th>
              <th>النهاية</th>
              <th>الحالة</th>
              <th>إجراءات</th>
            </tr>
          </thead>
    <tbody>
      @forelse($internships as $internships)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $internships->student->student_name }}</td>
        <td>{{ $internships->college->college_name }}</td>
        <td>{{ $internships->company->company_name }}</td>
        <td>{{ $internships->supervisor->supervisor_name ?? '—' }}</td>
        <td>{{ $internships->start_date }}</td>
        <td>{{ $internships->end_date }}</td>
        <td>{{ $internships->status }}</td>
        <td>
            <a href="{{ route('admin.') }}" class="btn btn-outline btn-sm"><i class="fa fa-edit">تعديل</i></a>
            <form action="{{ route('admin.students.destroy') }}" method="POST" style="display:inline" onsubmit="return confirm('حذف الطالب؟')">@csrf @method('DELETE')
              <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            </form>
          </td>

      @empty<tr><td colspan="8" style="text-align:center;color:var(--muted);padding:30px">لا توجد تدريبات</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
  <div style="padding:12px 0">{{ $internships->links() }}</div>
</div>
@endsection

@section('scripts')
<script>
    function performDestroy(id , reference){
        confirmDestroy('/cms/admin/student/student' + id , reference);
    }
</script>
@endsection
