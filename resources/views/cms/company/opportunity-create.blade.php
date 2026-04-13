@extends('cms.company.temp')
@section('title','create apportunities')
@section('main-title','انشاء فرصة')
@section('content')
  <style>
    /* =========================
      Student Top Navbar
    ========================= */

    body {
      margin: 0;
      font-family: Tahoma, Arial, sans-serif;
      background: #f7f9fb;
    }

    .company-topbar {
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
    .company-profile {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      background: #3e7cd7;
      padding: 6px 12px;
      border-radius: 10px;
      transition: 0.2s ease;
    }

    .scompany-profile:hover {
      background: #3e7cd7;
    }

    .company-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid rgba(255, 255, 255, 0.6);
    }

    .company-info {
      display: flex;
      flex-direction: column;
      line-height: 1.2;
    }

    .company-name {
      color: #fff;
      font-size: 14px;
      font-weight: 600;
    }

    .company-email {
      color: #cfe0e7;
      font-size: 12px;
    }

    .company-arrow {
      color: #fff;
      font-size: 14px;
      margin-right: 4px;
    }

    /* Dropdown */
    .company-dropdown {
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

    .company-dropdown a {
      display: block;
      padding: 12px 14px;
      color: #3e7cd7;
      font-size: 14px;
      text-decoration: none;
      transition: 0.2s ease;
    }

    .company-dropdown a:hover {
      background: #f2f5f7;
    }

    .company-dropdown hr {
      margin: 0;
      border: none;
      border-top: 1px solid #eee;
    }

    .company-dropdown .logout {
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

    .company-pages-nav {
      width: 100%;
      background: #ffffff;
      border-bottom: 1px solid #e6edf1;
    }

    .company-pages-container {
      width: 92%;
      margin: auto;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      gap: 16px;
      padding: 10px 0;
      flex-wrap: wrap;
    }

    .company-pages-container a {
      text-decoration: none;
      color: #3e7cd7;
      font-size: 14px;
      font-weight: 600;
      padding: 8px 12px;
      border-radius: 10px;
      transition: 0.2s ease;
    }

    .company-pages-container a:hover {
      background: #eef3f6;
    }

    .company-pages-container a.active {
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
/* .main-footer {
  background: #3e7cd7;
  color: #fff;
  padding: 45px 0 15px;
  margin-top: 50px;
} */

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
  Opportunity Create Page
========================= */

.page-wrap {
  width: 92%;
  margin: 22px auto;
  padding-bottom: 30px;
}

.page-head {
  background: #fff;
  border-radius: 16px;
  padding: 18px 18px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
  border: 1px solid #eef3f6;
  margin-bottom: 18px;
}

.page-head h2 {
  margin: 0;
  font-size: 18px;
  font-weight: 900;
  color: #222;
}

.page-head p {
  margin: 6px 0 0;
  font-size: 13px;
  color: #666;
  line-height: 1.7;
}

.create-card {
  background: #fff;
  border-radius: 16px;
  padding: 18px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
  border: 1px solid #eef3f6;
}

.create-form {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 14px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 7px;
}

.form-group.full {
  grid-column: 1 / -1;
}

.form-group label {
  font-size: 13px;
  font-weight: 800;
  color: #222;
}

.form-group input,
.form-group select,
.form-group textarea {
  padding: 11px 12px;
  border-radius: 12px;
  border: 1px solid #dfe7ef;
  outline: none;
  font-size: 13px;
  background: #fff;
  transition: 0.2s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  border-color: #3e7cd7;
  box-shadow: 0 0 0 3px rgba(62, 124, 215, 0.12);
}

.form-group textarea {
  resize: vertical;
  min-height: 120px;
}

.form-actions {
  display: flex;
  gap: 10px;
  align-items: center;
  justify-content: flex-start;
  margin-top: 4px;
  flex-wrap: wrap;
}

.btn-primary {
  padding: 11px 14px;
  border-radius: 12px;
  border: none;
  background: #3e7cd7;
  color: #fff;
  font-size: 13px;
  font-weight: 900;
  cursor: pointer;
  transition: 0.2s;
}

.btn-primary:hover {
  opacity: 0.92;
}

.btn-outline {
  padding: 11px 14px;
  border-radius: 12px;
  border: 1px solid #dfe7ef;
  background: #fff;
  font-size: 13px;
  font-weight: 900;
  cursor: pointer;
  text-decoration: none;
  color: #3e7cd7;
  transition: 0.2s;
}

.btn-outline:hover {
  background: #f5f8fb;
}

@media (max-width: 850px) {
  .create-form {
    grid-template-columns: 1fr;
  }
}

</style>
</head>

<body>


<main class="page-wrap">

  <section class="page-head">
    <h2>➕ إنشاء فرصة تدريب جديدة</h2>
    <p>قومي بتعبئة البيانات التالية لإضافة فرصة تدريب للطلبة.</p>
  </section>

  <section class="create-card">

    <form class="create-form" id="createOpportunityForm">

      <!-- Opportunity Title -->
      <div class="form-group">
        <label>اسم الفرصة التدريبية *</label>
        <input type="text" id="title" placeholder="مثال: تدريب Front-End Developer" required />
      </div>

      <!-- Category -->
      <div class="form-group">
        <label>التخصص / المجال *</label>
        <select id="category" required>
          <option value="">اختر المجال</option>
          <option>Software Development</option>
          <option>Cyber Security</option>
          <option>UI/UX Design</option>
          <option>Data Science</option>
          <option>Mobile Development</option>
          <option>Network</option>
        </select>
      </div>

      <!-- Location -->
      <div class="form-group">
        <label>مكان التدريب *</label>
        <input type="text" id="location" placeholder="مثال: غزة - الرمال" required />
      </div>

      <!-- Type -->
      <div class="form-group">
        <label>نوع التدريب *</label>
        <select id="type" required>
          <option value="">اختر النوع</option>
          <option>حضوري</option>
          <option>عن بعد</option>
          <option>هجين</option>
        </select>
      </div>

      <!-- Duration -->
      <div class="form-group">
        <label>مدة التدريب *</label>
        <input type="text" id="duration" placeholder="مثال: شهرين" required />
      </div>

      <!-- Hours -->
      <div class="form-group">
        <label>عدد الساعات المطلوبة *</label>
        <input type="number" id="hours" placeholder="مثال: 120" required />
      </div>

      <!-- Seats -->
      <div class="form-group">
        <label>عدد المقاعد *</label>
        <input type="number" id="seats" placeholder="مثال: 5" required />
      </div>

      <!-- Deadline -->
      <div class="form-group">
        <label>آخر موعد للتقديم *</label>
        <input type="date" id="deadline" required />
      </div>

      <!-- Description -->
      <div class="form-group full">
        <label>وصف الفرصة *</label>
        <textarea id="description" rows="5" placeholder="اكتبي تفاصيل التدريب، المهام، المتطلبات..." required></textarea>
      </div>

      <!-- Requirements -->
      <div class="form-group full">
        <label>المتطلبات (اختياري)</label>
        <textarea id="requirements" rows="4" placeholder="مثال: HTML, CSS, JavaScript..."></textarea>
      </div>

      <!-- Buttons -->
      <div class="form-actions full">
        <button type="submit" class="btn-primary">💾 حفظ الفرصة</button>
        <a href="{{ route('cms.Company.opportunities') }}" class="btn-outline">↩ رجوع لقائمة الفرص</a>
      </div>

    </form>

  </section>

</main>
















<script>
document.addEventListener("DOMContentLoaded", () => {

  const notifBtn = document.getElementById("notifBtn");
  const notifDropdown = document.getElementById("notifDropdown");

  const companyMenuBtn = document.getElementById("companyMenuBtn");
  const companyDropdown = document.getElementById("companyDropdown");

  // Toggle Notifications
  if (notifBtn && notifDropdown) {
    notifBtn.addEventListener("click", (e) => {
      e.stopPropagation();

      // اقفلي قائمة الطالب لو مفتوحة
      if (companyDropdown) companyDropdown.style.display = "none";

      notifDropdown.classList.toggle("active");
    });
  }

  // Toggle Student Menu
  if (companyMenuBtn && companyDropdown) {
    companyMenuBtn.addEventListener("click", (e) => {
      e.stopPropagation();

      // اقفلي الإشعارات لو مفتوحة
      if (notifDropdown) notifDropdown.classList.remove("active");

      // فتح/إغلاق
      companyDropdown.style.display =
        companyDropdown.style.display === "block" ? "none" : "block";
    });
  }

  // Close when clicking outside
  document.addEventListener("click", () => {
    if (notifDropdown) notifDropdown.classList.remove("active");
    if (companyDropdown) companyDropdown.style.display = "none";
  });

  // Prevent closing when clicking inside dropdown
  if (notifDropdown) {
    notifDropdown.addEventListener("click", (e) => e.stopPropagation());
  }

  if (companyDropdown) {
    companyDropdown.addEventListener("click", (e) => e.stopPropagation());
  }

});

const links = document.querySelectorAll(".company-pages-container a");

const currentPage = window.location.pathname.split("/").pop();

links.forEach(link => {

  const linkPage = link.getAttribute("href").split("/").pop();


  if (linkPage === currentPage) {

    link.classList.add("active");

  }

});


document.addEventListener("DOMContentLoaded", () => {

  const form = document.getElementById("createOpportunityForm");

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const opportunity = {
      id: Date.now(),
      title: document.getElementById("title").value.trim(),
      category: document.getElementById("category").value,
      location: document.getElementById("location").value.trim(),
      type: document.getElementById("type").value,
      duration: document.getElementById("duration").value.trim(),
      hours: document.getElementById("hours").value,
      seats: document.getElementById("seats").value,
      deadline: document.getElementById("deadline").value,
      description: document.getElementById("description").value.trim(),
      requirements: document.getElementById("requirements").value.trim(),
      createdAt: new Date().toISOString()
    };

    // حفظ في localStorage
    const oldData = JSON.parse(localStorage.getItem("company_opportunities")) || [];
    oldData.unshift(opportunity);
    localStorage.setItem("company_opportunities", JSON.stringify(oldData));

    alert("✅ تم إنشاء الفرصة بنجاح!");

    // رجوع لقائمة الفرص
    window.location.href = "{{ route('cms.Company.opportunities') }}";
  });

});

</script>


</body>
</html>

@endsection
