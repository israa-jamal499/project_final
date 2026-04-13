@extends('front.layout.student')

@section('title','weekly-reports')

@section('content')
<main class="student-page reports-page">

    <section class="page-title-box">
        <h2>التقارير الأسبوعية</h2>
        <p>
            يمكنك من هنا رفع تقارير التدريب الأسبوعية ومتابعة حالة مراجعتها من قبل المشرف.
        </p>
    </section>

    <section class="reports-stats">
        <article class="mini-card white-card">
            <span>إجمالي التقارير</span>
            <strong id="totalReports">4</strong>
        </article>
        <article class="mini-card white-card">
            <span>مقبول</span>
            <strong id="acceptedReports">2</strong>
        </article>
        <article class="mini-card white-card">
            <span>قيد المراجعة</span>
            <strong id="pendingReports">1</strong>
        </article>
        <article class="mini-card white-card">
            <span>مرفوض</span>
            <strong id="rejectedReports">1</strong>
        </article>
    </section>

    <section class="report-form-card white-card">
        <div class="card-head no-link">
            <h3>📝 رفع تقرير جديد</h3>
        </div>

        <form id="reportForm" class="report-form-grid">
            <div class="form-group">
                <label>عنوان التقرير</label>
                <input type="text" id="reportTitle" class="form-control" placeholder="مثال: تقرير الأسبوع السادس">
            </div>

            <div class="form-group">
                <label>الأسبوع</label>
                <select id="reportWeek" class="form-select">
                    <option value="">اختاري الأسبوع</option>
                    <option>الأسبوع الأول</option>
                    <option>الأسبوع الثاني</option>
                    <option>الأسبوع الثالث</option>
                    <option>الأسبوع الرابع</option>
                    <option>الأسبوع الخامس</option>
                    <option>الأسبوع السادس</option>
                </select>
            </div>

            <div class="form-group full-span">
                <label>وصف مختصر</label>
                <textarea id="reportDesc" class="form-textarea" rows="4" placeholder="اكتبي ملخصًا بسيطًا عن أهم ما تم إنجازه خلال هذا الأسبوع"></textarea>
            </div>

            <div class="form-group full-span">
                <label>إرفاق التقرير</label>
                <input type="file" id="reportFile" class="form-control">
            </div>

            <div class="full-span">
                <button type="submit" class="btn btn-primary">رفع التقرير</button>
            </div>
        </form>
    </section>

    <section class="reports-table-card white-card">
        <div class="card-head no-link">
            <h3>📂 التقارير المرفوعة</h3>
        </div>

        <div class="table-wrap">
            <table class="clean-table">
                <thead>
                    <tr>
                        <th>الأسبوع</th>
                        <th>العنوان</th>
                        <th>التاريخ</th>
                        <th>الحالة</th>
                        <th>الإجراء</th>
                    </tr>
                </thead>
                <tbody id="reportsTableBody">
                    <tr data-status="accepted">
                        <td>الأسبوع الأول</td>
                        <td>التعرف على بيئة العمل</td>
                        <td>2026-03-01</td>
                        <td><span class="badge badge-success">مقبول</span></td>
                        <td><a href="#" class="btn btn-light btn-sm-link">عرض</a></td>
                    </tr>
                    <tr data-status="accepted">
                        <td>الأسبوع الثاني</td>
                        <td>تنفيذ المهام الأولى</td>
                        <td>2026-03-08</td>
                        <td><span class="badge badge-success">مقبول</span></td>
                        <td><a href="#" class="btn btn-light btn-sm-link">عرض</a></td>
                    </tr>
                    <tr data-status="pending">
                        <td>الأسبوع الثالث</td>
                        <td>تحديث صفحات النظام</td>
                        <td>2026-03-15</td>
                        <td><span class="badge badge-warning">قيد المراجعة</span></td>
                        <td><a href="#" class="btn btn-light btn-sm-link">عرض</a></td>
                    </tr>
                    <tr data-status="rejected">
                        <td>الأسبوع الرابع</td>
                        <td>مراجعة التعديلات</td>
                        <td>2026-03-22</td>
                        <td><span class="badge badge-danger">مرفوض</span></td>
                        <td><a href="#" class="btn btn-danger btn-sm-link">إعادة رفع</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</main>
@endsection

@section('css')
<style>
.reports-page{
    display:grid;
    gap:18px;
}
.reports-stats{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:14px;
}
.mini-card{
    padding:18px;
    border-radius:20px;
    text-align:center;
}
.mini-card span{
    display:block;
    color:#64748b;
    font-size:13px;
    margin-bottom:8px;
}
.mini-card strong{
    font-size:28px;
    color:#122033;
    font-weight:900;
}
.report-form-card,
.reports-table-card{
    padding:22px;
    border-radius:22px;
}
.report-form-grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:16px;
}
.form-group{
    display:grid;
    gap:8px;
}
.form-group label{
    font-size:14px;
    font-weight:800;
    color:#334155;
}
.full-span{
    grid-column:1 / -1;
}
.btn-sm-link{
    padding:8px 12px;
    font-size:12px;
}
.clean-table tbody tr:hover{
    background:#f8fbff;
}
@media (max-width:900px){
    .reports-stats{
        grid-template-columns:repeat(2,1fr);
    }
    .report-form-grid{
        grid-template-columns:1fr;
    }
}
@media (max-width:600px){
    .reports-stats{
        grid-template-columns:1fr;
    }
}
</style>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('reportForm');
    const body = document.getElementById('reportsTableBody');

    form.addEventListener('submit', function(e){
        e.preventDefault();

        const title = document.getElementById('reportTitle').value.trim();
        const week = document.getElementById('reportWeek').value;
        const file = document.getElementById('reportFile').files[0];

        if(!title || !week || !file){
            alert('الرجاء تعبئة جميع الحقول وإرفاق الملف');
            return;
        }

        const today = new Date().toISOString().split('T')[0];

        const tr = document.createElement('tr');
        tr.setAttribute('data-status', 'pending');
        tr.innerHTML = `
            <td>${week}</td>
            <td>${title}</td>
            <td>${today}</td>
            <td><span class="badge badge-warning">قيد المراجعة</span></td>
            <td><a href="#" class="btn btn-light btn-sm-link">عرض</a></td>
        `;

        body.prepend(tr);
        form.reset();
        refreshReportStats();
    });

    refreshReportStats();
});

function refreshReportStats(){
    const rows = document.querySelectorAll('#reportsTableBody tr');
    const total = rows.length;
    let accepted = 0, pending = 0, rejected = 0;

    rows.forEach(row => {
        const status = row.getAttribute('data-status');
        if(status === 'accepted') accepted++;
        if(status === 'pending') pending++;
        if(status === 'rejected') rejected++;
    });

    document.getElementById('totalReports').textContent = total;
    document.getElementById('acceptedReports').textContent = accepted;
    document.getElementById('pendingReports').textContent = pending;
    document.getElementById('rejectedReports').textContent = rejected;
}
</script>
@endsection
