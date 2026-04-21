
@extends('cms.admin.temp')
@section('title' ,'internships')
@section('main-title','ادارة التدريب')

@section('main-title','ادارة التدريب')
@section('css')
@endsection
@section('content')

  <main class="page" data-page="internships">

    <div class="page-head">
      <div class="page-title">

        <p>متابعة تسجيلات التدريب، حالة الطالب، الشركة، المشرف، وتواريخ البداية والنهاية.</p>
      </div>

      <div class="page-actions">
        <a href="{{ route('student.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> إضافة تدريب</a>
      </div>
    </div>

    <!-- Stats -->
     <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>اجمالي التدريبات</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">عدد سجلات التدريب<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning ">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>قيد التدريب</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">طلاب بدأوا التدريب<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success ">
              <div class="inner">
                <h3>44</h3>

                <p>مكتمل</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">طلاب انهوا التدريب<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>متوقف</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">تدريب موقوف/معلق<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

</section>

    <!-- Tools + Table -->
    <section class="card">
      <div class="card-head">
        <h2>سجلات التدريب</h2>
        <div class="hint">بحث/فلترة ثم إدارة السجل من الإجراءات</div>
      </div>

      <div class="tools-row">
        <div class="tool">
          <label for="searchInput">بحث</label>
          <input id="searchInput" type="text" placeholder="ابحث باسم الطالب أو الشركة أو المشرف..." />
        </div>

        <div class="tool">
          <label for="statusFilter">الحالة</label>
          <select id="statusFilter">
            <option value="all">الكل</option>
            <option value="قيد التدريب">قيد التدريب</option>
            <option value="مكتمل">مكتمل</option>
            <option value="متوقف">متوقف</option>
          </select>
        </div>

        <div class="tool">
          <label for="deptFilter">القسم</label>
          <select id="deptFilter">
            <option value="all">الكل</option>
            <option value="الأمن السيبراني">الأمن السيبراني</option>
            <option value="هندسة البرمجيات">هندسة البرمجيات</option>
            <option value="نظم معلومات">نظم معلومات</option>
            <option value="شبكات">شبكات</option>
          </select>
        </div>

        <div class="tool tool-inline">
          <button class="btn btn-light" data-action="reset">إعادة تعيين</button>
          <div class="count-pill">
            المعروض: <span data-count="shown">0</span> / <span data-count="all">0</span>
          </div>
        </div>
      </div>

      <div class="table-wrap">
        <table class="table" id="internshipsTable">
          <thead>
            <tr>
              <th>#</th>
              <th>الطالب</th>
              <th>القسم</th>
              <th>الشركة</th>
              <th>المشرف</th>
              <th>البداية</th>
              <th>النهاية</th>
              <th>الحالة</th>
              <th>إجراءات</th>
            </tr>
          </thead>

          <tbody>
            <!-- أمثلة -->
            <tr data-student="لانا زاهر كسكين"
                data-dept="الأمن السيبراني"
                data-company="SecureLab"
                data-supervisor="د. أحمد"
                data-start="2026-02-01"
                data-end="2026-04-01"
                data-status="قيد التدريب"
                data-notes="متابعة أسبوعية + تسليم تقرير منتصف المدة.">
              <td>1</td>
              <td class="fw">لانا زاهر كسكين</td>
              <td>الأمن السيبراني</td>
              <td>SecureLab</td>
              <td>د. أحمد</td>
              <td>2026-02-01</td>
              <td>2026-04-01</td>
              <td><span class="chip chip-success">قيد التدريب</span></td>
              <td class="actions">
                <button class="icon-btn" data-action="view">👁</button>
                <button class="icon-btn" data-action="edit">✏️</button>
                <button class="icon-btn" data-action="toggle">⛔</button>
              </td>
            </tr>

            <tr data-student="محمد علي"
                data-dept="هندسة البرمجيات"
                data-company="TechNova"
                data-supervisor="د. سارة"
                data-start="2025-11-01"
                data-end="2026-01-01"
                data-status="مكتمل"
                data-notes="تقييم نهائي ممتاز + شهادة تدريب.">
              <td>2</td>
              <td class="fw">محمد علي</td>
              <td>هندسة البرمجيات</td>
              <td>TechNova</td>
              <td>د. سارة</td>
              <td>2025-11-01</td>
              <td>2026-01-01</td>
              <td><span class="chip chip-info">مكتمل</span></td>
              <td class="actions">
                <button class="icon-btn" data-action="view">👁</button>
                <button class="icon-btn" data-action="edit">✏️</button>
                <button class="icon-btn" data-action="toggle">✅</button>
              </td>
            </tr>

            <tr data-student="هبة سمير"
                data-dept="نظم معلومات"
                data-company="BlueByte"
                data-supervisor="د. ليلى"
                data-start="2026-01-10"
                data-end="2026-03-10"
                data-status="متوقف"
                data-notes="متوقف مؤقتاً بسبب ظروف/غياب.">
              <td>3</td>
              <td class="fw">هبة سمير</td>
              <td>نظم معلومات</td>
              <td>BlueByte</td>
              <td>د. ليلى</td>
              <td>2026-01-10</td>
              <td>2026-03-10</td>
              <td><span class="chip chip-warning">متوقف</span></td>
              <td class="actions">
                <button class="icon-btn" data-action="view">👁</button>
                <button class="icon-btn" data-action="edit">✏️</button>
                <button class="icon-btn" data-action="toggle">⛔</button>
              </td>
            </tr>

          </tbody>
        </table>
      </div>

      <div class="pagination">
        <button class="btn btn-light" data-action="prev" disabled>السابق</button>
        <div class="pages" data-pages>
          <button class="page-btn active" data-pagebtn="1">1</button>
          <button class="page-btn" data-pagebtn="2">2</button>
          <button class="page-btn" data-pagebtn="3">3</button>
        </div>
        <button class="btn btn-light" data-action="next">التالي</button>
      </div>
    </section>
  </main>




  <!-- View Modal -->
  <div class="modal" id="viewModal">
    <div class="modal-backdrop" data-close="modal"></div>
    <div class="modal-card">
      <div class="modal-head">
        <h3>تفاصيل التدريب</h3>
        <button class="icon-btn" data-close="modal">✖</button>
      </div>

      <div class="modal-body">
        <div class="kv">
          <div class="kv-item"><span>الطالب</span><strong data-view="student">-</strong></div>
          <div class="kv-item"><span>القسم</span><strong data-view="dept">-</strong></div>
          <div class="kv-item"><span>الشركة</span><strong data-view="company">-</strong></div>
          <div class="kv-item"><span>المشرف</span><strong data-view="supervisor">-</strong></div>
          <div class="kv-item"><span>البداية</span><strong data-view="start">-</strong></div>
          <div class="kv-item"><span>النهاية</span><strong data-view="end">-</strong></div>
          <div class="kv-item"><span>الحالة</span><strong data-view="status">-</strong></div>
          <div class="kv-item"><span>ملاحظات</span><strong data-view="notes">-</strong></div>
        </div>
      </div>

      <div class="modal-foot">
        <button class="btn btn-light" data-close="modal">إغلاق</button>
      </div>
    </div>
  </div>

  <!-- Add/Edit Modal -->
  <div class="modal" id="formModal">
    <div class="modal-backdrop" data-close="modal"></div>
    <div class="modal-card">
      <div class="modal-head">
        <h3 data-form-title>إضافة تدريب</h3>
        <button class="icon-btn" data-close="modal">✖</button>
      </div>

      <div class="modal-body">
        <div class="form-grid">
          <div class="form-group">
            <label>اسم الطالب</label>
            <input type="text" id="iStudent" required>
          </div>

          <div class="form-group">
            <label>القسم</label>
            <select id="iDept">
              <option>الأمن السيبراني</option>
              <option>هندسة البرمجيات</option>
              <option>نظم معلومات</option>
              <option>شبكات</option>
            </select>
          </div>

          <div class="form-group">
            <label>الشركة</label>
            <input type="text" id="iCompany" placeholder="مثال: SecureLab">
          </div>

          <div class="form-group">
            <label>المشرف</label>
            <input type="text" id="iSupervisor" placeholder="مثال: د. أحمد">
          </div>

          <div class="form-group">
            <label>تاريخ البداية</label>
            <input type="date" id="iStart">
          </div>

          <div class="form-group">
            <label>تاريخ النهاية</label>
            <input type="date" id="iEnd">
          </div>

          <div class="form-group">
            <label>الحالة</label>
            <select id="iStatus">
              <option>قيد التدريب</option>
              <option>مكتمل</option>
              <option>متوقف</option>
            </select>
          </div>

          <div class="form-group" style="grid-column: 1/-1;">
            <label>ملاحظات</label>
            <input type="text" id="iNotes" placeholder="ملاحظات مختصرة...">
          </div>
        </div>
      </div>

      <div class="modal-foot">
        <button class="btn btn-light" data-close="modal">إلغاء</button>
        <button class="btn btn-primary" data-action="save-internship">حفظ</button>
      </div>
    </div>
  </div>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const page = document.querySelector('main[data-page="internships"]');
  if (!page) return;

  const table = document.getElementById("internshipsTable");
  if (!table) return;

  // Helpers
  const $ = (sel, root = document) => root.querySelector(sel);
  const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));
  const norm = (s) => (s ?? "").toString().trim().toLowerCase();

  function openModal(modal) { modal?.classList.add("open"); }
  function closeModal(modal) { modal?.classList.remove("open"); }

  // Close modals
  $$('[data-close="modal"]').forEach(el => {
    el.addEventListener("click", () => closeModal(el.closest(".modal")));
  });

  const tbody = table.querySelector("tbody");

  // Tools
  const searchInput = $("#searchInput");
  const statusFilter = $("#statusFilter");
  const deptFilter = $("#deptFilter");

  // Counts
  const allCountEl = $('[data-count="all"]');
  const shownCountEl = $('[data-count="shown"]');

  // Stats
  const statTotal = $('[data-stat="total"]');
  const statActive = $('[data-stat="active"]');
  const statDone = $('[data-stat="done"]');
  const statStopped = $('[data-stat="stopped"]');

  // Modals
  const viewModal = $("#viewModal");
  const formModal = $("#formModal");
  const formTitle = $('[data-form-title]');

  // Form inputs
  const iStudent = $("#iStudent");
  const iDept = $("#iDept");
  const iCompany = $("#iCompany");
  const iSupervisor = $("#iSupervisor");
  const iStart = $("#iStart");
  const iEnd = $("#iEnd");
  const iStatus = $("#iStatus");
  const iNotes = $("#iNotes");

  let editingRow = null;

  function rows() {
    return $$("#internshipsTable tbody tr");
  }

  function statusChipClass(status) {
    if (status === "قيد التدريب") return "chip-success";
    if (status === "مكتمل") return "chip-info";
    return "chip-warning"; // متوقف
  }

  function updateStats() {
    const r = rows();
    const total = r.length;

    let active = 0, done = 0, stopped = 0;
    r.forEach(tr => {
      if (tr.dataset.status === "قيد التدريب") active++;
      else if (tr.dataset.status === "مكتمل") done++;
      else if (tr.dataset.status === "متوقف") stopped++;
    });

    statTotal.textContent = total;
    statActive.textContent = active;
    statDone.textContent = done;
    statStopped.textContent = stopped;

    allCountEl.textContent = total;
  }

  function matches(tr) {
    const q = norm(searchInput?.value);
    const status = statusFilter?.value || "all";
    const dept = deptFilter?.value || "all";

    const student = norm(tr.dataset.student);
    const company = norm(tr.dataset.company);
    const supervisor = norm(tr.dataset.supervisor);

    const okSearch = !q || student.includes(q) || company.includes(q) || supervisor.includes(q);
    const okStatus = status === "all" || tr.dataset.status === status;
    const okDept = dept === "all" || tr.dataset.dept === dept;

    return okSearch && okStatus && okDept;
  }

  // ===== Pagination =====
  let currentPage = 1;
  const rowsPerPage = 6;

  const prevBtn = $('[data-action="prev"]');
  const nextBtn = $('[data-action="next"]');
  const pageBtns = $$("[data-pagebtn]");

  function visibleRows() {
    return rows().filter(tr => tr.style.display !== "none");
  }

  function renderPage(pageNum) {
    const vis = visibleRows();
    const totalPages = Math.max(1, Math.ceil(vis.length / rowsPerPage));

    currentPage = Math.min(Math.max(1, pageNum), totalPages);

    vis.forEach(tr => (tr.hidden = true));
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    vis.slice(start, end).forEach(tr => (tr.hidden = false));

    pageBtns.forEach((b, i) => b.classList.toggle("active", i + 1 === currentPage));
    if (prevBtn) prevBtn.disabled = currentPage === 1;
    if (nextBtn) nextBtn.disabled = currentPage === totalPages;
  }

  function applyFilters() {
    let shown = 0;
    rows().forEach(tr => {
      const ok = matches(tr);
      tr.style.display = ok ? "" : "none";
      if (ok) shown++;
    });
    shownCountEl.textContent = shown;
    renderPage(1);
  }

  // Listeners
  searchInput?.addEventListener("input", applyFilters);
  statusFilter?.addEventListener("change", applyFilters);
  deptFilter?.addEventListener("change", applyFilters);

  // Reset
  $('[data-action="reset"]')?.addEventListener("click", () => {
    if (searchInput) searchInput.value = "";
    if (statusFilter) statusFilter.value = "all";
    if (deptFilter) deptFilter.value = "all";
    applyFilters();
  });

  // Open Add Modal
  $('[data-action="open-add-modal"]')?.addEventListener("click", () => {
    editingRow = null;
    formTitle.textContent = "إضافة تدريب";

    iStudent.value = "";
    iDept.value = "الأمن السيبراني";
    iCompany.value = "";
    iSupervisor.value = "";
    iStart.value = "";
    iEnd.value = "";
    iStatus.value = "قيد التدريب";
    iNotes.value = "";

    openModal(formModal);
  });

  // Table actions
  table.addEventListener("click", (e) => {
    const btn = e.target.closest("button");
    if (!btn) return;

    const tr = e.target.closest("tr");
    if (!tr) return;

    const action = btn.dataset.action;

    if (action === "view") {
      $('[data-view="student"]').textContent = tr.dataset.student || "-";
      $('[data-view="dept"]').textContent = tr.dataset.dept || "-";
      $('[data-view="company"]').textContent = tr.dataset.company || "-";
      $('[data-view="supervisor"]').textContent = tr.dataset.supervisor || "-";
      $('[data-view="start"]').textContent = tr.dataset.start || "-";
      $('[data-view="end"]').textContent = tr.dataset.end || "-";
      $('[data-view="status"]').textContent = tr.dataset.status || "-";
      $('[data-view="notes"]').textContent = tr.dataset.notes || "-";
      openModal(viewModal);
    }

    if (action === "edit") {
      editingRow = tr;
      formTitle.textContent = "تعديل تدريب";

      iStudent.value = tr.dataset.student || "";
      iDept.value = tr.dataset.dept || "الأمن السيبراني";
      iCompany.value = tr.dataset.company || "";
      iSupervisor.value = tr.dataset.supervisor || "";
      iStart.value = tr.dataset.start || "";
      iEnd.value = tr.dataset.end || "";
      iStatus.value = tr.dataset.status || "قيد التدريب";
      iNotes.value = tr.dataset.notes || "";

      openModal(formModal);
    }

    if (action === "toggle") {
      // cycle: قيد التدريب -> مكتمل -> متوقف -> قيد التدريب
      const cur = tr.dataset.status;
      const next = (cur === "قيد التدريب") ? "مكتمل" : (cur === "مكتمل") ? "متوقف" : "قيد التدريب";

      tr.dataset.status = next;
      const chip = tr.querySelector(".chip");
      if (chip) {
        chip.className = `chip ${statusChipClass(next)}`;
        chip.textContent = next;
      }

      updateStats();
      applyFilters();
    }
  });

  // Save add/edit
  $('[data-action="save-internship"]')?.addEventListener("click", () => {
    const student = iStudent.value.trim();
    const dept = iDept.value;
    const company = iCompany.value.trim() || "-";
    const supervisor = iSupervisor.value.trim() || "-";
    const start = iStart.value || "-";
    const end = iEnd.value || "-";
    const status = iStatus.value;
    const notes = iNotes.value.trim() || "-";

    if (!student) return alert("الرجاء إدخال اسم الطالب");

    const chipCls = statusChipClass(status);

    if (editingRow) {
      editingRow.dataset.student = student;
      editingRow.dataset.dept = dept;
      editingRow.dataset.company = company;
      editingRow.dataset.supervisor = supervisor;
      editingRow.dataset.start = start;
      editingRow.dataset.end = end;
      editingRow.dataset.status = status;
      editingRow.dataset.notes = notes;

      editingRow.children[1].textContent = student;
      editingRow.children[2].textContent = dept;
      editingRow.children[3].textContent = company;
      editingRow.children[4].textContent = supervisor;
      editingRow.children[5].textContent = start;
      editingRow.children[6].textContent = end;
      editingRow.children[7].innerHTML = `<span class="chip ${chipCls}">${status}</span>`;

      editingRow = null;
    } else {
      const idx = tbody.querySelectorAll("tr").length + 1;
      const tr = document.createElement("tr");

      tr.dataset.student = student;
      tr.dataset.dept = dept;
      tr.dataset.company = company;
      tr.dataset.supervisor = supervisor;
      tr.dataset.start = start;
      tr.dataset.end = end;
      tr.dataset.status = status;
      tr.dataset.notes = notes;

      tr.innerHTML = `
        <td>${idx}</td>
        <td class="fw">${student}</td>
        <td>${dept}</td>
        <td>${company}</td>
        <td>${supervisor}</td>
        <td>${start}</td>
        <td>${end}</td>
        <td><span class="chip ${chipCls}">${status}</span></td>
        <td class="actions">
          <button class="icon-btn" data-action="view">👁</button>
          <button class="icon-btn" data-action="edit">✏️</button>
          <button class="icon-btn" data-action="toggle">⛔</button>
        </td>
      `;
      tbody.appendChild(tr);
    }

    closeModal(formModal);
    updateStats();
    applyFilters();
  });

  // Pagination events
  pageBtns.forEach(btn => btn.addEventListener("click", () => renderPage(Number(btn.dataset.pagebtn))));
  prevBtn?.addEventListener("click", () => renderPage(currentPage - 1));
  nextBtn?.addEventListener("click", () => renderPage(currentPage + 1));

  // Init
  updateStats();
  applyFilters();
  renderPage(1);
});
</script>
@section('js')
@endsection
</body>
</html>
@endsection
