@extends('cms.company.temp')
@section('title','profile')
@section('main-title','بروفايل الشركة')
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
   Company Profile Page
========================= */

.company-profile-page {
  width: 92%;
  margin: 25px auto 0;
}

/* Header */
.profile-header {
  background: #ffffff;
  border-radius: 18px;
  padding: 18px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  border: 1px solid #eef3f6;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
}

.header-text h2 {
  margin: 0;
  font-size: 20px;
  font-weight: 900;
  color: #222;
}

.header-text p {
  margin: 8px 0 0;
  font-size: 13px;
  color: #666;
  line-height: 1.8;
}

.btn-primary {
  background: #3e7cd7;
  color: #fff;
  padding: 10px 14px;
  border-radius: 12px;
  font-size: 14px;
  font-weight: 800;
  border: none;
  cursor: pointer;
  transition: 0.2s;
}

.btn-primary:hover {
  opacity: 0.92;
}

.btn-outline {
  background: #fff;
  border: 1px solid #3e7cd7;
  color: #3e7cd7;
  padding: 10px 14px;
  border-radius: 12px;
  font-size: 14px;
  font-weight: 800;
  cursor: pointer;
  transition: 0.2s;
}

.btn-outline:hover {
  background: #f1f6ff;
}

/* Grid */
.profile-grid {
  margin-top: 18px;
  display: grid;
  grid-template-columns: 1fr 1.5fr;
  gap: 14px;
}

/* Left Card */
.profile-card {
  background: #fff;
  border-radius: 18px;
  padding: 16px;
  border: 1px solid #eef3f6;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
}

.company-card-top {
  display: flex;
  align-items: center;
  gap: 14px;
  padding-bottom: 14px;
  border-bottom: 1px solid #f2f2f2;
}

.company-big-avatar {
  width: 78px;
  height: 78px;
  border-radius: 18px;
  object-fit: cover;
  border: 2px solid #e9eef5;
}

.company-card-info h3 {
  margin: 0;
  font-size: 16px;
  font-weight: 900;
  color: #222;
}

.company-card-info p {
  margin: 6px 0 0;
  font-size: 13px;
  color: #666;
}

.company-badge {
  display: inline-block;
  margin-top: 8px;
  padding: 6px 10px;
  border-radius: 999px;
  background: #e7f3ff;
  color: #0b72e7;
  font-size: 12px;
  font-weight: 900;
}

/* Details */
.company-card-details {
  margin-top: 14px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.detail-row {
  display: flex;
  justify-content: space-between;
  gap: 10px;
  font-size: 13px;
  padding: 10px 12px;
  border-radius: 14px;
  background: #f7f9fb;
  border: 1px solid #eef3f6;
}

.detail-row .label {
  color: #333;
  font-weight: 900;
}

.detail-row .value {
  color: #555;
  font-weight: 700;
}

/* Right Form Card */
.profile-form-card {
  background: #fff;
  border-radius: 18px;
  padding: 16px;
  border: 1px solid #eef3f6;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
}

.form-title {
  margin: 0 0 12px;
  font-size: 16px;
  font-weight: 900;
  color: #222;
}

.profile-form {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.form-row label {
  display: block;
  margin-bottom: 6px;
  font-size: 13px;
  font-weight: 900;
  color: #333;
}

.form-row input,
.form-row select,
.form-row textarea {
  width: 100%;
  padding: 11px 12px;
  border-radius: 14px;
  border: 1px solid #dfe7ef;
  outline: none;
  font-size: 13px;
  background: #fff;
  transition: 0.2s;
}

.form-row input:focus,
.form-row select:focus,
.form-row textarea:focus {
  border-color: #3e7cd7;
  box-shadow: 0 0 0 3px rgba(62, 124, 215, 0.15);
}

.hint {
  display: block;
  margin-top: 6px;
  font-size: 12px;
  color: #777;
}

/* Buttons */
.form-actions {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  margin-top: 6px;
}

/* Responsive */
@media (max-width: 950px) {
  .profile-grid {
    grid-template-columns: 1fr;
  }

  .profile-header {
    flex-direction: column;
    align-items: flex-start;
  }
}
.profile-page {
  width: 92%;
  margin: 20px auto;
}

/* Header */
.profile-header {
  display: flex;
  align-items: center;
  gap: 20px;
  background: #fff;
  padding: 20px;
  border-radius: 16px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.05);
  margin-bottom: 20px;
}

.profile-avatar {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border: 3px solid #3e7cd7;
}

.profile-info h2 {
  margin: 0;
  color: #3e7cd7;
}

.profile-info p {
  margin: 5px 0 0;
  color: #666;
}

/* Grid */
.profile-grid {
  display: grid;
  grid-template-columns: repeat(2,1fr);
  gap: 20px;
}

/* Card */
.profile-card {
  background: #fff;
  padding: 20px;
  border-radius: 16px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.05);
}

.profile-card h3 {
  margin-bottom: 15px;
  color: #3e7cd7;
}

/* Form */
.form-group {
  display: flex;
  flex-direction: column;
  margin-bottom: 12px;
}

.form-group label {
  font-size: 13px;
  margin-bottom: 5px;
  font-weight: bold;
}

.form-group input {
  padding: 10px;
  border-radius: 10px;
  border: 1px solid #ddd;
}

.form-group input:focus {
  border-color: #3e7cd7;
  outline: none;
}

/* Button */
.btn-save {
  width: 100%;
  padding: 10px;
  background: #3e7cd7;
  color: #fff;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  margin-top: 10px;
}

.btn-save:hover {
  opacity: 0.9;
}

/* Responsive */
@media(max-width:768px){
  .profile-grid {
    grid-template-columns: 1fr;
  }
}
</style>
</head>

