@extends('front.layout.student')

@section('title','profile')

@section('content')
@section('css')
@endsection

<div style="max-width:700px">

  {-- بطاقة الملف الشخصي --}
  <div class="card">
    <div class="card-header">
      <span class="card-title"><i class="fa fa-user" style="color:var(--primary)"></i> الملف الشخصي</span>
      <span class="badge {{ $students->general_status=='active'?'badge-success':'badge-warning' }}">
        {{ ['active'=>'نشط','inactive'=>'غير نشط','graduated'=>'خريج','suspended'=>'موقوف'][$student->general_status] ?? $student->general_status }}
      </span>
    </div>


    <div class="avatar-section">
      @if($students->image)
        <img src="{{ asset('storage/'.$students->image->path) }}" alt="avatar" class="avatar-circle">
      @else
        <div class="avatar-circle-placeholder">{{ mb_substr($students->full_name,0,1) }}</div>
      @endif
      <div>
        <div style="font-size:18px;font-weight:700">{{ $students->name }}</div>
        <div style="color:var(--muted);font-size:13px;margin-top:2px">{{ $user->email }}</div>
        <div style="font-size:12px;color:var(--muted);margin-top:4px"><i class="fa fa-id-card" style="color:var(--primary)"></i> {{ $students->university_id }}</div>
        <div style="font-size:12px;color:var(--muted);margin-top:2px"><i class="fa fa-university" style="color:var(--primary)"></i> {{ $students->college->name ?? '—' }}</div>
      </div>
    </div>

    <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data">@csrf
      {-- رفع الصورة --}
      <div class="form-group">
        <label class="form-label"><i class="fa fa-camera"></i> تغيير الصورة الشخصية</label>
        <div style="display:flex;align-items:center;gap:10px">
          <label for="avatar" class="avatar-upload-btn"><i class="fa fa-upload"></i> اختر صورة</label>
          <input type="file" name="image" id="image" accept="image/*" style="display:none" onchange="previewAvatar(this,'previewImg')">
          <span id="avatarName" style="font-size:12px;color:var(--muted)">لم يتم اختيار ملف</span>
        </div>
        @error('image')<div style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</div>@enderror
      </div>

      <div class="divider-title"><i class="fa fa-info-circle"></i> البيانات الشخصية</div>

      <div class="form-row">
        <div class="form-group">
          <label class="form-label">الاسم الكامل <span class="req" style="color:red">*</span></label>
          <div class="input-wrap"><i class="fa fa-user"></i>
            <input type="text" name="full_name" class="form-control" value="{{ $students->name) }}" required>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">رقم الهاتف</label>
          <div class="input-wrap"><i class="fa fa-phone"></i>
            <input type="text" name="phone" class="form-control" value="{{ $students->phone) }}">
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label class="form-label">المدينة</label>
          <div class="input-wrap"><i class="fa fa-map-marker-alt"></i>
            <select name="city_id" class="form-control form-select">
              <option value="">اختر</option>
              @foreach($cities as $cities)
              <option value="{{ $cities->id }}" {{ $students->city_id==$city->id?'selected':'' }}>{{ $city->city_name }}</option>
              @endforeach

            </select>
            <select name="college_id" class="form-control form-select">
              <option value="">اختر</option>
              @foreach($college as $college)
              <option value="{{ $college->id }}" {{ $students->college_id==$college->id?'selected':'' }}>{{ $college->college_name }}</option>
              @endforeach

            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">المستوى الدراسي</label>
          <div class="input-wrap"><i class="fa fa-layer-group"></i>
            <select name="level" class="form-control form-select">
              <option value="">اختر</option>
              @foreach(['أولى','ثانية','ثالثة','رابعة','خامسة'] as $l)
              <option value="{{ $l }}" {{ $students->level==$l?'selected':'' }}>{{ $l }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label class="form-label">الجنس</label>
          <div class="input-wrap"><i class="fa fa-venus-mars"></i>
            <select name="gender" class="form-control form-select">
              <option value="">اختر</option>
              <option value="male"   {{ $students->gender=='male'?'selected':'' }}>ذكر</option>
              <option value="female" {{ $students->gender=='female'?'selected':'' }}>أنثى</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">تاريخ الميلاد</label>
          <div class="input-wrap"><i class="fa fa-calendar"></i>
            <input type="date" name="birth_date" class="form-control" value="{{ $students->birthdate)->format('Y-m-d') }}">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">العنوان</label>
        <div class="input-wrap"><i class="fa fa-location-dot"></i>
          <input type="text" name="address" class="form-control" value="{{ students->address) }}">
        </div>
      </div>

      <div class="divider-title"><i class="fa fa-lock"></i> تغيير كلمة المرور</div>

      <div class="form-row">
        <div class="form-group">
          <label class="form-label">كلمة المرور الجديدة</label>
          <div class="input-wrap"><i class="fa fa-lock"></i>
            <input type="password" name="password" class="form-control" placeholder="اتركها فارغة للإبقاء">
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">تأكيد كلمة المرور</label>
          <div class="input-wrap"><i class="fa fa-lock"></i>
            <input type="password" name="password_confirmation" class="form-control">
          </div>
        </div>
      </div>

      <div style="display:flex;gap:10px;margin-top:8px">
        <button type="button" onclick="performUpdate({{ $students->id }})" class="btn btn-primary">Update</button>

                </div>

    </form>
  </div>
</div>
<script>
function previewAvatar(input,id){
  if(input.files&&input.files[0]){
    document.getElementById('image').textContent=input.files[0].name;
  }
}
 function performUpdate(id){
        let formData=new FormData();
        formData.append('image',document.getElementById('image').value);
        formData.append('name',document.getElementById('name').value);
        formData.append('phone',document.getElementById('phone').value);
        formData.append('city_id',document.getElementById('city_id').value);
        formData.append('college_id',document.getElementById('college_id').value);
        formData.append('level',document.getElementById('level').value);
        formData.append('grnder',document.getElementById('gender').value);
        formData.append('birth_date',document.getElementById('birth_date').value);
        formData.append('address',document.getElementById('address').value);
        storeRoute('/front/student_update/'+id,formData);
    }

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

