@extends('cms.supervisor.parent')


@section('title','الرئيسية')

@section('main-title','الرئيسية')

{{-- @section('sub-title','sub-title') --}}



@section('styles')

@endsection



@section('content')
<main class="sup-wrap">

  <section class="sup-head">
    <h2>🏠 Dashboard المشرف الأكاديمي</h2>
    <p>ملخص سريع للطلاب والتقارير بآخر أسبوع.</p>
  </section>

  <!-- Stats -->
  <section class="sup-stats">
    <div class="stat-card">
      <h4>👩‍🎓 الطلاب تحت الإشراف</h4>
      <span id="statStudents">0</span>
    </div>

    <div class="stat-card">
      <h4>📄 تقارير هذا الأسبوع</h4>
      <span id="statReports">0</span>
    </div>

    <div class="stat-card">
      <h4>⏳ تقارير بانتظار المراجعة</h4>
      <span id="statPending">0</span>
    </div>

    <div class="stat-card">
      <h4>⭐ تقييمات مكتملة</h4>
      <span id="statEvaluations">0</span>
    </div>
  </section>
{{-- <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>الفرص المنشورة</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="route('cms.Company.opportunities')" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>طلبات جديدة</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('cms.Company.applications') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>متدربين حاليين</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('cms.Company.interns') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>تقييمات مكتملة</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('cms.Company.evaluation') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

    </section> --}}
  <!-- Recent Students -->
  <section class="sup-card">
    <div class="card-head">
      <h3>👩‍🎓 أحدث الطلاب</h3>
      <a class="link-btn" href="students.html">عرض الكل</a>
    </div>

    <div class="table-responsive">
      <table class="sup-table">
        <thead>
          <tr>
            <th>#</th>
            <th>الطالب</th>
            <th>الرقم الجامعي</th>
            <th>الشركة</th>
            <th>الحالة</th>
          </tr>
        </thead>
        <tbody id="studentsPreview">
          <!-- JS -->
        </tbody>
      </table>
    </div>
  </section>

  <!-- Recent Reports -->
  <section class="sup-card">
    <div class="card-head">
      <h3>📄 آخر التقارير</h3>
      <a class="link-btn" href="../supervisor_page/weekly-reports.html">مراجعة التقارير</a>
    </div>

    <div class="table-responsive">
      <table class="sup-table">
        <thead>
          <tr>
            <th>#</th>
            <th>الطالب</th>
            <th>الأسبوع</th>
            <th>الحالة</th>
            <th>إجراء</th>
          </tr>
        </thead>
        <tbody id="reportsPreview">
          <!-- JS -->
        </tbody>
      </table>
    </div>
  </section>

</main>



@endsection

@section('scripts')

@endsection

