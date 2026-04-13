
@extends('cms.company.temp')
@section('title','opportunities')
@section('main-title','ادارة الفرص')
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
.company-opps-page {
  width: 92%;
  margin: 25px auto 0;
}

/* Header */
.opps-header {
  background: #fff;
  border-radius: 18px;
  padding: 18px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  border: 1px solid #eef3f6;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
}

.opps-header h2 {
  margin: 0;
  font-size: 20px;
  font-weight: 900;
  color: #222;
}

.opps-header p {
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
  text-decoration: none;
  display: inline-block;
}

.btn-primary:hover {
  opacity: 0.92;
}

/* Filters */
.opps-filters {
  margin-top: 16px;
  display: grid;
  grid-template-columns: 1.4fr 1fr 1fr;
  gap: 12px;
}

.filter-box {
  background: #fff;
  border-radius: 16px;
  padding: 14px;
  border: 1px solid #eef3f6;
  box-shadow: 0 10px 22px rgba(0, 0, 0, 0.04);
}

.filter-box label {
  display: block;
  margin-bottom: 8px;
  font-size: 13px;
  font-weight: 900;
  color: #333;
}

.filter-box input,
.filter-box select {
  width: 100%;
  padding: 11px 12px;
  border-radius: 14px;
  border: 1px solid #dfe7ef;
  outline: none;
  font-size: 13px;
  transition: 0.2s;
}

.filter-box input:focus,
.filter-box select:focus {
  border-color: #3e7cd7;
  box-shadow: 0 0 0 3px rgba(62, 124, 215, 0.15);
}

/* Grid */
.opps-grid {
  margin-top: 16px;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
  gap: 14px;
}

/* Card */
.opp-card {
  background: #fff;
  border-radius: 18px;
  overflow: hidden;
  border: 1px solid #eef3f6;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
  transition: 0.2s;
}

.opp-card:hover {
  transform: translateY(-2px);
}

.opp-img {
  width: 100%;
  height: 160px;
  object-fit: cover;
  display: block;
}

.opp-content {
  padding: 14px;
}

.opp-title {
  margin: 0;
  font-size: 15px;
  font-weight: 900;
  color: #222;
}

.opp-desc {
  margin: 10px 0 0;
  font-size: 13px;
  color: #666;
  line-height: 1.8;
}

/* Meta */
.opp-meta {
  margin-top: 12px;
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  font-size: 12px;
  font-weight: 800;
}

.opp-meta span {
  padding: 6px 10px;
  border-radius: 999px;
  background: #f7f9fb;
  border: 1px solid #eef3f6;
  color: #333;
}

.status {
  font-weight: 900;
}

.status.open {
  background: #e7f8ee;
  border: 1px solid #c8f0d7;
  color: #0a7a36;
}

.status.closed {
  background: #ffe9e9;
  border: 1px solid #ffd0d0;
  color: #b00000;
}

