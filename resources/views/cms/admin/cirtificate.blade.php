@extends('cms.admin.temp')
@section('title' ,'certificates')
@section('main-title',' الشهادات')
@section('css')
<style>
    .form-control {
    color: #000 !important;
}
</style>
@endsection
@section('content')
  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>اجمالي الشهادات</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">كل الشهادات المصدرة <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>شهادات مفعلة</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">شهادات صالحة وغير ملغاه <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>بانتظار اعتماد</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">تحتاج مراجعة الادمن <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>ملغاه</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">تم الغاؤها <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

</section>
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
@endsection

@section('scripts')

@endsection
