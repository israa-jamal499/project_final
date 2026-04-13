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





// Admin dashbored

document.addEventListener("DOMContentLoaded", () => {

    // Counters
    const counters = document.querySelectorAll("[data-count]");
    counters.forEach(el => {
        const target = Number(el.getAttribute("data-count")) || 0;
        let current = 0;
        const step = Math.max(1, Math.ceil(target / 45));

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            el.textContent = current;
        }, 20);
    });

    // Buttons
    const refreshBtn = document.getElementById("refreshBtn");
    const exportBtn = document.getElementById("exportBtn");
    const clearLogBtn = document.getElementById("clearLogBtn");
    const logList = document.getElementById("logList");

    if (refreshBtn) refreshBtn.addEventListener("click", () => location.reload());

    if (exportBtn) exportBtn.addEventListener("click", () => {
        alert("تصدير تقرير (تجريبي) ✅ لاحقًا PDF/Excel مع Laravel");
    });

    if (clearLogBtn && logList) {
        clearLogBtn.addEventListener("click", () => {
            logList.innerHTML = `
        <li class="log-item">
          <span class="tag tag-blue">معلومة</span>
          <div><b>لا يوجد نشاطات حالياً</b><span class="subtext">تم مسح السجل</span></div>
        </li>
      `;
        });
    }

    // Simple bar chart (بدون مكتبات)
    function drawBars(canvasId, values) {
        const canvas = document.getElementById(canvasId);
        if (!canvas) return;

        const ctx = canvas.getContext("2d");

        // Dynamic width
        const parentWidth = canvas.parentElement.clientWidth;
        canvas.width = Math.max(320, parentWidth - 10);

        const w = canvas.width;
        const h = canvas.height;

        ctx.clearRect(0, 0, w, h);

        const max = Math.max(...values, 1);
        const padding = 18;
        const usableW = w - padding * 2;
        const usableH = h - 26;

        const barW = Math.floor(usableW / (values.length * 1.6));
        const gap = Math.floor(barW * 0.6);

        let x = padding;

        values.forEach(v => {
            const barH = Math.round((v / max) * usableH);
            ctx.fillRect(x, h - barH - 10, barW, barH);
            x += barW + gap;
        });
    }

    // status: قيد التدريب / مكتمل / لم يبدأ / متوقف
    drawBars("internStatusChart", [64, 28, 18, 9]);

    // Redraw on resize
    window.addEventListener("resize", () => {
        drawBars("internStatusChart", [64, 28, 18, 9]);
    });

});













