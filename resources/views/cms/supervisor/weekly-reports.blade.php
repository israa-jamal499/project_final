@extends('cms.supervisor.temp')
@section('title','reports')
@section('main-title','التقارير')
@section('css')
@endsection

@section('content')



<main class="sup-wrap">

  <section class="sup-head">
    <h2>📄 مراجعة التقارير الأسبوعية</h2>
    <p>هنا يمكن للمشرف قراءة التقارير واعتمادها أو رفضها.</p>
  </section>

  <section class="sup-card">

    <div class="filters-row">
      <input type="text" id="searchReport" placeholder="🔎 ابحث باسم الطالب..." />
      <select id="filterReportStatus">
        <option value="all">كل الحالات</option>
        <option value="بانتظار المراجعة">بانتظار المراجعة</option>
        <option value="تمت المراجعة">تمت المراجعة</option>
        <option value="مرفوض">مرفوض</option>
      </select>
    </div>

    <div class="table-responsive">
      <table class="sup-table">
        <thead>
          <tr>
            <th>#</th>
            <th>الطالب</th>
            <th>الأسبوع</th>
            <th>تاريخ الإرسال</th>
            <th>الحالة</th>
            <th>إجراء</th>
          </tr>
        </thead>
        <tbody id="reportsTable">
          <!-- JS -->
        </tbody>
      </table>
    </div>

  </section>

</main>

<!-- Modal -->
<div class="modal" id="reportModal">
  <div class="modal-box">
    <div class="modal-head">
      <h3 id="reportTitle">عرض التقرير</h3>
      <button class="modal-close" id="closeReportModal">✖</button>
    </div>

    <div class="modal-body">
      <p><b>الطالب:</b> <span id="reportStudent"></span></p>
      <p><b>الأسبوع:</b> <span id="reportWeek"></span></p>
      <p><b>محتوى التقرير:</b></p>

      <div class="report-text" id="reportContent"></div>
    </div>

    <div class="modal-actions">
      <button class="btn-soft" id="btnReject">❌ رفض</button>
      <button class="btn-main" id="btnApprove">✅ اعتماد</button>
    </div>
  </div>
</div>

@endsection

@section('js')

@endsection

