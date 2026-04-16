
@extends('cms.admin.temp')
@section('title' ,'students')

@section('main-title','ادارة الطلاب')

{{-- @section('sub-title','ادارة الطلاب') --}}
@section('css')
<style>
    .active {
  background: #ffffff20;
  border-right: 4px solid #00c0ff;
}
</style>
@endsection
@section('content')

<main class="page">
    <!-- Header -->
    <div class="page-head">
      <div class="page-title">

        <p>عرض، بحث، فلترة، ومتابعة حالات التدريب للطلاب.</p>
      </div>

      <div class="page-actions">
        <button class="btn btn-outline" id="exportBtn">تصدير</button>
        <button class="btn btn-primary" id="addStudentBtn">+ إضافة طالب</button>
      </div>
    </div>

    
    <section class="card">
      <div class="card-head">
        <h2>الطلاب</h2>
        <div class="hint">استخدمي البحث والفلترة للوصول بسرعة</div>
      </div>

      <div class="tools-row">
        <div class="tool">
          <label for="searchInput">بحث</label>
          <input id="searchInput" type="text" placeholder="ابحث بالاسم أو الرقم الجامعي أو الإيميل..." />
        </div>

        <div class="tool">
          <label for="departmentFilter">القسم</label>
          <select id="departmentFilter">
            <option value="all">الكل</option>
            <option value="هندسة البرمجيات">هندسة البرمجيات</option>
            <option value="الأمن السيبراني">الأمن السيبراني</option>
            <option value="شبكات">شبكات</option>
            <option value="نظم معلومات">نظم معلومات</option>
          </select>
        </div>

        <div class="tool">
          <label for="statusFilter">الحالة</label>
          <select id="statusFilter">
            <option value="all">الكل</option>
            <option value="قيد التدريب">قيد التدريب</option>
            <option value="بانتظار الموافقة">بانتظار الموافقة</option>
            <option value="مكتمل">مكتمل</option>
            <option value="موقوف">موقوف</option>
          </select>
        </div>

        <div class="tool tool-inline">
          <button class="btn btn-light" id="resetBtn">إعادة تعيين</button>
          <div class="count-pill">
            المعروض: <span id="shownCount">0</span> / <span id="allCount">0</span>
          </div>
        </div>
      </div>

      <!-- Table -->
      <div class="table-wrap">
        <table class="table" id="studentsTable">
          <thead>
            <tr>
              <th>#</th>
              <th>الاسم</th>
              <th>الرقم الجامعي</th>
              <th>القسم</th>
              <th>البريد</th>
              <th>الحالة</th>
              <th>الشركة</th>
              <th>إجراءات</th>
            </tr>
          </thead>
          <tbody>
            <!-- أمثلة (بدك بدّلهم ببياناتك لاحقاً) -->
            <tr data-name="لانا زاهر كسكين" data-id="220243221" data-dept="الأمن السيبراني" data-email="lana@ucas.edu.ps" data-status="قيد التدريب" data-company="SecureLab">
              <td>1</td>
              <td class="fw">لانا زاهر كسكين</td>
              <td>220243221</td>
              <td>الأمن السيبراني</td>
              <td>lana@ucas.edu.ps</td>
              <td><span class="chip chip-success">قيد التدريب</span></td>
              <td>SecureLab</td>
              <td class="actions">
                <button class="icon-btn viewBtn" title="عرض">👁</button>
                <button class="icon-btn editBtn" title="تعديل">✏️</button>
                <button class="icon-btn blockBtn" title="إيقاف">⛔</button>
              </td>
            </tr>

            <tr data-name="محمد علي" data-id="220240011" data-dept="هندسة البرمجيات" data-email="m.ali@ucas.edu.ps" data-status="بانتظار الموافقة" data-company="TechNova">
              <td>2</td>
              <td class="fw">محمد علي</td>
              <td>220240011</td>
              <td>هندسة البرمجيات</td>
              <td>m.ali@ucas.edu.ps</td>
              <td><span class="chip chip-warning">بانتظار الموافقة</span></td>
              <td>TechNova</td>
              <td class="actions">
                <button class="icon-btn viewBtn" title="عرض">👁</button>
                <button class="icon-btn editBtn" title="تعديل">✏️</button>
                <button class="icon-btn blockBtn" title="إيقاف">⛔</button>
              </td>
            </tr>

            <tr data-name="هبة سمير" data-id="220240099" data-dept="نظم معلومات" data-email="hiba@ucas.edu.ps" data-status="مكتمل" data-company="BlueByte">
              <td>3</td>
              <td class="fw">هبة سمير</td>
              <td>220240099</td>
              <td>نظم معلومات</td>
              <td>hiba@ucas.edu.ps</td>
              <td><span class="chip chip-info">مكتمل</span></td>
              <td>BlueByte</td>
              <td class="actions">
                <button class="icon-btn viewBtn" title="عرض">👁</button>
                <button class="icon-btn editBtn" title="تعديل">✏️</button>
                <button class="icon-btn blockBtn" title="إيقاف">⛔</button>
              </td>
            </tr>

            <tr data-name="سارة أحمد" data-id="220240777" data-dept="شبكات" data-email="sara@ucas.edu.ps" data-status="موقوف" data-company="-">
              <td>4</td>
              <td class="fw">سارة أحمد</td>
              <td>220240777</td>
              <td>شبكات</td>
              <td>sara@ucas.edu.ps</td>
              <td><span class="chip chip-danger">موقوف</span></td>
              <td>-</td>
              <td class="actions">
                <button class="icon-btn viewBtn" title="عرض">👁</button>
                <button class="icon-btn editBtn" title="تعديل">✏️</button>
                <button class="icon-btn blockBtn" title="تفعيل">✅</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination (واجهة) -->
      <div class="pagination">
        <button class="btn btn-light" disabled>السابق</button>
        <div class="pages">
          <button class="page-btn active">1</button>
          <button class="page-btn">2</button>
          <button class="page-btn">3</button>
        </div>
        <button class="btn btn-light">التالي</button>
      </div>
    </section>
  </main>



  <!-- Modal: View Student -->
  <div class="modal" id="studentModal" aria-hidden="true">
    <div class="modal-backdrop" id="closeModal"></div>
    <div class="modal-card" role="dialog" aria-modal="true">
      <div class="modal-head">
        <h3>تفاصيل الطالب</h3>
        <button class="icon-btn" id="xClose" title="إغلاق">✖</button>
      </div>

      <div class="modal-body">
        <div class="kv">
          <div class="kv-item"><span>الاسم</span><strong id="mName">-</strong></div>
          <div class="kv-item"><span>الرقم الجامعي</span><strong id="mId">-</strong></div>
          <div class="kv-item"><span>القسم</span><strong id="mDept">-</strong></div>
          <div class="kv-item"><span>البريد</span><strong id="mEmail">-</strong></div>
          <div class="kv-item"><span>الحالة</span><strong id="mStatus">-</strong></div>
          <div class="kv-item"><span>الشركة</span><strong id="mCompany">-</strong></div>
        </div>

        <div class="note-box">
          <div class="note-title">ملاحظات</div>
          <p class="note-text">هنا لاحقاً بتضيفي ملاحظات المشرف/الأدمن أو آخر تحديثات الطالب.</p>
        </div>
      </div>

      <div class="modal-foot">
        <button class="btn btn-light" id="cancelBtn">إغلاق</button>
        <button class="btn btn-primary" id="saveBtn">حفظ</button>
      </div>
    </div>
  </div>

  <!-- Add Student Modal -->