document.addEventListener("DOMContentLoaded", () => {

    const table = document.getElementById("studentsTable");
    const rows = table ? table.querySelectorAll("tbody tr") : [];

    const searchInput = document.getElementById("searchInput");
    const departmentFilter = document.getElementById("departmentFilter");
    const statusFilter = document.getElementById("statusFilter");

    const studentsCount = document.getElementById("studentsCount");

    // Modal
    const addStudentBtn = document.getElementById("addStudentBtn");
    const modal = document.getElementById("studentModal");
    const closeModal = document.getElementById("closeModal");
    const cancelBtn = document.getElementById("cancelBtn");
    const saveStudentBtn = document.getElementById("saveStudentBtn");

    // Inputs
    const studentName = document.getElementById("studentName");
    const studentId = document.getElementById("studentId");
    const studentDept = document.getElementById("studentDept");
    const studentEmail = document.getElementById("studentEmail");
    const studentStatus = document.getElementById("studentStatus");
    const studentInternship = document.getElementById("studentInternship");

    // Export button (demo)
    const exportBtn = document.getElementById("exportBtn");

    function updateCount() {
        let visible = 0;
        rows.forEach(r => {
            if (r.style.display !== "none") visible++;
        });
        if (studentsCount) studentsCount.textContent = `عدد الطلاب: ${visible}`;
    }

    function filterRows() {
        const q = (searchInput?.value || "").trim().toLowerCase();
        const dept = departmentFilter?.value || "all";
        const status = statusFilter?.value || "all";

        rows.forEach(row => {
            const name = (row.dataset.name || "").toLowerCase();
            const id = (row.dataset.id || "").toLowerCase();
            const rowDept = row.dataset.dept || "";
            const rowStatus = row.dataset.status || "";

            const matchSearch = !q || name.includes(q) || id.includes(q);
            const matchDept = dept === "all" || rowDept === dept;
            const matchStatus = status === "all" || rowStatus === status;

            row.style.display = (matchSearch && matchDept && matchStatus) ? "" : "none";
        });

        updateCount();
    }

    // Listeners
    if (searchInput) searchInput.addEventListener("input", filterRows);
    if (departmentFilter) departmentFilter.addEventListener("change", filterRows);
    if (statusFilter) statusFilter.addEventListener("change", filterRows);

    // Delete buttons
    document.querySelectorAll(".delete").forEach(btn => {
        btn.addEventListener("click", () => {
            const row = btn.closest("tr");
            if (!row) return;

            const ok = confirm("هل تريد حذف هذا الطالب؟");
            if (ok) row.remove();

            updateCount();
        });
    });

    // Export demo
    if (exportBtn) {
        exportBtn.addEventListener("click", () => {
            alert("ميزة التصدير سيتم ربطها لاحقًا في Laravel ✅");
        });
    }

    // Modal functions
    function openModal() {
        if (!modal) return;
        modal.classList.add("active");
    }

    function closeModalFn() {
        if (!modal) return;
        modal.classList.remove("active");
    }

    if (addStudentBtn) addStudentBtn.addEventListener("click", openModal);
    if (closeModal) closeModal.addEventListener("click", closeModalFn);
    if (cancelBtn) cancelBtn.addEventListener("click", closeModalFn);

    if (modal) {
        modal.addEventListener("click", (e) => {
            if (e.target === modal) closeModalFn();
        });
    }

    // Save (demo)
    if (saveStudentBtn) {
        saveStudentBtn.addEventListener("click", () => {

            if (!studentName.value.trim() || !studentId.value.trim()) {
                alert("رجاءً أدخل اسم الطالب والرقم الجامعي");
                return;
            }

            alert("تم الحفظ بشكل تجريبي ✅ (سيتم ربطه بقاعدة البيانات في Laravel)");

            // reset
            studentName.value = "";
            studentId.value = "";
            studentEmail.value = "";

            closeModalFn();
        });
    }

    // Init
    filterRows();
});







