@extends('front.layout.student')

@section('title','internship')

@section('content')
@section('css')
@endsection
  <style>
    /* =========================
      Student Top Navbar
    ========================= */

    body {
      margin: 0;
      font-family: Tahoma, Arial, sans-serif;
      background: #f7f9fb;
    }

    .student-topbar {
      width: 100%;
      background: #3e7cd7;
      padding: 10px 0;
      position: sticky;
      top: 0;
      z-index: 999;
    }

    .topbar-container {
      width: 92%;
      margin: auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    /* =========================
      RIGHT side (Student Info) -> now LEFT
    ========================= */

    .topbar-left {
      display: flex;
      align-items: center;
      gap: 16px;
      position: relative;
    }

    /* Notification icon */
    .topbar-icon {
      font-size: 18px;
      color: #fff;
      cursor: pointer;
      position: relative;
    }

    .notif-badge {
      position: absolute;
      top: -6px;
      right: -10px;
      background: #ff4d4d;
      color: #fff;
      font-size: 11px;
      font-weight: bold;
      padding: 2px 6px;
      border-radius: 20px;
    }

    /* Student profile */
    .student-profile {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      background: #3e7cd7;
      padding: 6px 12px;
      border-radius: 10px;
      transition: 0.2s ease;
    }

    .student-profile:hover {
      background: #3e7cd7;
    }

    .student-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid rgba(255, 255, 255, 0.6);
    }

    .student-info {
      display: flex;
      flex-direction: column;
      line-height: 1.2;
    }

    .student-name {
      color: #fff;
      font-size: 14px;
      font-weight: 600;
    }

    .student-id {
      color: #cfe0e7;
      font-size: 12px;
    }

    .student-arrow {
      color: #fff;
      font-size: 14px;
      margin-right: 4px;
    }

    /* Dropdown */
    .student-dropdown {
      position: absolute;
      top: 62px;
       z-index: 9999;
      /* ✅ الآن لأنها باليسار */
      left: 0;
      right: auto;

      width: 210px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.18);
      overflow: hidden;
      display: none;
    }

    .student-dropdown a {
      display: block;
      padding: 12px 14px;
      color: #3e7cd7;
      font-size: 14px;
      text-decoration: none;
      transition: 0.2s ease;
    }

    .student-dropdown a:hover {
      background: #f2f5f7;
    }

    .student-dropdown hr {
      margin: 0;
      border: none;
      border-top: 1px solid #eee;
    }

    .student-dropdown .logout {
      color: #d40000;
      font-weight: 600;
    }

    /* =========================
      LEFT side (Title) -> now RIGHT
    ========================= */

    .topbar-right .topbar-title h3 {
      margin: 0;
      color: #fff;
      font-size: 18px;
      font-weight: 700;
    }

    .topbar-right .topbar-title p {
      margin: 2px 0 0;
      color: #cfe0e7;
      font-size: 13px;
    }

    /* =========================
      Student Pages Nav Links
    ========================= */

    .student-pages-nav {
      width: 100%;
      background: #ffffff;
      border-bottom: 1px solid #e6edf1;
    }

    .student-pages-container {
      width: 92%;
      margin: auto;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      gap: 16px;
      padding: 10px 0;
      flex-wrap: wrap;
    }

    .student-pages-container a {
      text-decoration: none;
      color: #3e7cd7;
      font-size: 14px;
      font-weight: 600;
      padding: 8px 12px;
      border-radius: 10px;
      transition: 0.2s ease;
    }

    .student-pages-container a:hover {
      background: #eef3f6;
    }

    .student-pages-container a.active {
      background:#3e7cd7;
      color: #fff;
    }
    /* Notifications Wrapper */
.notif-wrapper {
  position: relative;
}

/* Notifications Dropdown */
.notif-dropdown {
  position: absolute;
  top: 62px;
  right: 0;
  width: 340px;
  background: #fff;
  border-radius: 14px;
  box-shadow: 0 10px 35px rgba(0, 0, 0, 0.18);
  overflow: hidden;
  display: none;
  z-index: 9999;
}

