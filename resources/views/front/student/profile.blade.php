@extends('front.layout.student')

@section('title','profile')

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
      color: #222;
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
   Profile Page Content
========================= */

.page-container{
  width: 92%;
  margin: 25px auto 0;
}

.page-title{
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 18px;
}

.page-title h2{
  margin: 0;
  font-size: 20px;
  font-weight: 800;
  color: #1c2b4a;
}

.page-title p{
  margin: 6px 0 0;
  font-size: 13px;
  color: #6b7280;
}

/* Grid */
.profile-grid{
 display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 18px;
}
.profile-card{
  text-align: center;

}

/* Card */
.card{
  background: #fff;
  border: 1px solid #e8eef4;
  border-radius: 16px;
  padding: 18px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}

.profile-big-avatar{
  width: 95px;
  height: 95px;
  border-radius: 50%;
  object-fit: cover;
  border: 4px solid rgba(62,124,215,0.25);
  margin-bottom: 12px;
}

.profile-card h3{
  margin: 0;
  font-size: 18px;
  font-weight: 900;
  color: #1c2b4a;
}

.profile-card .sid{
  margin: 8px 0 0;
  font-size: 13px;
  color: #6b7280;
}

.profile-tags{
  display: flex;
  justify-content: center;
  gap: 8px;
  flex-wrap: wrap;
  margin-top: 14px;
}

.tag{
  background: #eef3ff;
  color: #2b5fb5;
  font-size: 12px;
  font-weight: 700;
  padding: 6px 10px;
  border-radius: 999px;
}

/* Buttons */
.profile-actions{
  display: flex;
  gap: 10px;
  margin-top: 16px;
  justify-content: center;
  flex-wrap: wrap;
}