document.addEventListener("DOMContentLoaded", () => {

    const table = document.getElementById("companiesTable");
    const rows = table ? table.querySelectorAll("tbody tr") : [];

    const searchInput = document.getElementById("companySearchInput");
    const fieldFilter = document.getElementById("fieldFilter");
    const statusFilter = document.getElementById("companyStatusFilter");

    const companiesCount = document.getElementById("companiesCount");

    // Modal
    const addCompanyBtn = document.getElementById("addCompanyBtn");
    const modal = document.getElementById("companyModal");
    const closeModal = document.getElementById("closeCompanyModal");
    const cancelBtn = document.getElementById("cancelCompanyBtn");
    const saveBtn = document.getElementById("saveCompanyBtn");

    // Inputs
    const companyName = document.getElementById("companyName");
    const companyField = document.getElementById("companyField");
    const companyEmail = document.getElementById("companyEmail");
    const companyPhone = document.getElementById("companyPhone");
    const companyAddress = document.getElementById("companyAddress");
    const companyStatus = document.getElementById("companyStatus");

    // Export demo
    const exportBtn = document.getElementById("exportCompaniesBtn");

    function updateCount() {
        let visible = 0;
        rows.forEach(r => {
            if (r.style.display !== "none") visible++;
        });
        if (companiesCount) companiesCount.textContent = `عدد الشركات: ${visible}`;
    }

    function filterRows() {
        const q = (searchInput?.value || "").trim().toLowerCase();
        const field = fieldFilter?.value || "all";
        const status = statusFilter?.value || "all";

        rows.forEach(row => {
            const name = (row.dataset.name || "").toLowerCase();
            const email = (row.dataset.email || "").toLowerCase();
            const rowField = row.dataset.field || "";
            const rowStatus = row.dataset.status || "";

            const matchSearch = !q || name.includes(q) || email.includes(q);
            const matchField = field === "all" || rowField === field;
            const matchStatus = status === "all" || rowStatus === status;

            row.style.display = (matchSearch && matchField && matchStatus) ? "" : "none";
        });

        updateCount();
    }

    // Listeners
    if (searchInput) searchInput.addEventListener("input", filterRows);
    if (fieldFilter) fieldFilter.addEventListener("change", filterRows);
    if (statusFilter) statusFilter.addEventListener("change", filterRows);

    // Delete
    document.querySelectorAll(".delete").forEach(btn => {
        btn.addEventListener("click", () => {
            const row = btn.closest("tr");
            if (!row) return;

            const ok = confirm("هل تريد حذف هذه الشركة؟");
            if (ok) row.remove();

            updateCount();
        });
    });

    // Export demo
    if (exportBtn) {
        exportBtn.addEventListener("click", () => {
            alert("ميزة التصدير سيتم ربطها لاحقًا في Laravel ✅");
        });
    }

    // Modal
    function openModal() {
        if (!modal) return;
        modal.classList.add("active");
    }

    function closeModalFn() {
        if (!modal) return;
        modal.classList.remove("active");
    }

    if (addCompanyBtn) addCompanyBtn.addEventListener("click", openModal);
    if (closeModal) closeModal.addEventListener("click", closeModalFn);
    if (cancelBtn) cancelBtn.addEventListener("click", closeModalFn);

    if (modal) {
        modal.addEventListener("click", (e) => {
            if (e.target === modal) closeModalFn();
        });
    }

    // Save demo
    if (saveBtn) {
        saveBtn.addEventListener("click", () => {

            if (!companyName.value.trim() || !companyEmail.value.trim()) {
                alert("رجاءً أدخل اسم الشركة والبريد");
                return;
            }

            alert("تم الحفظ بشكل تجريبي ✅ (سيتم ربطه بقاعدة البيانات لاحقًا)");

            // reset
            companyName.value = "";
            companyEmail.value = "";
            companyPhone.value = "";
            companyAddress.value = "";

            closeModalFn();
        });
    }

    // Init
    filterRows();
});
document.addEventListener("DOMContentLoaded", () => {
    const table = document.getElementById("studentsTable");
    const rows = Array.from(table.querySelectorAll("tbody tr"));

    const searchInput = document.getElementById("searchInput");
    const departmentFilter = document.getElementById("departmentFilter");
    const statusFilter = document.getElementById("statusFilter");
    const resetBtn = document.getElementById("resetBtn");

    const totalStudents = document.getElementById("totalStudents");
    const activeStudents = document.getElementById("activeStudents");
    const pendingStudents = document.getElementById("pendingStudents");
    const completedStudents = document.getElementById("completedStudents");

    const shownCount = document.getElementById("shownCount");
    const allCount = document.getElementById("allCount");
    let editingRow = null;
    // Modal
    const modal = document.getElementById("studentModal");
    const closeModal = document.getElementById("closeModal");
    const cancelBtn = document.getElementById("cancelBtn");
    const xClose = document.getElementById("xClose");

    const mName = document.getElementById("mName");
    const mId = document.getElementById("mId");
    const mDept = document.getElementById("mDept");
    const mEmail = document.getElementById("mEmail");
    const mStatus = document.getElementById("mStatus");
    const mCompany = document.getElementById("mCompany");

    function normalize(s) {
        return (s || "").toString().trim().toLowerCase();
    }

    function rowMatches(row) {
        const q = normalize(searchInput.value);
        const dept = departmentFilter.value;
        const status = statusFilter.value;

        const name = normalize(row.dataset.name);
        const id = normalize(row.dataset.id);
        const email = normalize(row.dataset.email);
        const rowDept = row.dataset.dept;
        const rowStatus = row.dataset.status;

        const matchesSearch =
            !q || name.includes(q) || id.includes(q) || email.includes(q);

        const matchesDept = dept === "all" || rowDept === dept;
        const matchesStatus = status === "all" || rowStatus === status;

        return matchesSearch && matchesDept && matchesStatus;
    }

    function updateStats() {
        const total = rows.length;
        allCount.textContent = total;

        let active = 0, pending = 0, completed = 0;

        rows.forEach(r => {
            if (r.dataset.status === "قيد التدريب") active++;
            if (r.dataset.status === "بانتظار الموافقة") pending++;
            if (r.dataset.status === "مكتمل") completed++;
        });

        totalStudents.textContent = total;
        activeStudents.textContent = active;
        pendingStudents.textContent = pending;
        completedStudents.textContent = completed;
    }

    function applyFilters() {
        let shown = 0;
        rows.forEach((row) => {
            const ok = rowMatches(row);
            row.style.display = ok ? "" : "none";
            if (ok) shown++;
        });
        shownCount.textContent = shown;
    }

    function openModalFromRow(row) {
        mName.textContent = row.dataset.name || "-";
        mId.textContent = row.dataset.id || "-";
        mDept.textContent = row.dataset.dept || "-";
        mEmail.textContent = row.dataset.email || "-";
        mStatus.textContent = row.dataset.status || "-";
        mCompany.textContent = row.dataset.company || "-";

        modal.classList.add("open");
        modal.setAttribute("aria-hidden", "false");
    }

    function closeModalFn() {
        modal.classList.remove("open");
        modal.setAttribute("aria-hidden", "true");
    }

    // Events
    searchInput.addEventListener("input", applyFilters);
    departmentFilter.addEventListener("change", applyFilters);
    statusFilter.addEventListener("change", applyFilters);

    resetBtn.addEventListener("click", () => {
        searchInput.value = "";
        departmentFilter.value = "all";
        statusFilter.value = "all";
        applyFilters();
    });

    // Row actions
    table.addEventListener("click", (e) => {
        const btn = e.target.closest("button");
        if (!btn) return;

        const row = e.target.closest("tr");
        if (!row) return;

        if (btn.classList.contains("viewBtn")) {
            openModalFromRow(row);
        }

        if (btn.classList.contains("editBtn")) {

            editingRow = row; // نحفظ الصف الحالي

            // نعبّي الفورم بالبيانات
            document.getElementById("newName").value = row.dataset.name;
            document.getElementById("newId").value = row.dataset.id;
            document.getElementById("newDept").value = row.dataset.dept;
            document.getElementById("newEmail").value = row.dataset.email;
            document.getElementById("newStatus").value = row.dataset.status;
            document.getElementById("newCompany").value = row.dataset.company;

            // نفتح نفس مودل الإضافة
            addModal.classList.add("open");
        }

        if (btn.classList.contains("blockBtn")) {
            const current = row.dataset.status;

            if (current === "موقوف") {
                row.dataset.status = "قيد التدريب";
                row.querySelector(".chip").className = "chip chip-success";
                row.querySelector(".chip").textContent = "قيد التدريب";
            } else {
                row.dataset.status = "موقوف";
                row.querySelector(".chip").className = "chip chip-danger";
                row.querySelector(".chip").textContent = "موقوف";
            }

            updateStats();
            applyFilters();
        }
    });

    // Modal close
    [closeModal, cancelBtn, xClose].forEach(el => el.addEventListener("click", closeModalFn));
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closeModalFn();
    });

    // Init
    updateStats();
    applyFilters();
});

