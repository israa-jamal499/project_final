
@extends('cms.admin.temp')
@section('title' ,'notifications')
@section('main-title',' الاشعارات')

@section('css')

@endsection
@section('content')
  <!-- ✅ محتوى الصفحة -->
  <main class="admin-page" style="padding: 22px 18px;">
    <section class="card" style="background:#fff; border-radius:14px; padding:18px; box-shadow: 0 10px 24px rgba(0,0,0,.06);">

      <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; justify-content:space-between;">
        <div>
          <h2 style="margin:0; font-size:20px;">🔔 الإشعارات</h2>
          <p style="margin:6px 0 0; color:#6b7280;">إدارة إشعارات لوحة الأدمن (قراءة/حذف/فلترة)</p>
        </div>

        <div style="display:flex; gap:10px; flex-wrap:wrap;">
          <button id="markAllReadBtn" class="btn primary" type="button">
            <i class="fa-regular fa-circle-check"></i> تعليم الكل كمقروء
          </button>
          <button id="clearAllBtn" class="btn danger" type="button">
            <i class="fa-regular fa-trash-can"></i> حذف الكل
          </button>
        </div>
      </div>

      <hr style="border:none; border-top:1px solid #eef2f7; margin:16px 0;">

      <!-- أدوات -->
      <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; justify-content:space-between;">
        <div style="display:flex; gap:10px; flex-wrap:wrap; align-items:center;">
          <label style="display:flex; gap:8px; align-items:center;">
            <input id="selectAllChk" type="checkbox">
            <span>تحديد الكل</span>
          </label>

          <button id="bulkReadBtn" class="btn" type="button" disabled>
            ✅ تعليم المحدد كمقروء
          </button>
          <button id="bulkDeleteBtn" class="btn" type="button" disabled>
            🗑 حذف المحدد
          </button>

          <span id="selectedCount" style="color:#6b7280;">0 محدد</span>
        </div>

        <div style="display:flex; gap:10px; flex-wrap:wrap;">
          <input id="searchInput" class="input" type="text" placeholder="ابحث في الإشعارات..." style="min-width:220px;">
          <select id="statusFilter" class="input">
            <option value="all">الكل</option>
            <option value="unread">غير مقروء</option>
            <option value="read">مقروء</option>
          </select>
        </div>
      </div>

      <!-- قائمة الإشعارات -->
      <div id="notifList" style="margin-top:14px; display:grid; gap:10px;"></div>

      <!-- حالة فارغة -->
      <div id="emptyState" style="display:none; text-align:center; padding:26px; color:#6b7280;">
        <div style="font-size:34px;">📭</div>
        <div style="margin-top:10px;">لا توجد إشعارات مطابقة</div>
      </div>

    </section>
  </main>
@endsection