<body>




<!-- =========================
   Company Profile Page
========================= -->
<main class="company-profile-page">

  <!-- Page Header -->
  <section class="profile-header">
    <div class="header-text">
      <h2>👤 الملف الشخصي للشركة</h2>
      <p>هنا يمكنك تعديل بيانات شركتك ومعلومات التواصل.</p>
    </div>

    <div class="header-actions">
      <button class="btn-primary" id="saveProfileBtn">💾 حفظ التعديلات</button>
    </div>
  </section>

  <!-- Profile Grid -->
  <section class="profile-grid">

    <!-- Left: Company Card -->
    <div class="profile-card">
      <div class="company-card-top">
        <img src="{{ asset('internship/img/israa.jpeg') }}" alt="Company" class="company-big-avatar" />

        <div class="company-card-info">
          <h3 id="studentName">اسراء جمال محمد كسكين</h3>
<p id="studentEmail">ikasken@company.com</p>
<p id="studentPhone">0000 000 59 970+</p>

<button id="editBtn">تعديل البيانات</button>
<button id="saveBtn" style="display:none;">حفظ التعديلات</button>
          <span class="company-badge">شركة معتمدة</span>
        </div>
      </div>

      <div class="company-card-details">
        <div class="detail-row">
          <span class="label">📍 العنوان:</span>
          <span class="value" id="companyAddressView">غزة - الرمال</span>
        </div>

        <div class="detail-row">
          <span class="label">📞 الهاتف:</span>
          <span class="value" id="companyPhoneView">0590000000</span>
        </div>

        <div class="detail-row">
          <span class="label">🌐 الموقع:</span>
          <span class="value" id="companyWebsiteView">www.company.ps</span>
        </div>

        <div class="detail-row">
          <span class="label">🏢 مجال العمل:</span>
          <span class="value" id="companyFieldView">تكنولوجيا المعلومات</span>
        </div>
      </div>

    </div>

    <!-- Right: Edit Form -->
    <div class="profile-form-card">

      <h3 class="form-title">✏️ تعديل بيانات الشركة</h3>

      <form id="companyProfileForm" class="profile-form">

        <div class="form-row">
          <label>اسم الشركة</label>
          <input type="text" id="companyName" value="شركة أحمد" required />
        </div>

        <div class="form-row">
          <label>البريد الإلكتروني</label>
          <input type="email" id="companyEmail" value="company@gmail.com" required />
        </div>

        <div class="form-row">
          <label>رقم الهاتف</label>
          <input type="text" id="companyPhone" value="0590000000" required />
        </div>

        <div class="form-row">
          <label>العنوان</label>
          <input type="text" id="companyAddress" value="غزة - الرمال" required />
        </div>

        <div class="form-row">
          <label>الموقع الإلكتروني</label>
          <input type="text" id="companyWebsite" value="www.company.ps" />
        </div>

        <div class="form-row">
          <label>مجال العمل</label>
          <select id="companyField">
            <option selected>تكنولوجيا المعلومات</option>
            <option>تصميم جرافيك</option>
            <option>تسويق رقمي</option>
            <option>تطوير تطبيقات</option>
            <option>شبكات وأمن سيبراني</option>
          </select>
        </div>

        <div class="form-row">
          <label>نبذة عن الشركة</label>
          <textarea id="companyAbout" rows="5"
            placeholder="اكتبي نبذة مختصرة عن شركتك...">شركة متخصصة في تطوير البرمجيات وتقديم فرص تدريب للطلاب.</textarea>
        </div>

        <div class="form-row">
          <label>تغيير صورة الشركة</label>
          <input type="file" id="companyAvatar" accept="image/*" />
          <small class="hint">الصورة تظهر في الشريط العلوي وفي الملف الشخصي.</small>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn-primary">💾 حفظ</button>
          <button type="button" class="btn-outline" id="resetBtn">↩️ رجوع</button>
        </div>

      </form>

    </div>

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

  const form = document.getElementById("companyProfileForm");

  const companyName = document.getElementById("companyName");
  const companyEmail = document.getElementById("companyEmail");
  const companyPhone = document.getElementById("companyPhone");
  const companyAddress = document.getElementById("companyAddress");
  const companyWebsite = document.getElementById("companyWebsite");
  const companyField = document.getElementById("companyField");

  const companyNameView = document.getElementById("companyNameView");
  const companyEmailView = document.getElementById("companyEmailView");
  const companyPhoneView = document.getElementById("companyPhoneView");
  const companyAddressView = document.getElementById("companyAddressView");
  const companyWebsiteView = document.getElementById("companyWebsiteView");
  const companyFieldView = document.getElementById("companyFieldView");

  const resetBtn = document.getElementById("resetBtn");
  const saveProfileBtn = document.getElementById("saveProfileBtn");

  // Save form
  function applyChanges() {
    companyNameView.textContent = companyName.value;
    companyEmailView.textContent = companyEmail.value;
    companyPhoneView.textContent = companyPhone.value;
    companyAddressView.textContent = companyAddress.value;
    companyWebsiteView.textContent = companyWebsite.value || "—";
    companyFieldView.textContent = companyField.value;

    alert("✅ تم حفظ التعديلات (تجريبيًا). لاحقًا Laravel سيحفظها بقاعدة البيانات.");
  }

  if (form) {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      applyChanges();
    });
  }

  // Save from header button
  if (saveProfileBtn) {
    saveProfileBtn.addEventListener("click", () => {
      applyChanges();
    });
  }

  // Reset
  if (resetBtn) {
    resetBtn.addEventListener("click", () => {
      window.location.reload();
    });
  }

});



</script>


</body>
</html>
@endsection