// ===== Add Student Modal =====
const addBtn = document.getElementById("addStudentBtn");
const addModal = document.getElementById("addStudentModal");
const closeAddModal = document.getElementById("closeAddModal");
const cancelAdd = document.getElementById("cancelAdd");
const addBackdrop = document.getElementById("addBackdrop");

const saveNewStudent = document.getElementById("saveNewStudent");

addBtn.addEventListener("click", () => {
    addModal.classList.add("open");
});

function closeAdd() {
    addModal.classList.remove("open");
}

[closeAddModal, cancelAdd, addBackdrop].forEach(el => {
    el.addEventListener("click", closeAdd);
});

saveNewStudent.addEventListener("click", () => {

    const name = document.getElementById("newName").value.trim();
    const id = document.getElementById("newId").value.trim();
    const dept = document.getElementById("newDept").value;
    const email = document.getElementById("newEmail").value.trim();
    const status = document.getElementById("newStatus").value;
    const company = document.getElementById("newCompany").value.trim() || "-";

    if (!name || !id) {
        alert("الرجاء إدخال الاسم والرقم الجامعي");
        return;
    }

    let chipClass = "chip-success";
    if (status === "بانتظار الموافقة") chipClass = "chip-warning";
    if (status === "مكتمل") chipClass = "chip-info";
    if (status === "موقوف") chipClass = "chip-danger";

    if (editingRow) {
        // ===== تعديل صف موجود =====
        editingRow.dataset.name = name;
        editingRow.dataset.id = id;
        editingRow.dataset.dept = dept;
        editingRow.dataset.email = email;
        editingRow.dataset.status = status;
        editingRow.dataset.company = company;

        editingRow.children[1].textContent = name;
        editingRow.children[2].textContent = id;
        editingRow.children[3].textContent = dept;
        editingRow.children[4].textContent = email;
        editingRow.children[5].innerHTML =
            `<span class="chip ${chipClass}">${status}</span>`;
        editingRow.children[6].textContent = company;

        editingRow = null;

    } else {
        // ===== إضافة صف جديد =====
        const tbody = document.querySelector("#studentsTable tbody");
        const rowCount = tbody.querySelectorAll("tr").length + 1;

        const newRow = document.createElement("tr");

        newRow.dataset.name = name;
        newRow.dataset.id = id;
        newRow.dataset.dept = dept;
        newRow.dataset.email = email;
        newRow.dataset.status = status;
        newRow.dataset.company = company;

        newRow.innerHTML = `
      <td>${rowCount}</td>
      <td class="fw">${name}</td>
      <td>${id}</td>
      <td>${dept}</td>
      <td>${email}</td>
      <td><span class="chip ${chipClass}">${status}</span></td>
      <td>${company}</td>
      <td class="actions">
        <button class="icon-btn viewBtn">👁</button>
        <button class="icon-btn editBtn">✏️</button>
        <button class="icon-btn blockBtn">⛔</button>
      </td>
    `;

        tbody.appendChild(newRow);
    }

    updateStats();
    applyFilters();
    closeAdd();

    document.getElementById("newName").value = "";
    document.getElementById("newId").value = "";
    document.getElementById("newEmail").value = "";
    document.getElementById("newCompany").value = "";
});





