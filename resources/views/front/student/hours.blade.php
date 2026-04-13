@extends('front.layout.student')

@section('title','hours')

@section('content')
<main class="student-page hours-page">

    <section class="page-title-box">
        <h2>ساعات التدريب</h2>
        <p>
            من هنا يمكنك متابعة الساعات المطلوبة، الساعات المعتمدة، وإضافة سجل ساعات جديد وإرسالها للاعتماد.
        </p>
    </section>

    <!-- Stats -->
    <section class="hours-stats">
        <article class="mini-card white-card">
            <span>الساعات المطلوبة</span>
            <strong id="requiredHours">120</strong>
        </article>

        <article class="mini-card white-card">
            <span>الساعات المعتمدة</span>
            <strong id="approvedHours">82</strong>
        </article>

        <article class="mini-card white-card">
            <span>الساعات المعلقة</span>
            <strong id="pendingHours">10</strong>
        </article>

        <article class="mini-card white-card">
            <span>الساعات المتبقية</span>
            <strong id="remainingHours">38</strong>
        </article>
    </section>

    <!-- Progress -->
    <section class="hours-progress-card white-card">
        <div class="card-head no-link">
            <h3>⏳ تقدم الساعات</h3>
        </div>

        <div class="progress-labels">
            <span>نسبة الإنجاز</span>
            <strong id="progressPercent">68%</strong>
        </div>

        <div class="progress-bar">
            <div class="progress-fill" id="hoursProgressFill" style="width: 68%;"></div>
        </div>
    </section>

    <!-- Add Hours Form -->
    <section class="hours-form-card white-card">
        <div class="card-head no-link">
            <h3>➕ إضافة سجل ساعات</h3>
        </div>

        <form id="hoursForm" class="hours-form-grid">
            <div class="form-group">
                <label>التاريخ</label>
                <input type="date" id="workDate" class="form-control">
            </div>

            <div class="form-group">
                <label>عدد الساعات</label>
                <input type="number" id="workHours" class="form-control" min="1" max="12" placeholder="مثال: 4">
            </div>

            <div class="form-group full-span">
                <label>وصف العمل المنجز</label>
                <textarea id="workDesc" class="form-textarea" rows="4" placeholder="اكتبي باختصار ما الذي تم إنجازه في هذا اليوم"></textarea>
            </div>

            <div class="full-span">
                <button type="submit" class="btn btn-primary">حفظ السجل</button>
            </div>
        </form>
    </section>

    <!-- Hours Log -->
    <section class="hours-table-card white-card">
        <div class="card-head">
            <h3>📋 سجل الساعات</h3>
            <button class="btn btn-light" onclick="submitHoursForApproval()">إرسال للاعتماد</button>
        </div>

        <div class="table-wrap">
            <table class="clean-table">
                <thead>
                    <tr>
                        <th>التاريخ</th>
                        <th>عدد الساعات</th>
                        <th>وصف العمل</th>
                        <th>الحالة</th>
                        <th>الإجراء</th>
                    </tr>
                </thead>
                <tbody id="hoursTableBody">
                    <tr data-hours="8" data-status="approved">
                        <td>2026-04-01</td>
                        <td>8</td>
                        <td>متابعة تنفيذ واجهات لوحة الطالب وربط المكونات الأساسية</td>
                        <td><span class="badge badge-success">معتمد</span></td>
                        <td><button class="btn btn-light btn-sm-link" onclick="removeHourRow(this)">حذف</button></td>
                    </tr>

                    <tr data-hours="6" data-status="approved">
                        <td>2026-04-02</td>
                        <td>6</td>
                        <td>تحديث صفحة التقارير وتنسيق الجداول</td>
                        <td><span class="badge badge-success">معتمد</span></td>
                        <td><button class="btn btn-light btn-sm-link" onclick="removeHourRow(this)">حذف</button></td>
                    </tr>

                    <tr data-hours="5" data-status="pending">
                        <td>2026-04-03</td>
                        <td>5</td>
                        <td>تجهيز صفحة الإشعارات وتحسين تجربة المستخدم</td>
                        <td><span class="badge badge-warning">معلق</span></td>
                        <td><button class="btn btn-light btn-sm-link" onclick="removeHourRow(this)">حذف</button></td>
                    </tr>

                    <tr data-hours="5" data-status="pending">
                        <td>2026-04-04</td>
                        <td>5</td>
                        <td>إعداد تصميم صفحة الرسائل وربط المحادثات الثابتة</td>
                        <td><span class="badge badge-warning">معلق</span></td>
                        <td><button class="btn btn-light btn-sm-link" onclick="removeHourRow(this)">حذف</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</main>
