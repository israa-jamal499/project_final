@extends('cms.admin.parent')

@section('title','company')
@section('title','ادارة الشركات')

@section('main-title','ادارة الشركات')



@section('styles')

@endsection



@section('content')
<main class="page" data-page="companies">

    <div class="page-head">
      <div class="page-title">

        <p>إضافة الشركات، البحث والفلترة، وإدارة حالة الشركات وفرص التدريب.</p>
      </div>

      <div class="page-actions">
        <button class="btn btn-outline" data-action="export">تصدير</button>
        <button class="btn btn-primary" data-action="open-add-modal">+ إضافة شركة</button>
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

                <p>اجمالي الشركات</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">عدد الشركات المسجلة بالنظام<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>نشطة</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">شركات مسموح لها بالنشر<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>بانتظار الموافقة</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">بحاجة لمراجعة الادمن<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>موقوفة</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">تم ايقافها مؤقتاً<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

</section>

    <!-- Tools + Table -->
    <section class="card">
      <div class="card-head">
        <h2>الشركات</h2>
        <div class="hint">بحث/فلترة ثم إدارة الشركة من الإجراءات</div>
      </div>

      <div class="tools-row">
        <div class="tool">
          <label for="searchInput">بحث</label>
          <input id="searchInput" type="text" placeholder="ابحث باسم الشركة أو البريد أو الهاتف..." />
        </div>

        <div class="tool">
          <label for="fieldFilter">المجال</label>
          <select id="fieldFilter">
            <option value="all">الكل</option>
            <option value="تقنية معلومات">تقنية معلومات</option>
            <option value="أمن سيبراني">أمن سيبراني</option>
            <option value="تسويق">تسويق</option>
            <option value="تصميم">تصميم</option>
            <option value="اتصالات">اتصالات</option>
          </select>
        </div>

        <div class="tool">
          <label for="statusFilter">الحالة</label>
          <select id="statusFilter">
            <option value="all">الكل</option>
            <option value="نشطة">نشطة</option>
            <option value="بانتظار الموافقة">بانتظار الموافقة</option>
            <option value="موقوفة">موقوفة</option>
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
        <table class="table" id="companiesTable" data-table="companies">
          <thead>
            <tr>
              <th>#</th>
              <th>اسم الشركة</th>
              <th>المجال</th>
              <th>البريد</th>
              <th>الهاتف</th>
              <th>عدد الفرص</th>
              <th>الحالة</th>
              <th>إجراءات</th>
            </tr>
          </thead>
          <tbody>

            <!-- أمثلة جاهزة -->
            <tr data-name="SecureLab"
                data-field="أمن سيبراني"
                data-email="info@securelab.com"
                data-phone="0599000000"
                data-status="نشطة"
                data-opps="5"
                data-city="غزة"
                data-website="securelab.com">
              <td>1</td>
              <td class="fw">SecureLab</td>
              <td>أمن سيبراني</td>
              <td>info@securelab.com</td>
              <td>0599000000</td>
              <td>5</td>
              <td><span class="chip chip-success">نشطة</span></td>
              <td class="actions">
                <button class="icon-btn" data-action="view">👁</button>
                <button class="icon-btn" data-action="edit">✏️</button>
                <button class="icon-btn" data-action="toggle">⛔</button>
              </td>
            </tr>

            <tr data-name="TechNova"
                data-field="تقنية معلومات"
                data-email="hr@technova.com"
                data-phone="0568000000"
                data-status="بانتظار الموافقة"
                data-opps="2"
                data-city="نابلس"
                data-website="technova.ps">
              <td>2</td>
              <td class="fw">TechNova</td>
              <td>تقنية معلومات</td>
              <td>hr@technova.com</td>
              <td>0568000000</td>
              <td>2</td>
              <td><span class="chip chip-warning">بانتظار الموافقة</span></td>
              <td class="actions">
                <button class="icon-btn" data-action="view">👁</button>
                <button class="icon-btn" data-action="edit">✏️</button>
                <button class="icon-btn" data-action="toggle">⛔</button>
              </td>
            </tr>

            <tr data-name="BlueByte"
                data-field="تصميم"
                data-email="contact@bluebyte.com"
                data-phone="0591000000"
                data-status="موقوفة"
                data-opps="0"
                data-city="الوسطى"
                data-website="bluebyte.co">
              <td>3</td>
              <td class="fw">BlueByte</td>
              <td>تصميم</td>
              <td>contact@bluebyte.com</td>
              <td>0591000000</td>
              <td>0</td>
              <td><span class="chip chip-danger">موقوفة</span></td>
              <td class="actions">
                <button class="icon-btn" data-action="view">👁</button>
                <button class="icon-btn" data-action="edit">✏️</button>
                <button class="icon-btn" data-action="toggle">✅</button>
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

@endsection

@section('scripts')

@endsection