/* ===== Certificates Page Script ===== */

const STORAGE_KEY = "admin_certificates_v1";

const statusLabel = {
    active: "فعّالة",
    pending: "بانتظار اعتماد",
    revoked: "ملغاة"
};

function makeCode() {
    // Code like: CERT-2026-AB12
    const letters = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
    let tail = "";
    for (let i = 0; i < 4; i++) tail += letters[Math.floor(Math.random() * letters.length)];
    const year = new Date().getFullYear();
    return `CERT-${year}-${tail}`;
}

function seedData() {
    return [
        { id: 1, code: "CERT-2026-A9K2", student: "أحمد علي", sid: "220243221", company: "شركة التقنية الحديثة", period: "2026-01-10 → 2026-03-10", status: "active", issuedAt: "2026-03-12" },
        { id: 2, code: "CERT-2026-Q7T4", student: "سارة محمد", sid: "220243199", company: "مؤسسة الأفق", period: "2026-01-15 → 2026-03-15", status: "pending", issuedAt: "2026-03-16" },
        { id: 3, code: "CERT-2026-H5Z8", student: "محمود حسن", sid: "220243145", company: "شركة حلول الأعمال", period: "2025-11-01 → 2026-01-01", status: "revoked", issuedAt: "2026-01-02" },
        { id: 4, code: "CERT-2026-P3M6", student: "آية خالد", sid: "220243311", company: "شركة CodeCraft", period: "2026-02-01 → 2026-04-01", status: "active", issuedAt: "2026-04-02" },
    ];
}