/* Actions */
.opp-actions {
  margin-top: 14px;
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.btn-outline {
  padding: 9px 12px;
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
  background: #f2f7ff;
  border-color: #3e7cd7;
}

.btn-danger {
  padding: 9px 12px;
  border-radius: 12px;
  border: 1px solid #ffd0d0;
  background: #fff;
  color: #b00000;
  font-size: 13px;
  font-weight: 900;
  cursor: pointer;
  transition: 0.2s;
}

.btn-danger:hover {
  background: #ffe9e9;
}

/* Responsive */
@media (max-width: 900px) {
  .opps-header {
    flex-direction: column;
    align-items: flex-start;
  }

  .opps-filters {
    grid-template-columns: 1fr;
  }
}

</style>
</head>

<body>


<!-- =========================
   Company Opportunities Page
========================= -->
<main class="company-opps-page">

  <!-- Page Header -->
  <section class="opps-header">
    <div class="header-text">
      <h2>📌 فرص التدريب الخاصة بشركتي</h2>
      <p>إدارة فرص التدريب: إضافة، تعديل، حذف، ومعرفة حالة كل فرصة.</p>
    </div>

    <div class="header-actions">
      <a href="{{ route('cms.Company.opportunity-create') }}" class="btn-primary">➕ إضافة فرصة جديدة</a>
    </div>
  </section>

  <!-- Filters -->
  <section class="opps-filters">
    <div class="filter-box">
      <label>🔍 بحث</label>
      <input type="text" id="searchInput" placeholder="ابحث باسم الفرصة أو المجال..." />
    </div>

    <div class="filter-box">
      <label>📂 الحالة</label>
      <select id="statusFilter">
        <option value="all">الكل</option>
        <option value="open">مفتوحة</option>
        <option value="closed">مغلقة</option>
      </select>
    </div>

    <div class="filter-box">
      <label>📅 الترتيب</label>
      <select id="sortFilter">
        <option value="new">الأحدث</option>
        <option value="old">الأقدم</option>
      </select>
    </div>
  </section>

  <!-- Opportunities List -->
  <section class="opps-grid" id="oppsGrid">

    <!-- Card 1 -->
    <div class="opp-card" data-status="open" data-date="2026-02-10">
      <img src="{{ asset('internship/img//web.png') }}" alt="Opportunity" class="opp-img" />

      <div class="opp-content">
        <h3 class="opp-title">تدريب Front-End (HTML/CSS/JS)</h3>
        <p class="opp-desc">
          فرصة تدريب للطلاب المهتمين بتطوير واجهات المواقع باستخدام HTML و CSS و JavaScript.
        </p>

        <div class="opp-meta">
          <span>🏢 IT</span>
          <span>⏳ 120 ساعة</span>
          <span class="status open">مفتوحة</span>
        </div>

        <div class="opp-actions">
          <a href="opportunity-details.html?id=1" class="btn-outline">👁 عرض</a>
          <a href="opportunity-edit.html?id=1" class="btn-outline">✏ تعديل</a>
          <button class="btn-danger deleteBtn">🗑 حذف</button>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="opp-card" data-status="open" data-date="2026-02-07">
      <img src="{{ asset('internship/img/Illiustrations.co_Day_94_ui_ux.png') }}" alt="Opportunity" class="opp-img" />

      <div class="opp-content">
        <h3 class="opp-title">تدريب UI/UX Design</h3>
        <p class="opp-desc">
          تدريب عملي على تصميم واجهات التطبيقات والمواقع باستخدام Figma و مبادئ UX.
        </p>

        <div class="opp-meta">
          <span>🎨 تصميم</span>
          <span>⏳ 90 ساعة</span>
          <span class="status open">مفتوحة</span>
        </div>

        <div class="opp-actions">
          <a href="opportunity-details.html?id=2" class="btn-outline">👁 عرض</a>
          <a href="opportunity-edit.html?id=2" class="btn-outline">✏ تعديل</a>
          <button class="btn-danger deleteBtn">🗑 حذف</button>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="opp-card" data-status="closed" data-date="2026-01-28">
      <img src="{{ asset('internship/img/webDev.jpeg') }}" alt="Opportunity" class="opp-img" />

      <div class="opp-content">
        <h3 class="opp-title">تدريب Laravel Backend</h3>
        <p class="opp-desc">
          تدريب على بناء APIs وربط قواعد البيانات وتطوير لوحة تحكم باستخدام Laravel.
        </p>

        <div class="opp-meta">
          <span>⚙ Backend</span>
          <span>⏳ 150 ساعة</span>
          <span class="status closed">مغلقة</span>
        </div>

        <div class="opp-actions">
          <a href="opportunity-details.html?id=3" class="btn-outline">👁 عرض</a>
          <a href="opportunity-edit.html?id=3" class="btn-outline">✏ تعديل</a>
          <button class="btn-danger deleteBtn">🗑 حذف</button>
        </div>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="opp-card" data-status="open" data-date="2026-02-01">
      <img src="{{ asset('internship/img/cyber.jpg') }}" alt="Opportunity" class="opp-img" />

      <div class="opp-content">
        <h3 class="opp-title">تدريب Cyber Security</h3>
        <p class="opp-desc">
          تدريب في مجال الأمن السيبراني: أساسيات الاختراق الأخلاقي وحماية الشبكات.
        </p>

        <div class="opp-meta">
          <span>🛡 أمن سيبراني</span>
          <span>⏳ 100 ساعة</span>
          <span class="status open">مفتوحة</span>
        </div>

        <div class="opp-actions">
          <a href="opportunity-details.html?id=4" class="btn-outline">👁 عرض</a>
          <a href="opportunity-edit.html?id=4" class="btn-outline">✏ تعديل</a>
          <button class="btn-danger deleteBtn">🗑 حذف</button>
        </div>
      </div>
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

  const searchInput = document.getElementById("searchInput");
  const statusFilter = document.getElementById("statusFilter");
  const sortFilter = document.getElementById("sortFilter");

  const oppsGrid = document.getElementById("oppsGrid");

  function filterAndSort() {
    const cards = Array.from(document.querySelectorAll(".opp-card"));

    const searchValue = searchInput.value.trim().toLowerCase();
    const statusValue = statusFilter.value;
    const sortValue = sortFilter.value;

    // Filter
    cards.forEach(card => {
      const title = card.querySelector(".opp-title").textContent.toLowerCase();
      const desc = card.querySelector(".opp-desc").textContent.toLowerCase();
      const cardStatus = card.getAttribute("data-status");

      const matchesSearch = title.includes(searchValue) || desc.includes(searchValue);
      const matchesStatus = (statusValue === "all") || (cardStatus === statusValue);

      if (matchesSearch && matchesStatus) {
        card.style.display = "block";
      } else {
        card.style.display = "none";
      }
    });

    // Sort
    const visibleCards = cards.filter(c => c.style.display !== "none");

    visibleCards.sort((a, b) => {
      const dateA = new Date(a.getAttribute("data-date"));
      const dateB = new Date(b.getAttribute("data-date"));

      if (sortValue === "new") return dateB - dateA;
      return dateA - dateB;
    });

    // Re-append sorted cards
    visibleCards.forEach(card => oppsGrid.appendChild(card));
  }

  // Delete
  document.querySelectorAll(".deleteBtn").forEach(btn => {
    btn.addEventListener("click", (e) => {
      const card = e.target.closest(".opp-card");

      const title = card.querySelector(".opp-title").textContent;

      const confirmDelete = confirm(`هل أنت متأكد من حذف الفرصة التالية؟\n\n${title}`);

      if (confirmDelete) {
        card.remove();
        alert("✅ تم حذف الفرصة (تجريبيًا). لاحقًا Laravel سيحذفها من قاعدة البيانات.");
      }
    });
  });

  // Events
  if (searchInput) searchInput.addEventListener("input", filterAndSort);
  if (statusFilter) statusFilter.addEventListener("change", filterAndSort);
  if (sortFilter) sortFilter.addEventListener("change", filterAndSort);

});

</script>


</body>
</html>
@endsection