@section('js')
 <script>
    document.addEventListener("DOMContentLoaded", () => {

      // ====== عناصر الجرس (لو موجودة عندك) ======
      const notifBtn = document.getElementById("notifBtn");
      const notifDropdown = document.getElementById("notifDropdown");
      const notifBadge = document.getElementById("notifBadge");
      const notifMiniList = document.getElementById("notifMiniList");
      const openNotifPageBtn = document.getElementById("openNotifPageBtn");

      // ====== عناصر الصفحة ======
      const notifListEl = document.getElementById("notifList");
      const emptyState = document.getElementById("emptyState");

      const searchInput = document.getElementById("searchInput");
      const statusFilter = document.getElementById("statusFilter");

      const selectAllChk = document.getElementById("selectAllChk");
      const bulkReadBtn = document.getElementById("bulkReadBtn");
      const bulkDeleteBtn = document.getElementById("bulkDeleteBtn");
      const selectedCountEl = document.getElementById("selectedCount");

      const markAllReadBtn = document.getElementById("markAllReadBtn");
      const clearAllBtn = document.getElementById("clearAllBtn");

      // ====== بيانات تجريبية (بدّليها ببيانات السيرفر لاحقاً) ======
      // read: true/false
      let notifications = [
        { id: 1, title: "طلب تسجيل جديد", message: "تم تسجيل طالب جديد في النظام.", time: "قبل 5 دقائق", read: false, type: "user" },
        { id: 2, title: "فرصة تدريب جديدة", message: "شركة XYZ أضافت فرصة تدريب.", time: "قبل ساعة", read: false, type: "opportunity" },
        { id: 3, title: "تم اعتماد تقرير", message: "تم اعتماد تقرير تدريب للطالب أحمد.", time: "أمس", read: true, type: "report" },
        { id: 4, title: "تنبيه نظام", message: "تم تحديث بيانات المشرفين بنجاح.", time: "قبل يومين", read: true, type: "system" },
      ];

      // ====== Helpers ======
      const saveToStorage = () => {
        localStorage.setItem("admin_notifications", JSON.stringify(notifications));
      };

      const loadFromStorage = () => {
        const raw = localStorage.getItem("admin_notifications");
        if (!raw) return;
        try { notifications = JSON.parse(raw) || notifications; } catch(e){}
      };

      const unreadCount = () => notifications.filter(n => !n.read).length;

      const iconByType = (type) => {
        switch(type){
          case "user": return "fa-solid fa-user-plus";
          case "opportunity": return "fa-solid fa-briefcase";
          case "report": return "fa-solid fa-file-lines";
          case "system": return "fa-solid fa-gear";
          default: return "fa-regular fa-bell";
        }
      };

      const escapeHTML = (s) => (s ?? "").toString()
        .replaceAll("&","&amp;")
        .replaceAll("<","&lt;")
        .replaceAll(">","&gt;")
        .replaceAll('"',"&quot;")
        .replaceAll("'","&#039;");

      const getFiltered = () => {
        const q = (searchInput.value || "").trim().toLowerCase();
        const st = statusFilter.value;

        return notifications.filter(n => {
          const inSearch =
            !q ||
            n.title.toLowerCase().includes(q) ||
            n.message.toLowerCase().includes(q);

          const inStatus =
            st === "all" ||
            (st === "unread" && !n.read) ||
            (st === "read" && n.read);

          return inSearch && inStatus;
        });
      };

      const updateBadge = () => {
        if (!notifBadge) return;
        const c = unreadCount();
        notifBadge.textContent = c;
        notifBadge.style.display = c > 0 ? "inline-flex" : "none";
      };

      const updateMiniDropdown = () => {
        if (!notifMiniList) return;

        const latest = [...notifications]
          .sort((a,b) => b.id - a.id)
          .slice(0, 5);

        if (latest.length === 0) {
          notifMiniList.innerHTML = `<div style="padding:12px; color:#6b7280;">لا توجد إشعارات</div>`;
          return;
        }

        notifMiniList.innerHTML = latest.map(n => `
          <div class="mini-item" data-id="${n.id}" style="padding:10px 12px; border-bottom:1px solid #eef2f7; cursor:pointer;">
            <div style="display:flex; justify-content:space-between; gap:10px;">
              <strong style="font-size:13px; ${n.read ? "color:#6b7280;" : "color:#111827;"}">${escapeHTML(n.title)}</strong>
              <span style="font-size:12px; color:#9ca3af;">${escapeHTML(n.time)}</span>
            </div>
            <div style="font-size:12px; color:#6b7280; margin-top:4px;">${escapeHTML(n.message)}</div>
          </div>
        `).join("");

        // عند الضغط: نعلّم كمقروء
        notifMiniList.querySelectorAll(".mini-item").forEach(el => {
          el.addEventListener("click", () => {
            const id = Number(el.dataset.id);
            markRead(id);
          });
        });
      };

      // ====== عمليات ======
      const markRead = (id) => {
        notifications = notifications.map(n => n.id === id ? ({...n, read:true}) : n);
        saveToStorage();
        renderAll();
      };

      const toggleRead = (id) => {
        notifications = notifications.map(n => n.id === id ? ({...n, read: !n.read}) : n);
        saveToStorage();
        renderAll();
      };

      const removeOne = (id) => {
        notifications = notifications.filter(n => n.id !== id);
        saveToStorage();
        renderAll();
      };

      const markAllRead = () => {
        notifications = notifications.map(n => ({...n, read:true}));
        saveToStorage();
        renderAll();
      };

      const clearAll = () => {
        notifications = [];
        saveToStorage();
        renderAll();
      };

      const getSelectedIds = () => {
        return Array.from(document.querySelectorAll(".notif-select:checked"))
          .map(chk => Number(chk.dataset.id));
      };

      const updateBulkState = () => {
        const ids = getSelectedIds();
        selectedCountEl.textContent = `${ids.length} محدد`;
        const disabled = ids.length === 0;
        bulkReadBtn.disabled = disabled;
        bulkDeleteBtn.disabled = disabled;

        const visibleChecks = document.querySelectorAll(".notif-select");
        const checkedChecks = document.querySelectorAll(".notif-select:checked");
        selectAllChk.checked = visibleChecks.length > 0 && checkedChecks.length === visibleChecks.length;
      };

      // ====== Render ======
      const renderList = () => {
        const data = getFiltered();

        if (data.length === 0) {
          notifListEl.innerHTML = "";
          emptyState.style.display = "block";
          return;
        }

        emptyState.style.display = "none";

        notifListEl.innerHTML = data.map(n => `
          <div class="notif-card" style="
            border:1px solid #eef2f7;
            border-radius:14px;
            padding:12px 12px;
            display:flex;
            gap:12px;
            align-items:flex-start;
            ${n.read ? "background:#ffffff;" : "background:#f8fbff; border-color:#dbeafe;"}
          ">
            <div style="padding-top:4px;">
              <input class="notif-select" type="checkbox" data-id="${n.id}">
            </div>

            <div style="
              width:38px; height:38px;
              border-radius:12px;
              display:flex; align-items:center; justify-content:center;
              background:${n.read ? "#f3f4f6" : "#dbeafe"};
              flex:0 0 auto;
            ">
              <i class="${iconByType(n.type)}" style="color:${n.read ? "#6b7280" : "#1d4ed8"}"></i>
            </div>

            <div style="flex:1;">
              <div style="display:flex; justify-content:space-between; gap:10px; align-items:flex-start;">
                <div>
                  <div style="display:flex; gap:8px; align-items:center; flex-wrap:wrap;">
                    <strong style="font-size:15px; color:#111827;">${escapeHTML(n.title)}</strong>
                    ${n.read ? "" : `<span style="font-size:12px; background:#2563eb; color:#fff; padding:2px 8px; border-radius:999px;">جديد</span>`}
                  </div>
                  <div style="margin-top:6px; color:#6b7280; font-size:13px;">${escapeHTML(n.message)}</div>
                </div>

                <div style="text-align:left;">
                  <div style="font-size:12px; color:#9ca3af;">${escapeHTML(n.time)}</div>
                </div>
              </div>

              <div style="margin-top:10px; display:flex; gap:8px; flex-wrap:wrap;">
                <button class="btn small" data-action="toggleRead" data-id="${n.id}">
                  ${n.read ? "اجعله غير مقروء" : "تعليم كمقروء"}
                </button>
                <button class="btn small danger" data-action="delete" data-id="${n.id}">
                  حذف
                </button>
              </div>
            </div>
          </div>
        `).join("");

        // Events داخل الكروت
        notifListEl.querySelectorAll("[data-action='toggleRead']").forEach(btn => {
          btn.addEventListener("click", () => toggleRead(Number(btn.dataset.id)));
        });
        notifListEl.querySelectorAll("[data-action='delete']").forEach(btn => {
          btn.addEventListener("click", () => removeOne(Number(btn.dataset.id)));
        });

        notifListEl.querySelectorAll(".notif-select").forEach(chk => {
          chk.addEventListener("change", updateBulkState);
        });

        updateBulkState();
      };

      const renderAll = () => {
        updateBadge();
        updateMiniDropdown();
        renderList();
      };

      // ====== Topbar dropdown behavior ======
      if (notifBtn && notifDropdown) {
        notifBtn.addEventListener("click", (e) => {
          e.stopPropagation();
          notifDropdown.classList.toggle("active");
        });

        document.addEventListener("click", () => {
          notifDropdown.classList.remove("active");
        });

        notifDropdown.addEventListener("click", (e) => e.stopPropagation());
      }


      // ====== Page events ======
      searchInput.addEventListener("input", renderList);
      statusFilter.addEventListener("change", renderList);

      selectAllChk.addEventListener("change", () => {
        const checks = document.querySelectorAll(".notif-select");
        checks.forEach(ch => ch.checked = selectAllChk.checked);
        updateBulkState();
      });

      bulkReadBtn.addEventListener("click", () => {
        const ids = getSelectedIds();
        notifications = notifications.map(n => ids.includes(n.id) ? ({...n, read:true}) : n);
        saveToStorage();
        renderAll();
      });

      bulkDeleteBtn.addEventListener("click", () => {
        const ids = getSelectedIds();
        notifications = notifications.filter(n => !ids.includes(n.id));
        saveToStorage();
        renderAll();
      });

      markAllReadBtn.addEventListener("click", markAllRead);
      clearAllBtn.addEventListener("click", clearAll);

      // ====== init ======
      loadFromStorage();
      renderAll();
    });
  </script>
@endsection


</body>
</html>