function loadCertificates() {
    const raw = localStorage.getItem(STORAGE_KEY);
    if (!raw) {
        const seeded = seedData();
        localStorage.setItem(STORAGE_KEY, JSON.stringify(seeded));
        return seeded;
    }
    try { return JSON.parse(raw) || []; }
    catch { return []; }
}

function saveCertificates(list) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(list));
}

/* State */
let certificates = loadCertificates();
let filtered = [...certificates];
let page = 1;
const PAGE_SIZE = 7;

/* Elements */
const certTbody = document.getElementById("certTbody");
const tableMeta = document.getElementById("tableMeta");
const searchInput = document.getElementById("searchInput");
const statusFilter = document.getElementById("statusFilter");
const sortBy = document.getElementById("sortBy");

const statTotal = document.getElementById("statTotal");
const statActive = document.getElementById("statActive");
const statPending = document.getElementById("statPending");
const statRevoked = document.getElementById("statRevoked");

const prevPage = document.getElementById("prevPage");
const nextPage = document.getElementById("nextPage");
const pageInfo = document.getElementById("pageInfo");

/* Chips */
const chipAll = document.getElementById("chipAll");
const chipActive = document.getElementById("chipActive");
const chipPending = document.getElementById("chipPending");
const chipRevoked = document.getElementById("chipRevoked");

/* Preview Modal */
const previewModal = document.getElementById("previewModal");
const previewBackdrop = document.getElementById("previewBackdrop");
const closePreview = document.getElementById("closePreview");

const pvCode = document.getElementById("pvCode");
const pvStudent = document.getElementById("pvStudent");
const pvSid = document.getElementById("pvSid");
const pvCompany = document.getElementById("pvCompany");
const pvPeriod = document.getElementById("pvPeriod");
const pvStatus = document.getElementById("pvStatus");
const pvIssued = document.getElementById("pvIssued");

const certStudentName = document.getElementById("certStudentName");
const certCompanyName = document.getElementById("certCompanyName");
const certPeriodText = document.getElementById("certPeriodText");
const certCodeText = document.getElementById("certCodeText");
const certDateText = document.getElementById("certDateText");

const btnDownloadTxt = document.getElementById("btnDownloadTxt");
const btnRevoke = document.getElementById("btnRevoke");

/* Issue Modal */
const btnIssueCertificate = document.getElementById("btnIssueCertificate");
const issueModal = document.getElementById("issueModal");
const issueBackdrop = document.getElementById("issueBackdrop");
const closeIssue = document.getElementById("closeIssue");
const cancelIssue = document.getElementById("cancelIssue");
const issueForm = document.getElementById("issueForm");

const inStudent = document.getElementById("inStudent");
const inSid = document.getElementById("inSid");
const inCompany = document.getElementById("inCompany");
const inPeriod = document.getElementById("inPeriod");
const inStatus = document.getElementById("inStatus");

/* Export / Reset */
const btnExportCSV = document.getElementById("btnExportCSV");
const btnReset = document.getElementById("btnReset");

/* Helpers */
function badgeClass(s) {
    if (s === "active") return "badge active";
    if (s === "pending") return "badge pending";
    return "badge revoked";
}

function setActiveChip(target) {
    [chipAll, chipActive, chipPending, chipRevoked].forEach(c => c.classList.remove("active"));
    target.classList.add("active");
}

function updateStats() {
    statTotal.textContent = certificates.length;
    statActive.textContent = certificates.filter(c => c.status === "active").length;
    statPending.textContent = certificates.filter(c => c.status === "pending").length;
    statRevoked.textContent = certificates.filter(c => c.status === "revoked").length;
}