/* Show */
.notif-dropdown.active {
  display: block;
}

/* Header */
.notif-header {
  padding: 14px 16px;
  border-bottom: 1px solid #eee;
}

.notif-header h4 {
  margin: 0;
  font-size: 16px;
  font-weight: 800;
  color: #222;
}

.notif-sub {
  display: block;
  margin-top: 4px;
  font-size: 12px;
  color: #777;
}

/* Body */
.notif-body {
  max-height: 300px;
  overflow-y: auto;
}

/* Notification item */
.notif-item {
  display: block;
  padding: 12px 16px;
  text-decoration: none;
  border-bottom: 1px solid #f2f2f2;
  transition: 0.2s;
}

.notif-item:hover {
  background: #f7f9fb;
}

.notif-title {
  display: block;
  font-weight: 700;
  color: #333;
  font-size: 14px;
}

.notif-desc {
  display: block;
  margin-top: 3px;
  font-size: 12px;
  color: #888;
}

/* Footer */
.notif-footer {
  padding: 12px 16px;
  text-align: center;
  background: #fafafa;
}

.notif-footer a {
  color: #0b72e7;
  font-weight: 700;
  text-decoration: none;
}
.main-footer {
  background: #3e7cd7;
  color: #fff;
  padding: 45px 0 15px;
  margin-top: 50px;
}

.footer-container {
  width: 92%;
  margin: auto;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 25px;
}

.footer-col h3 {
  margin: 0 0 14px;
  font-size: 18px;
  font-weight: 800;
}

.footer-col p {
  margin: 0;
  font-size: 13px;
  line-height: 1.8;
  opacity: 0.95;
}

.footer-col ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-col ul li {
  margin-bottom: 10px;
  font-size: 14px;
}

.footer-col ul li a {
  color: #fff;
  text-decoration: none;
  font-size: 14px;
  transition: 0.2s ease;
}

.footer-col ul li a:hover {
  text-decoration: underline;
  opacity: 0.9;
}

.footer-bottom {
  border-top: 1px solid rgba(255, 255, 255, 0.25);
  margin-top: 25px;
  padding-top: 12px;
  text-align: center;
}

.footer-bottom p {
  margin: 0;
  font-size: 13px;
  opacity: 0.9;
}
/* =========================
   Internship Page
========================= */

.page-container{
  width: 92%;
  margin: 25px auto 0;
}

.page-title{
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 12px;
  flex-wrap: wrap;
  margin-bottom: 18px;
}

.page-title h2{
  margin: 0;
  font-size: 20px;
  font-weight: 900;
  color: #1c2b4a;
}

.page-title p{
  margin: 6px 0 0;
  font-size: 13px;
  color: #6b7280;
}

.internship-actions{
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

/* Buttons */
.btn{
  border: none;
  padding: 10px 14px;
  border-radius: 12px;
  cursor: pointer;
  font-size: 13px;
  font-weight: 900;
  text-decoration: none;
  transition: 0.2s ease;
  display: inline-block;
}

.btn-primary{
  background: #3e7cd7;
  color: #fff;
}

.btn-primary:hover{
  opacity: 0.92;
}

.btn-light{
  background: #f1f5f9;
  color: #1c2b4a;
}

.btn-light:hover{
  background: #e7edf6;
}

/* Status */
.internship-status{
  margin-bottom: 16px;
}

.status-card{
  background: #fff;
  border: 1px solid #e8eef4;
  border-radius: 18px;
  padding: 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.05);
}

.status-left{
  display: flex;
  align-items: center;
  gap: 12px;
}

.status-icon{
  font-size: 26px;
  width: 55px;
  height: 55px;
  border-radius: 16px;
  background: #f1f5ff;
  display: flex;
  align-items: center;
  justify-content: center;
}

.status-left h3{
  margin: 0;
  font-size: 15px;
  font-weight: 900;
  color: #1c2b4a;
}