<div class="modal" id="addStudentModal">
  <div class="modal-backdrop" id="addBackdrop"></div>

  <div class="modal-card">
    <div class="modal-head">
      <h3>إضافة طالب جديد</h3>
      <button class="icon-btn" id="closeAddModal">✖</button>
    </div>

    <div class="modal-body">
      <div class="form-grid">
        <div class="form-group">
          <label>الاسم الكامل</label>
          <input type="text" id="newName" required>
        </div>

        <div class="form-group">
          <label>الرقم الجامعي</label>
          <input type="text" id="newId" required>
        </div>

        <div class="form-group">
          <label>القسم</label>
          <select id="newDept">
            <option>الأمن السيبراني</option>
            <option>هندسة البرمجيات</option>
            <option>شبكات</option>
            <option>نظم معلومات</option>
          </select>
        </div>

        <div class="form-group">
          <label>البريد الإلكتروني</label>
          <input type="email" id="newEmail">
        </div>

        <div class="form-group">
          <label>الحالة</label>
          <select id="newStatus">
            <option>قيد التدريب</option>
            <option>بانتظار الموافقة</option>
            <option>مكتمل</option>
            <option>موقوف</option>
          </select>
        </div>

        <div class="form-group">
          <label>الشركة</label>
          <input type="text" id="newCompany">
        </div>
      </div>
    </div>

    <div class="modal-foot">
      <button class="btn btn-light" id="cancelAdd">إلغاء</button>
      <button class="btn btn-primary" id="saveNewStudent">حفظ الطالب</button>
    </div>
  </div>
</div>
@endsection
@section('js')
@endsection
</body>
</html>

