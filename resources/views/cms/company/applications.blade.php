@extends('cms.company.temp')
@section('title','applications')
@section('main-title','ادارة الطلبات')
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

/* container */
.container{
  width:92%;
  margin:25px auto;
}

/* title */
.page-title{
  margin-bottom:20px;
}

.page-title h2{
  margin:0;
  color:#1c2b4a;
}

/* card */
.app-card{

  background:#fff;

  padding:16px;

  border-radius:14px;

  margin-bottom:14px;

  border:1px solid #e3e8ef;

  display:flex;

  align-items:center;

  justify-content:space-between;

}

/* student info */
.student-info{

  display:flex;

  align-items:center;

  gap:12px;

}

.student-info img{

  width:55px;

  height:55px;

  border-radius:50%;

}

.student-name{

  font-weight:bold;

  color:#1c2b4a;

}

/* buttons */
.actions{

  display:flex;

  gap:8px;

}

.btn{

  border:none;

  padding:8px 14px;

  border-radius:8px;

  cursor:pointer;

  font-weight:bold;

}

.btn-accept{

  background:#16a34a;

  color:#fff;

}

.btn-reject{

  background:#dc2626;

  color:#fff;

}

.status{

  font-weight:bold;

  margin-top:4px;

}

.accepted{
  color:#16a34a;
}

.rejected{
  color:#dc2626;
}

.pending{
  color:#f59e0b;
}

</style>
</head>

<body>





<div class="container">

<div class="page-title">
<h2>طلبات التدريب</h2>
<p>عرض الطلبات المقدمة من الطلاب</p>
</div>

<!-- طلب -->
<div class="app-card">

<div class="student-info">

<img src="{{ asset('internship/img/israa.jpeg') }}">

<div>

<div class="student-name">
اسراء جمال كسكين
</div>

<div>
تدريب Back-End Laravel
</div>

<div class="status pending">
قيد المراجعة
</div>

</div>

</div>

<div class="actions">
<button class="btn btn-accept"
onclick="reject(this)">
عرض
</button>
<button class="btn btn-accept"
onclick="accept(this)">
قبول
</button>

<button class="btn btn-reject"
onclick="reject(this)">
رفض
</button>

</div>

</div>


<!-- طلب ثاني -->
<div class="app-card">

<div class="student-info">

<img src="{{ asset('internship/img/israa.jpeg') }}">

<div>

<div class="student-name">
محمد أحمد
</div>

<div>
Front-End Developer
</div>

<div class="status pending">
قيد المراجعة
</div>

</div>

</div>

<div class="actions">
<button class="btn btn-accept"
onclick="reject(this)">
عرض
</button>
<button class="btn btn-accept"
onclick="accept(this)">
قبول
</button>

<button class="btn btn-reject"
onclick="reject(this)">
رفض
</button>



</div>

</div>

</div>








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

function accept(btn){

const card = btn.closest(".app-card");

const status = card.querySelector(".status");

status.innerText = "تم القبول";

status.className = "status accepted";

}

function reject(btn){

const card = btn.closest(".app-card");

const status = card.querySelector(".status");

status.innerText = "تم الرفض";

status.className = "status rejected";

}

</script>


</body>
</html>

@endsection