.status-left p{
  margin: 6px 0 0;
  color: #6b7280;
  font-size: 13px;
}

.status-right{
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.badge{
  padding: 8px 12px;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 900;
}

.badge-active{
  background: #ecfff3;
  color: #047857;
}

.badge-type{
  background: #eef3f6;
  color: #1c2b4a;
}

/* Grid */
.internship-grid{
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 14px;
  margin-bottom: 25px;
}

.card{
  background: #fff;
  border: 1px solid #e8eef4;
  border-radius: 18px;
  padding: 16px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}

.card-head{
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 10px;
  margin-bottom: 14px;
}

.card-head h3{
  margin: 0;
  font-size: 15px;
  font-weight: 900;
  color: #1c2b4a;
}

.small{
  font-size: 12px;
  color: #6b7280;
  font-weight: 700;
}

/* Progress */
.progress-wrap{
  margin-top: 6px;
}

.progress-bar{
  width: 100%;
  height: 12px;
  background: #eef3f6;
  border-radius: 999px;
  overflow: hidden;
}

.progress-fill{
  height: 100%;
  width: 0%;
  background: #3e7cd7;
  border-radius: 999px;
  transition: 0.4s ease;
}

.progress-info{
  margin-top: 10px;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 8px;
  font-size: 13px;
  color: #334155;
}

.progress-info strong{
  color: #1c2b4a;
}

/* Supervisor */
.supervisor-box{
  display: flex;
  align-items: center;
  gap: 12px;
}

.supervisor-img{
  width: 62px;
  height: 62px;
  border-radius: 18px;
  object-fit: cover;
  border: 1px solid #e8eef4;
}

.supervisor-info h4{
  margin: 0;
  font-size: 14px;
  font-weight: 900;
  color: #1c2b4a;
}

.supervisor-info p{
  margin: 6px 0 0;
  font-size: 13px;
  color: #6b7280;
}

.card-actions{
  margin-top: 14px;
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

/* Details */
.details-list{
  display: grid;
  gap: 10px;
}

.detail-row{
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 12px;
  padding: 10px 12px;
  border-radius: 14px;
  background: #f7f9fb;
  border: 1px solid #e8eef4;
  font-size: 13px;
}

.detail-row strong{
  font-weight: 900;
  color: #1c2b4a;
}

/* Tasks */
.tasks{
  list-style: none;
  padding: 0;
  margin: 0;
  display: grid;
  gap: 10px;
}

.task{
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  padding: 12px;
  border-radius: 14px;
  border: 1px solid #e8eef4;
  background: #fff;
  font-size: 13px;
  transition: 0.2s ease;
}

.task.done{
  background: #ecfff3;
  border-color: #c9f7d8;
}

.task button{
  border: none;
  width: 36px;
  height: 36px;
  border-radius: 12px;
  cursor: pointer;
  font-weight: 900;
  background: #eef3f6;
}

.task.done button{
  background: #3e7cd7;
  color: #fff;
}

.add-task{
  margin-top: 12px;
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

.add-task input{
  flex: 1;
  min-width: 220px;
  padding: 10px 12px;
  border-radius: 12px;
  border: 1px solid #e3eaf2;
  outline: none;
  font-size: 13px;
  background: #fff;
}

/* Modal */
.modal{
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.4);
  display: none;
  align-items: center;
  justify-content: center;
  z-index: 99999;
  padding: 18px;
}

.modal.active{
  display: flex;
}

.modal-box{
  width: 520px;
  max-width: 100%;
  background: #fff;
  border-radius: 18px;
  border: 1px solid #e8eef4;
  overflow: hidden;
  box-shadow: 0 20px 55px rgba(0,0,0,0.2);
}

.modal-head{
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 14px 16px;
  border-bottom: 1px solid #eee;
}

.modal-head h3{
  margin: 0;
  font-size: 15px;
  font-weight: 900;
  color: #1c2b4a;
}

.close-btn{
  border: none;
  background: transparent;
  cursor: pointer;
  font-size: 16px;
}

.modal-body{
  padding: 14px 16px;
  display: grid;
  gap: 10px;
}

.modal-body label{
  font-size: 13px;
  font-weight: 900;
  color: #1c2b4a;
}

.modal-body input,
.modal-body textarea{
  width: 100%;
  padding: 10px 12px;
  border-radius: 12px;
  border: 1px solid #e3eaf2;
  outline: none;
  font-size: 13px;
  background: #fff;
}

.modal-actions{
  padding: 14px 16px;
  border-top: 1px solid #eee;
  display: flex;
  justify-content: flex-start;
  gap: 10px;
}
.delete-task-btn{

  background:#ffe9e9;
  border:none;

  color:#b91c1c;

  padding:6px 10px;

  border-radius:8px;

  cursor:pointer;

  font-size:14px;

  transition:0.2s;

}

.delete-task-btn:hover{

  background:#ffd6d6;

}
.task-actions{
  display: flex;
  gap: 8px;
}

.task-btn{
  border: none;
  width: 38px;
  height: 38px;
  border-radius: 12px;
  cursor: pointer;
  font-weight: 900;
  background: #eef3f6;
  transition: 0.2s ease;
}
.task span{
  flex: 1;
  font-size: 14px;
  font-weight: 700;
  color: #333;
}
.task-actions{
  display: flex;
  align-items: center;
  gap: 8px;
  flex-shrink: 0;
}

.task.done .done-btn{
  background: #3e7cd7;
  color: #fff;
}

.delete-btn{
  background: #ffecec;
  color: #b30000;
}

.delete-btn:hover{
  background: #ffdada;
}


/* Responsive */
@media (max-width: 1100px){
  .internship-grid{
    grid-template-columns: 1fr;
  }
}
/* =========================
   Tasks List
========================= */

.task {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 14px;

    background: #ffffff;
    border: 1px solid #e5edf5;
    border-radius: 14px;

    padding: 12px 16px;
    margin-bottom: 10px;

    transition: 0.2s ease;
}

.task:hover {
    background: #f8fbff;
    transform: translateY(-1px);
}

/* النص */
.task span {
    font-size: 14px;
    font-weight: 600;
    color: #1e293b;
    line-height: 1.6;
}

/* =========================
   Actions
========================= */

.task-actions {
    display: flex;
    gap: 8px;
}

/* الزر العام */
.task-btn {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    border: none;
    cursor: pointer;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 16px;
    font-weight: bold;

    transition: 0.2s ease;
}

/* زر الصح */
.done-btn {
    background: #ecfdf5;
    color: #059669;
}

.done-btn:hover {
    background: #d1fae5;
}

/* زر الحذف */
.delete-btn {
    background: #fef2f2;
    color: #dc2626;
}

.delete-btn:hover {
    background: #fee2e2;
}

/* =========================
   Completed Task
========================= */

.task.completed span {
    text-decoration: line-through;
    color: #94a3b8;
}

.task.completed {
    background: #f1f5f9;
}
  </style>

<!-- =========================
     Internship Page Content
========================= -->
<main class="page-container">

  <!-- Page Header -->
  <div class="page-title">
    <div>
      <h2>ملف التدريب</h2>
      <p>تابعي حالة التدريب، الساعات، والمشرف، وكل التفاصيل الأساسية</p>
    </div>

    <div class="internship-actions">
      <button class="btn btn-primary" onclick="openRequestModal()">طلب اعتماد ساعات</button>
      <button class="btn btn-light" onclick="openSupervisorModal()">تواصل مع المشرف</button>
    </div>
  </div>

  <!-- Internship Status Card -->
  <section class="internship-status">

    <div class="status-card">
      <div class="status-left">
        <span class="status-icon">🏢</span>
        <div>
          <h3>التدريب الحالي</h3>
          <p id="internshipCompany">شركة نظم المستقبل</p>
        </div>
      </div>

      <div class="status-right">
        <span class="badge badge-active" id="internshipState">نشط</span>
        <span class="badge badge-type" id="internshipType">عن بُعد</span>
      </div>
    </div>

  </section>

  <!-- Grid -->
  <section class="internship-grid">

    <!-- Progress -->
    <div class="card">
      <div class="card-head">
        <h3>تقدم الساعات</h3>
        <span class="small">الهدف: 120 ساعة</span>
      </div>

      <div class="progress-wrap">
        <div class="progress-bar">
          <div class="progress-fill" id="progressFill"></div>
        </div>

        <div class="progress-info">
          <span>المكتملة: <strong id="hoursDone">48</strong> ساعة</span>
          <span>المتبقية: <strong id="hoursLeft">72</strong> ساعة</span>
        </div>
      </div>

      <div class="card-actions">
        <a class="btn btn-light" href="{{ route('front.student.hours') }}">عرض صفحة الساعات</a>
      </div>
    </div>

    <!-- Supervisor -->
    <div class="card">
      <div class="card-head">
        <h3>المشرف الأكاديمي</h3>
        <span class="small">مسؤول المتابعة</span>
      </div>

      <div class="supervisor-box">
        <img src="../../img/supervisor.png" class="supervisor-img" alt="Supervisor" />
        <div class="supervisor-info">
          <h4 id="supName">د. أحمد النجار</h4>
          <p id="supEmail">ahmad.najjar@ucas.edu.ps</p>
          <p id="supPhone">📞 +970 59 000 0000</p>
        </div>
      </div>

      <div class="card-actions">
        <button class="btn btn-primary" onclick="openSupervisorModal()">إرسال رسالة</button>
      </div>
    </div>

    <!-- Internship Details -->
    <div class="card">
      <div class="card-head">
        <h3>تفاصيل التدريب</h3>
        <span class="small">معلومات أساسية</span>
      </div>

      <div class="details-list">
        <div class="detail-row">
          <span>📌 المسمى</span>
          <strong id="internshipTitle">Back-End Laravel</strong>
        </div>

        <div class="detail-row">
          <span>📅 تاريخ البداية</span>
          <strong id="startDate">2026-02-01</strong>
        </div>

        <div class="detail-row">
          <span>📅 تاريخ النهاية</span>
          <strong id="endDate">2026-06-01</strong>
        </div>

        <div class="detail-row">
          <span>⏳ المدة</span>
          <strong id="duration">4 شهور</strong>
        </div>

        <div class="detail-row">
          <span>📍 المكان</span>
          <strong id="location">عن بُعد</strong>
        </div>
      </div>

      <div class="card-actions">
        <button class="btn btn-light" onclick="downloadInternshipLetter()">تحميل خطاب التدريب</button>
      </div>
    </div>

    <!-- Tasks -->
    <div class="card">
      <div class="card-head">
        <h3>مهام التدريب</h3>
        <span class="small">قائمة مهام للتتبع</span>
      </div>

      <ul class="tasks" id="tasksList">
<li class="task">
  <span class="task-text">ربط واجهات الفرص بصفحة التفاصيل</span>

  <div class="task-actions">
    <button class="task-btn done-btn" onclick="toggleTask(this)">✓</button>
    <button class="task-btn delete-btn" onclick="deleteTask(this)">✖</button>
  </div>
</li>




      </ul>

      <div class="add-task">
        <input type="text" id="taskInput" placeholder="أضيفي مهمة جديدة..." />
        <button class="btn btn-primary" onclick="addTask()">إضافة</button>

      </div>
    </div>

  </section>

</main>

<!-- =========================
     Modal: Request Hours
========================= -->
<div class="modal" id="hoursModal">
  <div class="modal-box">
    <div class="modal-head">
      <h3>طلب اعتماد ساعات</h3>
      <button class="close-btn" onclick="closeRequestModal()">✖</button>
    </div>

    <div class="modal-body">
      <label>عدد الساعات المطلوب اعتمادها</label>
      <input type="number" id="reqHours" placeholder="مثال: 10" />

      <label>ملاحظات (اختياري)</label>
      <textarea id="reqNote" rows="4" placeholder="مثال: ساعات هذا الأسبوع + وصف العمل"></textarea>
    </div>

    <div class="modal-actions">
      <button class="btn btn-light" onclick="closeRequestModal()">إلغاء</button>
      <button class="btn btn-primary" onclick="submitHoursRequest()">إرسال الطلب</button>
    </div>
  </div>
</div>

<!-- =========================
     Modal: Supervisor Message
========================= -->
<div class="modal" id="supModal">
  <div class="modal-box">
    <div class="modal-head">
      <h3>رسالة للمشرف</h3>
      <button class="close-btn" onclick="closeSupervisorModal()">✖</button>
    </div>

    <div class="modal-body">
      <label>الموضوع</label>
      <input type="text" id="msgSubject" placeholder="مثال: اعتماد ساعات التدريب" />

      <label>الرسالة</label>
      <textarea id="msgBody" rows="5" placeholder="اكتبي رسالتك هنا..."></textarea>
    </div>

    <div class="modal-actions">
      <button class="btn btn-light" onclick="closeSupervisorModal()">إلغاء</button>
      <button class="btn btn-primary" onclick="sendMessage()">إرسال</button>
    </div>
  </div>
</div>








<script>
document.addEventListener("DOMContentLoaded", () => {

  const notifBtn = document.getElementById("notifBtn");
  const notifDropdown = document.getElementById("notifDropdown");

  const studentMenuBtn = document.getElementById("studentMenuBtn");
  const studentDropdown = document.getElementById("studentDropdown");

  // Toggle Notifications
  if (notifBtn && notifDropdown) {
    notifBtn.addEventListener("click", (e) => {
      e.stopPropagation();

      // اقفلي قائمة الطالب لو مفتوحة
      if (studentDropdown) studentDropdown.style.display = "none";

      notifDropdown.classList.toggle("active");
    });
  }

  // Toggle Student Menu
  if (studentMenuBtn && studentDropdown) {
    studentMenuBtn.addEventListener("click", (e) => {
      e.stopPropagation();

      // اقفلي الإشعارات لو مفتوحة
      if (notifDropdown) notifDropdown.classList.remove("active");

      // فتح/إغلاق
      studentDropdown.style.display =
        studentDropdown.style.display === "block" ? "none" : "block";
    });
  }

  // Close when clicking outside
  document.addEventListener("click", () => {
    if (notifDropdown) notifDropdown.classList.remove("active");
    if (studentDropdown) studentDropdown.style.display = "none";
  });

  // Prevent closing when clicking inside dropdown
  if (notifDropdown) {
    notifDropdown.addEventListener("click", (e) => e.stopPropagation());
  }

  if (studentDropdown) {
    studentDropdown.addEventListener("click", (e) => e.stopPropagation());
  }

});

const links = document.querySelectorAll(".student-pages-container a");

const currentPage = window.location.pathname.split("/").pop();

links.forEach(link => {

  const linkPage = link.getAttribute("href");

  if (linkPage === currentPage) {

    link.classList.add("active");

  }

});
document.addEventListener("DOMContentLoaded", function () {

  const currentPage = window.location.pathname.split("/").pop();

  const pageTitle = document.getElementById("pageTitle");

  const titles = {

    "dashboard.html": "لوحة التحكم",
    "profile.html": "الملف الشخصي",
    "applications.html": "طلباتي",
    "internship.html": "ملف التدريب",
    "reports.html": "التقارير",
    "hours.html": "ساعات التدريب",
    "certificate.html": "الشهادة",
    "notifications.html": "الإشعارات"

  };

  if (titles[currentPage]) {
    pageTitle.textContent = titles[currentPage];
  }

});
document.addEventListener("DOMContentLoaded", () => {

  // Hours Progress
  const done = 48;
  const goal = 120;

  const hoursDone = document.getElementById("hoursDone");
  const hoursLeft = document.getElementById("hoursLeft");
  const progressFill = document.getElementById("progressFill");

  if (hoursDone && hoursLeft && progressFill) {
    hoursDone.textContent = done;
    hoursLeft.textContent = Math.max(goal - done, 0);

    const percent = Math.min((done / goal) * 100, 100);
    progressFill.style.width = percent + "%";
  }

});

/* =========================
   Tasks
========================= */

function toggleTask(btn) {
  const li = btn.closest(".task");
  if (!li) return;

  li.classList.toggle("done");
}

function addTask() {
  const input = document.getElementById("taskInput");
  const list = document.getElementById("tasksList");

  if (!input || !list) return;

  const value = input.value.trim();
  if (value === "") return;

  const li = document.createElement("li");
  li.className = "task";

  li.innerHTML = `
    <span>${value}</span>
    <button onclick="toggleTask(this)">✓</button>
    <button class="task-btn delete-btn" onclick="deleteTask(this)">✖</button>
  `;

  list.appendChild(li);
  input.value = "";
}

/* =========================
   Modal: Request Hours
========================= */

function openRequestModal() {
  document.getElementById("hoursModal").classList.add("active");
}

function closeRequestModal() {
  document.getElementById("hoursModal").classList.remove("active");
}

function submitHoursRequest() {
  const hours = document.getElementById("reqHours").value;
  const note = document.getElementById("reqNote").value;

  if (!hours || hours <= 0) {
    alert("رجاءً أدخلي عدد ساعات صحيح.");
    return;
  }

  alert("✅ تم إرسال طلب اعتماد الساعات بنجاح!\n\nعدد الساعات: " + hours);

  document.getElementById("reqHours").value = "";
  document.getElementById("reqNote").value = "";

  closeRequestModal();
}

/* =========================
   Modal: Supervisor Message
========================= */

function openSupervisorModal() {
  document.getElementById("supModal").classList.add("active");
}

function closeSupervisorModal() {
  document.getElementById("supModal").classList.remove("active");
}

function sendMessage() {
  const subject = document.getElementById("msgSubject").value.trim();
  const body = document.getElementById("msgBody").value.trim();

  if (!subject || !body) {
    alert("رجاءً اكتبي الموضوع والرسالة.");
    return;
  }

  alert("📩 تم إرسال الرسالة للمشرف بنجاح!");

  document.getElementById("msgSubject").value = "";
  document.getElementById("msgBody").value = "";

  closeSupervisorModal();
}

/* =========================
   Download Letter (Fake)
========================= */

function downloadInternshipLetter() {
  alert("📄 سيتم تحميل خطاب التدريب (حاليًا تجريبي) — عند ربط Laravel سيتم تحميله PDF.");
}

/* =========================
   Close modal when clicking outside
========================= */

document.addEventListener("click", (e) => {
  const hoursModal = document.getElementById("hoursModal");
  const supModal = document.getElementById("supModal");

  if (hoursModal && hoursModal.classList.contains("active")) {
    if (e.target === hoursModal) closeRequestModal();
  }

  if (supModal && supModal.classList.contains("active")) {
    if (e.target === supModal) closeSupervisorModal();
  }
});

function toggleTask(btn) {
  const li = btn.closest(".task");
  if (!li) return;

  li.classList.toggle("done");
}
function deleteTask(btn){
  const li = btn.closest(".task");
  if (!li) return;

  li.remove();
}
// Source: https://developer.mozilla.org/en-US/docs/Web/API/Web_Storage_API
const LS_APPROVALS = "hour_approvals_v1";

function sendHoursApproval({ uniId, studentName, hours, period, studentNote }) {
  const list = JSON.parse(localStorage.getItem(LS_APPROVALS) || "[]");
  list.push({
    id: String(Date.now()),
    uniId: String(uniId),
    studentName: studentName || "طالب",
    hours: String(hours || "0"),
    period: period || "—",
    studentNote: studentNote || "",
    status: "pending",
    ts: new Date().toISOString(),
    updatedAt: new Date().toISOString()
  });
  localStorage.setItem(LS_APPROVALS, JSON.stringify(list));
}
</script>

@section('js')
@endsection
@endsection
