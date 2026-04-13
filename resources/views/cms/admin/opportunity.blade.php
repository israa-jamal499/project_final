@extends('cms.admin.temp')


@section('title','title')

@section('main-title','ادارة الفرص')

@section('main-title','ادارة الفرص')



@section('styles')

@endsection



@section('content')
<main class="page" data-page="opportunities">

    <div class="page-head">
      <div class="page-title">

        <p>إضافة فرص تدريب، البحث والفلترة، إدارة الحالة وعدد المقاعد.</p>
      </div>

      <div class="page-actions">
        <button class="btn btn-outline" data-action="export">تصدير</button>
        <button class="btn btn-primary" data-action="open-add-modal">+ إضافة فرصة</button>
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

                <p>اجمالي الفرص</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">عدد الفرض المضافة في النظام<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>مفتوحة</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">يمكن للطلاب التقديم عليها<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning ">
              <div class="inner">
                <h3>65</h3>

                <p>بانتظار الموافقة</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">بحاجة مراجعة الادمن<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger ">
              <div class="inner">
                <h3>44</h3>

                <p>مغلقة</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">تم اغلاق التقديم عليها<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
        </div>

</section>
    <!-- Tools + Table -->
    <section class="card">
      <div class="card-head">
        <h2>الفرص</h2>
        <div class="hint">بحث/فلترة ثم إدارة الفرصة من الإجراءات</div>
      </div>

      <div class="tools-row">
        <div class="tool">
          <label for="searchInput">بحث</label>
          <input id="searchInput" type="text" placeholder="ابحث بعنوان الفرصة أو اسم الشركة أو المدينة..." />
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
          <label for="typeFilter">نوع التدريب</label>
          <select id="typeFilter">
            <option value="all">الكل</option>
            <option value="حضوري">حضوري</option>
            <option value="عن بعد">عن بعد</option>
            <option value="هجين">هجين</option>
          </select>
        </div>

        <div class="tool">
          <label for="statusFilter">الحالة</label>
          <select id="statusFilter">
            <option value="all">الكل</option>
            <option value="مفتوحة">مفتوحة</option>
            <option value="مغلقة">مغلقة</option>
            <option value="بانتظار الموافقة">بانتظار الموافقة</option>
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
        <table class="table" id="oppsTable">
          <thead>
            <tr>
              <th>#</th>
              <th>عنوان الفرصة</th>
              <th>الشركة</th>
              <th>المجال</th>
              <th>النوع</th>
              <th>المدينة</th>
              <th>المقاعد</th>
              <th>آخر موعد</th>
              <th>الحالة</th>
              <th>إجراءات</th>
            </tr>
          </thead>

          <tbody>
            <!-- أمثلة جاهزة -->
            <tr data-title="Intern Cyber Security"
                data-company="SecureLab"
                data-field="أمن سيبراني"
                data-type="حضوري"
                data-city="غزة"
                data-seats="4"
                data-deadline="2026-03-15"
                data-status="مفتوحة"
                data-desc="فرصة تدريب ميداني لطلاب الأمن السيبراني (SOC + تقارير).">
              <td>1</td>
              <td class="fw">Intern Cyber Security</td>
              <td>SecureLab</td>
              <td>أمن سيبراني</td>
              <td>حضوري</td>
              <td>غزة</td>
              <td>4</td>
              <td>2026-03-15</td>
              <td><span class="chip chip-success">مفتوحة</span></td>
              <td class="actions">
                <button class="icon-btn" data-action="view">👁</button>
                <button class="icon-btn" data-action="edit">✏️</button>
                <button class="icon-btn" data-action="toggle">⛔</button>
              </td>
            </tr>

            <tr data-title="Front-End Internship"
                data-company="TechNova"
                data-field="تقنية معلومات"
                data-type="عن بعد"
                data-city="نابلس"
                data-seats="6"
                data-deadline="2026-03-01"
                data-status="بانتظار الموافقة"
                data-desc="تدريب Front-End (HTML/CSS/JS) مع مهام أسبوعية.">
              <td>2</td>
              <td class="fw">Front-End Internship</td>
              <td>TechNova</td>
              <td>تقنية معلومات</td>
              <td>عن بعد</td>
              <td>نابلس</td>
              <td>6</td>
              <td>2026-03-01</td>
              <td><span class="chip chip-warning">بانتظار الموافقة</span></td>
              <td class="actions">
                <button class="icon-btn" data-action="view">👁</button>
                <button class="icon-btn" data-action="edit">✏️</button>
                <button class="icon-btn" data-action="toggle">⛔</button>
              </td>
            </tr>

            <tr data-title="Graphic Design Intern"
                data-company="BlueByte"
                data-field="تصميم"
                data-type="هجين"
                data-city="الوسطى"
                data-seats="2"
                data-deadline="2026-02-25"
                data-status="مغلقة"
                data-desc="تدريب تصميم (Branding + Social Media).">
              <td>3</td>
              <td class="fw">Graphic Design Intern</td>
              <td>BlueByte</td>
              <td>تصميم</td>
              <td>هجين</td>
              <td>الوسطى</td>
              <td>2</td>
              <td>2026-02-25</td>
              <td><span class="chip chip-info">مغلقة</span></td>
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