.btn{
  border: none;
  padding: 10px 14px;
  border-radius: 12px;
  cursor: pointer;
  font-size: 13px;
  font-weight: 800;
  transition: 0.2s ease;
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

/* Right info */
.info-title{
  margin: 0;
  font-size: 16px;
  font-weight: 900;
  color: #1c2b4a;
  margin-bottom: 12px;
}

.info-grid{
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
}

.info-item{
  background: #f7f9fb;
  border: 1px solid #e8eef4;
  padding: 12px 12px;
  border-radius: 14px;
}

.info-item span{
  display: block;
  font-size: 12px;
  color: #6b7280;
  margin-bottom: 6px;
  font-weight: 700;
}

.info-item strong{
  display: block;
  font-size: 14px;
  color: #1c2b4a;
  font-weight: 900;
}

.info-item.full{
  grid-column: 1 / -1;
}
/* =========================
   Change Photo Button
========================= */

.btn-secondary{

  background: #eef2f7;
  color: #2b3a55;

  border: none;
  padding: 8px 14px;

  border-radius: 10px;

  font-size: 13px;
  font-weight: 700;

  cursor: pointer;

  margin-top: 10px;

  transition: 0.2s;

}

.btn-secondary:hover{

  background: #dbe4f2;

}


/* =========================
   Training Status Box
========================= */

.training-status-box{

  background: #f7f9fc;

  border: 1px solid #e3e8ef;

  border-radius: 12px;

  padding: 10px;

  margin-top: 14px;

}

.training-status-box span{

  font-size: 12px;
  color: #6b7280;

}

.training-status-box strong{

  display: block;
  margin-top: 4px;

  font-size: 14px;
  font-weight: bold;

}


/* Accepted */
.status.accepted{

  color: #16a34a;

}

/* Pending */
.status.pending{

  color: #f59e0b;

}

/* Rejected */
.status.rejected{

  color: #dc2626;

}
/* Modal */
.modal { display:none; position:fixed; inset:0; z-index:3000; }
.modal.show { display:block; }

.modal-overlay{
  position:absolute; inset:0;
  background: rgba(15,23,42,.45);
  backdrop-filter: blur(2px);
}

.modal-card{
  position:relative;
  width:min(520px, 92vw);
  margin: 8vh auto 0;
  background:#fff;
  border-radius:16px;
  box-shadow: 0 12px 30px rgba(15,23,42,.18);
  overflow:hidden;
  border:1px solid #e6edf5;
}

.modal-head{
  padding:14px 16px;
  display:flex; align-items:center; justify-content:space-between;
  border-bottom:1px solid #e6edf5;
}
.modal-head h3{ margin:0; font-size:18px; }

.modal-close{
  width:38px; height:38px;
  border-radius:12px;
  border:1px solid #e6edf5;
  background:#fff;
  cursor:pointer;
  font-size:20px;
  line-height:1;
}

.modal-body{ padding:14px 16px; }
.field{ display:flex; flex-direction:column; gap:6px; margin-bottom:12px; }
.field label{ font-size:13px; font-weight:700; color:#334155; }
.field input{
  border:1px solid #e6edf5;
  border-radius:12px;
  padding:10px 12px;
  outline:none;
}
.field input:focus{ border-color:#cfe0ff; box-shadow:0 0 0 4px rgba(62,124,215,.12); }

.hint{ margin:6px 0 0; font-size:13px; font-weight:700; color:#6b7280; }
.hint.ok{ color:#12b76a; }
.hint.err{ color:#f04438; }

.modal-foot{
  padding:12px 16px;
  display:flex; gap:10px; justify-content:flex-start;
  border-top:1px solid #e6edf5;
}
/* Responsive */
@media (max-width: 950px){
  .profile-grid{
    grid-template-columns: 1fr;
  }
}

  </style>

<main class="page-container">

  <div class="page-title">
    <div>
      <h2>معلومات الطالب</h2>
      <p>يمكنك مراجعة بياناتك وتحديثها عند الحاجة.</p>
    </div>
  </div>

  <div class="profile-grid">

    <!-- Left Card -->
    <section class="card profile-card">
      <img src="{{ asset('internship/img/israa.jpeg') }}" alt="Student" class="profile-big-avatar" />
        <input type="file" id="uploadPhoto" hidden>

<button class="btn-secondary"
onclick="document.getElementById('uploadPhoto').click()">
📷 تغيير الصورة
</button>


      <h3>اسراء جمال محمد كسكين</h3>

      <p class="sid">الرقم الجامعي: <b>202225583</b></p>
       <!-- حالة التدريب -->
  <div class="training-status-box">
    <span>حالة التدريب</span>
    <strong class="status accepted">تم القبول</strong>
  </div>
      <div class="profile-tags">
        <span class="tag">كلية الهندسة</span>
        <span class="tag">أمن المعلومات</span>
        <span class="tag">طالب</span>
      </div>

      <div class="profile-actions">
       <button class="btn btn-primary" id="editBtn">
            ✏️ تعديل البيانات
          </button>

          <button class="btn btn-light" id="saveBtn" style="display:none;">
            💾 حفظ التعديلات
          </button>

 <button type="button" class="btn btn-light" id="openPassModal">
  🔑 تغيير كلمة المرور
</button>
      </div>
    </section>

    <!-- Right Card -->
    <section class="card">
        <h3 class="info-title">البيانات الأكاديمية</h3>

        <div class="info-grid">

          <div class="info-item">
            <span>الكلية</span>
            <strong>الهندسة وتكنولوجيا المعلومات</strong>
          </div>

          <div class="info-item">
            <span>التخصص</span>
            <strong>أمن المعلومات السيبراني</strong>
          </div>

          <div class="info-item">
            <span>المستوى</span>
            <strong>المستوى الرابع</strong>
          </div>

          <div class="info-item">
            <span>حالة التدريب</span>
            <strong>قيد المتابعة</strong>
          </div>

          <div class="info-item">
            <span>عدد الساعات المطلوبة</span>
            <strong>120 ساعة</strong>
          </div>

          <div class="info-item">
            <span>عدد الساعات المنجزة</span>
            <strong>40 ساعة</strong>
          </div>

          <div class="info-item full">
            <span>البريد الجامعي</span>
            <strong id="studentEmail">ikaskeen@smail.ucas.edu.ps</strong>
          </div>


        </div>

        <h3 class="info-title" style="margin-top:18px;">معلومات التواصل</h3>

        <div class="info-grid">
          <div class="info-item">
            <span>رقم الهاتف</span>
            <strong id="studentPhone">+970 59 000 0000</strong>
          </div>

          <div class="info-item">
            <span>المدينة</span>
            <strong id="studentCity">غزة</strong>
          </div>

          <div class="info-item full">
            <span>العنوان</span>
            <strong>فلسطين - قطاع غزة</strong>
          </div>
        </div>
      </section>

  </div>
</main>





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
// =========================
// Active Link in Navbar
// =========================
const link = document.querySelectorAll(".student-pages-container a");
const currentPageس = window.location.pathname.split("/").pop();

links.forEach(link => {
  const linkPage = link.getAttribute("href");
  if (linkPage === currentPage) {
    link.classList.add("active");
  }
});

// =========================
// Change Page Title (Topbar)
// =========================
document.addEventListener("DOMContentLoaded", function () {

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

  if (pageTitle && titles[currentPage]) {
    pageTitle.textContent = titles[currentPage];
  }

});
 // Global Logout (All Pages)

document.addEventListener("DOMContentLoaded", () => {

  const logoutBtn = document.getElementById("logoutBtn");

  if (logoutBtn) {
    logoutBtn.addEventListener("click", function (e) {
      e.preventDefault();

      // مسح بيانات تسجيل الدخول
      localStorage.clear();
      sessionStorage.clear();

      // تحويل للصفحة الرئيسية
      window.location.href = "{{ route('front.home.index') }}";
    });
  }

});

document.addEventListener("DOMContentLoaded", () => {

  /* =========================
     Logout
  ========================= */
  const logoutBtn = document.getElementById("logoutBtn");
  if (logoutBtn) {
    logoutBtn.addEventListener("click", () => {
      localStorage.clear();
      sessionStorage.clear();
      window.location.href = "{{ route('front.home.index') }}";
    });
  }

  /* =========================
     Messages Badge 🔴
  ========================= */
  const companyId = "COMPANY_001";
  const badge = document.getElementById("msgBadge");

  if (!badge) return;

  const messages = JSON.parse(localStorage.getItem("messages")) || [];

  const unreadCount = messages.filter(
    m => m.toCompanyId === companyId && !m.read
  ).length;

  badge.textContent = unreadCount;
  badge.style.display = unreadCount > 0 ? "inline-block" : "none";

});

document.addEventListener("DOMContentLoaded", () => {

  const companyId = "COMPANY_001"; // نفس ID تبع الشركة
  const badge = document.getElementById("msgBadge");

  // إذا الصفحة ما فيها جرس
  if (!badge) return;

  const messages = JSON.parse(localStorage.getItem("messages")) || [];

  // نحسب الرسائل غير المقروءة
  const unreadCount = messages.filter(
    m => m.toCompanyId === companyId && !m.read
  ).length;

  if (unreadCount > 0) {
    badge.textContent = unreadCount;
    badge.style.display = "inline-block";
  } else {
    badge.style.display = "none";
  }

});



    document.addEventListener("DOMContentLoaded", () => {

  /* =========================
     Edit Profile (Frontend Only)
  ========================= */

  const editBtn = document.getElementById("editBtn");
  const profileSaveBtn = document.getElementById("saveBtn"); // ✅ اسم جديد

  const fields = [
    { id: "studentName", type: "text", tag: "h3" },
    { id: "studentEmail", type: "email", tag: "strong" },
    { id: "studentPhone", type: "text", tag: "strong" },
    { id: "studentCity", type: "text", tag: "strong" }
  ];

  if (editBtn && profileSaveBtn) {
    editBtn.addEventListener("click", () => {
      fields.forEach(f => {
        const el = document.getElementById(f.id);
        if (!el) return;

        const input = document.createElement("input");
        input.className = "edit-input";
        input.type = f.type;
        input.value = el.textContent.trim();
        input.id = f.id;

        el.replaceWith(input);
      });

      editBtn.style.display = "none";
      profileSaveBtn.style.display = "inline-block";
    });

    profileSaveBtn.addEventListener("click", () => {
      fields.forEach(f => {
        const input = document.getElementById(f.id);
        if (!input) return;

        const el = document.createElement(f.tag);
        el.id = f.id;
        el.textContent = input.value.trim();

        input.replaceWith(el);
      });

      profileSaveBtn.style.display = "none";
      editBtn.style.display = "inline-block";

      alert("✅ تم حفظ التعديلات (عرض تجريبي)");
    });
  }

  /* =========================
     Logout
  ========================= */

  const logoutBtn = document.getElementById("logoutBtn");
  if (logoutBtn) {
    logoutBtn.addEventListener("click", (e) => {
      e.preventDefault();
      localStorage.clear();
      sessionStorage.clear();
      window.location.href = "{{ route('front.home.index') }}";
    });
  }

  /* =========================
     Change Password Modal
  ========================= */

  const openPassBtn = document.getElementById("openPassModal");
  const passModal = document.getElementById("passModal");

  const currentPass = document.getElementById("currentPass");
  const newPass = document.getElementById("newPass");
  const confirmPass = document.getElementById("confirmPass");
  const passSaveBtn = document.getElementById("savePassBtn"); // ✅ اسم جديد
  const hint = document.getElementById("passHint");

  function openModal() {
    if (!passModal) return;

    passModal.classList.add("show");
    passModal.setAttribute("aria-hidden", "false");

    if (hint) {
      hint.textContent = "";
      hint.className = "hint";
    }

    if (currentPass) currentPass.value = "";
    if (newPass) newPass.value = "";
    if (confirmPass) confirmPass.value = "";

    setTimeout(() => currentPass?.focus(), 0);
  }

  function closeModal() {
    if (!passModal) return;
    passModal.classList.remove("show");
    passModal.setAttribute("aria-hidden", "true");
  }

  openPassBtn?.addEventListener("click", openModal);

  // إغلاق (X / overlay / زر إلغاء)
  passModal?.addEventListener("click", (e) => {
    const closeId = e.target.getAttribute("data-close");
    if (closeId === "passModal") closeModal();
  });

  // Esc
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && passModal?.classList.contains("show")) closeModal();
  });

  // حفظ كلمة المرور (تجريبي)
  passSaveBtn?.addEventListener("click", () => {
    const cur = currentPass?.value.trim() || "";
    const np  = newPass?.value.trim() || "";
    const cp  = confirmPass?.value.trim() || "";

    if (!cur || !np || !cp) {
      if (hint) { hint.textContent = "رجاءً املئي كل الحقول."; hint.className = "hint err"; }
      return;
    }
    if (np.length < 6) {
      if (hint) { hint.textContent = "كلمة المرور الجديدة لازم تكون 6 أحرف على الأقل."; hint.className = "hint err"; }
      return;
    }
    if (np !== cp) {
      if (hint) { hint.textContent = "تأكيد كلمة المرور غير مطابق."; hint.className = "hint err"; }
      return;
    }

    localStorage.setItem("student_password_demo", np);

    if (hint) { hint.textContent = "تم تغيير كلمة المرور بنجاح ✅"; hint.className = "hint ok"; }
    setTimeout(closeModal, 700);
  });

});

</script>


</body>
<!-- Password Modal -->
<div class="modal" id="passModal" aria-hidden="true">
  <div class="modal-overlay" data-close="passModal"></div>

  <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="passModalTitle">
    <div class="modal-head">
      <h3 id="passModalTitle">تغيير كلمة المرور</h3>
      <button type="button" class="modal-close" data-close="passModal">×</button>
    </div>

    <div class="modal-body">
      <div class="field">
        <label>كلمة المرور الحالية</label>
        <input type="password" id="currentPass" placeholder="••••••••" />
      </div>

      <div class="field">
        <label>كلمة المرور الجديدة</label>
        <input type="password" id="newPass" placeholder="••••••••" />
      </div>

      <div class="field">
        <label>تأكيد كلمة المرور</label>
        <input type="password" id="confirmPass" placeholder="••••••••" />
      </div>

      <p class="hint" id="passHint"></p>
    </div>

    <div class="modal-foot">
      <button type="button" class="btn btn-light" data-close="passModal">إلغاء</button>
      <button type="button" class="btn btn-primary" id="savePassBtn">💾 حفظ</button>
    </div>
  </div>
</div>
@section('js')
@endsection
@endsection

