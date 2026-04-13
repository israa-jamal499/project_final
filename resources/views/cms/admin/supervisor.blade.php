@extends('cms.admin.parent')


@section('title','title')

@section('main-title','ادارة المشرفين')



@section('styles')

@endsection



@section('content')
<main class="page" data-page="supervisors">

    <div class="page-head">
      <div class="page-title">

        <p>إضافة مشرفين، البحث والفلترة، وإدارة حالة المشرف ومتابعة عدد الطلاب.</p>
      </div>

      <div class="page-actions">
        <button class="btn btn-outline" data-action="export">تصدير</button>
        <button class="btn btn-primary" data-action="open-add-modal">+ إضافة مشرف</button>
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

                <p>اجمالي المشرفين</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">عدد المشرفين المسجلين بالنظام<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>نشط</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">يستقبل متابعة الطلبة<i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="#" class="small-box-footer">لا يمكنه المتابعة حالياً<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

</section>
    <!-- Tools + Table -->
    <section class="card">
      <div class="card-head">
        <h2>المشرفين</h2>
        <div class="hint">بحث/فلترة ثم إدارة المشرف من الإجراءات</div>
      </div>

      <div class="tools-row">
        <div class="tool">
          <label for="searchInput">بحث</label>
          <input id="searchInput" type="text" placeholder="ابحث بالاسم أو البريد أو القسم..." />
        </div>

        <div class="tool">
          <label for="deptFilter">القسم</label>
          <select id="deptFilter">
            <option value="all">الكل</option>
            <option value="IT">IT</option>
            <option value="CS">CS</option>
            <option value="Cyber Security">Cyber Security</option>
            <option value="Business">Business</option>
          </select>
        </div>

        <div class="tool">
          <label for="statusFilter">الحالة</label>
          <select id="statusFilter">
            <option value="all">الكل</option>
            <option value="نشط">نشط</option>
            <option value="بانتظار الموافقة">بانتظار الموافقة</option>
            <option value="موقوف">موقوف</option>
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
        <table class="table" id="supervisorsTable">
          <thead>
            <tr>
              <th>#</th>
              <th>اسم المشرف</th>
              <th>القسم</th>
              <th>البريد</th>
              <th>الهاتف</th>
              <th>عدد الطلاب</th>
              <th>الحالة</th>
              <th>إجراءات</th>
            </tr>
          </thead>
          <tbody>

            <!-- بيانات تجريبية -->
            <tr data-name="د. أحمد علي"
                data-dept="Cyber Security"
                data-email="ahmad@ucas.edu.ps"
                data-phone="0590000000"
                data-students="12"
                data-status="نشط"
                data-notes="مشرف تدريب ميداني لقسم الأمن السيبراني">
              <td>1</td>
              <td class="fw">د. أحمد علي</td>
              <td>Cyber Security</td>
              <td>ahmad@ucas.edu.ps</td>
              <td>0590000000</td>
              <td>12</td>
              <td><span class="chip chip-success">نشط</span></td>
              <td class="actions">
                <button class="icon-btn" data-action="view">👁</button>
                <button class="icon-btn" data-action="edit">✏️</button>
                <button class="icon-btn" data-action="toggle">⛔</button>
              </td>
            </tr>

            <tr data-name="م. سارة حسن"
                data-dept="IT"
                data-email="sara@ucas.edu.ps"
                data-phone="0560000000"
                data-students="7"
                data-status="بانتظار الموافقة"
                data-notes="قيد اعتماد حساب المشرف">
              <td>2</td>
              <td class="fw">م. سارة حسن</td>
              <td>IT</td>
              <td>sara@ucas.edu.ps</td>
              <td>0560000000</td>
              <td>7</td>
              <td><span class="chip chip-warning">بانتظار الموافقة</span></td>
              <td class="actions">
                <button class="icon-btn" data-action="view">👁</button>
                <button class="icon-btn" data-action="edit">✏️</button>
                <button class="icon-btn" data-action="toggle">⛔</button>
              </td>
            </tr>

            <tr data-name="أ. محمود عمر"
                data-dept="CS"
                data-email="mahmoud@ucas.edu.ps"
                data-phone="0591111111"
                data-students="0"
                data-status="موقوف"
                data-notes="تم الإيقاف مؤقتاً">
              <td>3</td>
              <td class="fw">أ. محمود عمر</td>
              <td>CS</td>
              <td>mahmoud@ucas.edu.ps</td>
              <td>0591111111</td>
              <td>0</td>
              <td><span class="chip chip-danger">موقوف</span></td>
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