function applyFilters() {
    const q = (searchInput.value || "").trim().toLowerCase();
    const st = statusFilter.value;

    filtered = certificates.filter(c => {
        const hay = `${c.code} ${c.student} ${c.sid} ${c.company} ${c.period} ${c.issuedAt}`.toLowerCase();
        const matchesQ = !q || hay.includes(q);
        const matchesSt = (st === "all") || (c.status === st);
        return matchesQ && matchesSt;
    });

    // Sort
    const s = sortBy.value;
    filtered.sort((a, b) => {
        if (s === "newest") return (b.issuedAt || "").localeCompare(a.issuedAt || "");
        if (s === "oldest") return (a.issuedAt || "").localeCompare(b.issuedAt || "");
        if (s === "student") return (a.student || "").localeCompare(b.student || "", "ar");
        return (a.code || "").localeCompare(b.code || "");
    });

    page = 1;
    renderTable();
}

function renderTable() {
    const total = filtered.length;
    tableMeta.textContent = `${total} شهادة`;

    const totalPages = Math.max(1, Math.ceil(total / PAGE_SIZE));
    page = Math.min(page, totalPages);

    const start = (page - 1) * PAGE_SIZE;
    const slice = filtered.slice(start, start + PAGE_SIZE);

    certTbody.innerHTML = "";
    slice.forEach((c, idx) => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
      <td>${start + idx + 1}</td>
      <td><strong>${c.code}</strong></td>
      <td>${c.student}</td>
      <td>${c.sid}</td>
      <td>${c.company}</td>
      <td>${c.period}</td>
      <td><span class="${badgeClass(c.status)}">${statusLabel[c.status]}</span></td>
      <td>${c.issuedAt}</td>
      <td>
        <div class="row-actions">
          <button class="icon-btn" data-action="view" data-id="${c.id}">عرض</button>
          <button class="icon-btn" data-action="copy" data-id="${c.id}">نسخ الكود</button>
          <button class="icon-btn" data-action="revoke" data-id="${c.id}">إلغاء</button>
        </div>
      </td>
    `;
        certTbody.appendChild(tr);
    });

    pageInfo.textContent = `صفحة ${page} من ${totalPages}`;
    prevPage.disabled = page <= 1;
    nextPage.disabled = page >= totalPages;
}

function openModal(modal, backdrop) {
    modal.style.display = "block";
    backdrop.style.display = "block";
    modal.setAttribute("aria-hidden", "false");
    backdrop.setAttribute("aria-hidden", "false");
    document.body.style.overflow = "hidden";
}

function closeModal(modal, backdrop) {
    modal.style.display = "none";
    backdrop.style.display = "none";
    modal.setAttribute("aria-hidden", "true");
    backdrop.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";
}

let currentPreview = null;

function openPreview(cert) {
    currentPreview = cert;

    pvCode.textContent = cert.code;
    pvStudent.textContent = cert.student;
    pvSid.textContent = cert.sid;
    pvCompany.textContent = cert.company;
    pvPeriod.textContent = cert.period;
    pvStatus.textContent = statusLabel[cert.status];
    pvIssued.textContent = cert.issuedAt;

    certStudentName.textContent = cert.student;
    certCompanyName.textContent = cert.company;
    certPeriodText.textContent = cert.period;
    certCodeText.textContent = cert.code;
    certDateText.textContent = cert.issuedAt;

    btnRevoke.disabled = cert.status === "revoked";
    openModal(previewModal, previewBackdrop);
}

function revokeCertificateById(id) {
    const idx = certificates.findIndex(c => c.id === id);
    if (idx === -1) return;

    const ok = confirm("متأكدة بدك تلغي الشهادة؟");
    if (!ok) return;

    certificates[idx].status = "revoked";
    saveCertificates(certificates);
    updateStats();
    applyFilters();
}

function copyToClipboard(text) {
    navigator.clipboard.writeText(text)
        .then(() => alert("تم نسخ الكود ✅"))
        .catch(() => alert("تعذر النسخ، انسخي يدويًا."));
}

function downloadTxt(cert) {
    const content =
        `شهادة تدريب ميداني
الكود: ${cert.code}
الطالب: ${cert.student}
الرقم الجامعي: ${cert.sid}
الشركة: ${cert.company}
الفترة: ${cert.period}
الحالة: ${statusLabel[cert.status]}
تاريخ الإصدار: ${cert.issuedAt}
`;

    const blob = new Blob([content], { type: "text/plain;charset=utf-8" });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = `${cert.code}.txt`;
    document.body.appendChild(a);
    a.click();
    a.remove();
    URL.revokeObjectURL(url);
}

function exportCSV(list) {
    const headers = ["code", "student", "sid", "company", "period", "status", "issuedAt"];
    const rows = list.map(c => [
        c.code, c.student, c.sid, c.company, c.period, c.status, c.issuedAt
    ]);

    const csv = [
        headers.join(","),
        ...rows.map(r => r.map(x => `"${String(x).replaceAll('"', '""')}"`).join(","))
    ].join("\n");

    const blob = new Blob([csv], { type: "text/csv;charset=utf-8" });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = `certificates.csv`;
    document.body.appendChild(a);
    a.click();
    a.remove();
    URL.revokeObjectURL(url);
}