@endsection

@section('css')
<style>
.hours-page{
    display:grid;
    gap:18px;
}

.hours-stats{
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

.hours-progress-card,
.hours-form-card,
.hours-table-card{
    padding:22px;
    border-radius:22px;
}

.progress-labels{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:10px;
}

.progress-labels span{
    color:#64748b;
    font-size:14px;
}

.progress-labels strong{
    color:#122033;
    font-size:15px;
    font-weight:900;
}

.progress-bar{
    width:100%;
    height:12px;
    background:#eaf1fb;
    border-radius:999px;
    overflow:hidden;
}

.progress-fill{
    height:100%;
    border-radius:999px;
    background:linear-gradient(90deg, #3e7cd7, #6ea0ee);
    transition:width .3s ease;
}

.hours-form-grid{
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
    .hours-stats{
        grid-template-columns:repeat(2,1fr);
    }

    .hours-form-grid{
        grid-template-columns:1fr;
    }
}

@media (max-width:600px){
    .hours-stats{
        grid-template-columns:1fr;
    }
}
</style>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('hoursForm');

    form.addEventListener('submit', function(e){
        e.preventDefault();

        const date = document.getElementById('workDate').value;
        const hours = document.getElementById('workHours').value;
        const desc = document.getElementById('workDesc').value.trim();

        if(!date || !hours || !desc){
            alert('الرجاء تعبئة جميع الحقول');
            return;
        }

        const tbody = document.getElementById('hoursTableBody');
        const tr = document.createElement('tr');
        tr.setAttribute('data-hours', hours);
        tr.setAttribute('data-status', 'pending');
        tr.innerHTML = `
            <td>${date}</td>
            <td>${hours}</td>
            <td>${desc}</td>
            <td><span class="badge badge-warning">معلق</span></td>
            <td><button class="btn btn-light btn-sm-link" onclick="removeHourRow(this)">حذف</button></td>
        `;

        tbody.prepend(tr);
        form.reset();
        refreshHoursStats();
    });

    refreshHoursStats();
});

function removeHourRow(button){
    const row = button.closest('tr');
    if(row){
        row.remove();
        refreshHoursStats();
    }
}

function submitHoursForApproval(){
    const pendingRows = document.querySelectorAll('#hoursTableBody tr[data-status="pending"]');

    if(pendingRows.length === 0){
        alert('لا توجد ساعات معلقة لإرسالها للاعتماد');
        return;
    }

    alert('تم إرسال الساعات المعلقة للاعتماد بنجاح');
}

function refreshHoursStats(){
    const required = 120;
    const rows = document.querySelectorAll('#hoursTableBody tr');

    let approved = 0;
    let pending = 0;

    rows.forEach(row => {
        const hours = parseInt(row.getAttribute('data-hours')) || 0;
        const status = row.getAttribute('data-status');

        if(status === 'approved') approved += hours;
        if(status === 'pending') pending += hours;
    });

    const remaining = Math.max(required - approved, 0);
    const percent = Math.min(Math.round((approved / required) * 100), 100);

    document.getElementById('requiredHours').textContent = required;
    document.getElementById('approvedHours').textContent = approved;
    document.getElementById('pendingHours').textContent = pending;
    document.getElementById('remainingHours').textContent = remaining;
    document.getElementById('progressPercent').textContent = percent + '%';
    document.getElementById('hoursProgressFill').style.width = percent + '%';
}
</script>
@endsection