/* Events */
searchInput.addEventListener("input", applyFilters);
statusFilter.addEventListener("change", applyFilters);
sortBy.addEventListener("change", applyFilters);

prevPage.addEventListener("click", () => { page--; renderTable(); });
nextPage.addEventListener("click", () => { page++; renderTable(); });

certTbody.addEventListener("click", (e) => {
    const btn = e.target.closest("button");
    if (!btn) return;

    const action = btn.dataset.action;
    const id = Number(btn.dataset.id);
    const cert = certificates.find(c => c.id === id);
    if (!cert) return;

    if (action === "view") openPreview(cert);
    if (action === "copy") copyToClipboard(cert.code);
    if (action === "revoke") revokeCertificateById(id);
});

closePreview.addEventListener("click", () => closeModal(previewModal, previewBackdrop));
previewBackdrop.addEventListener("click", () => closeModal(previewModal, previewBackdrop));

btnDownloadTxt.addEventListener("click", () => {
    if (!currentPreview) return;
    downloadTxt(currentPreview);
});

btnRevoke.addEventListener("click", () => {
    if (!currentPreview) return;
    revokeCertificateById(currentPreview.id);
    // refresh modal view
    const updated = certificates.find(c => c.id === currentPreview.id);
    if (updated) openPreview(updated);
});

btnIssueCertificate.addEventListener("click", () => openModal(issueModal, issueBackdrop));
closeIssue.addEventListener("click", () => closeModal(issueModal, issueBackdrop));
cancelIssue.addEventListener("click", () => closeModal(issueModal, issueBackdrop));
issueBackdrop.addEventListener("click", () => closeModal(issueModal, issueBackdrop));

issueForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const newItem = {
        id: (certificates.length ? Math.max(...certificates.map(c => c.id)) : 0) + 1,
        code: makeCode(),
        student: inStudent.value.trim(),
        sid: inSid.value.trim(),
        company: inCompany.value.trim(),
        period: inPeriod.value.trim(),
        status: inStatus.value,
        issuedAt: new Date().toISOString().slice(0, 10)
    };

    certificates.unshift(newItem);
    saveCertificates(certificates);
    updateStats();
    applyFilters();

    issueForm.reset();
    closeModal(issueModal, issueBackdrop);
    alert("تم إصدار الشهادة ✅");
});

btnExportCSV.addEventListener("click", () => exportCSV(filtered));

btnReset.addEventListener("click", () => {
    searchInput.value = "";
    statusFilter.value = "all";
    sortBy.value = "newest";
    setActiveChip(chipAll);
    applyFilters();
});

/* Chips quick filter */
chipAll.addEventListener("click", () => {
    statusFilter.value = "all";
    setActiveChip(chipAll);
    applyFilters();
});
chipActive.addEventListener("click", () => {
    statusFilter.value = "active";
    setActiveChip(chipActive);
    applyFilters();
});
chipPending.addEventListener("click", () => {
    statusFilter.value = "pending";
    setActiveChip(chipPending);
    applyFilters();
});
chipRevoked.addEventListener("click", () => {
    statusFilter.value = "revoked";
    setActiveChip(chipRevoked);
    applyFilters();
});

/* Init */
setActiveChip(chipAll);
updateStats();
applyFilters();




// compaines

