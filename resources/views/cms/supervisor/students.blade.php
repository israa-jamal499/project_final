@extends('cms.supervisor.parent')


@section('title','student')

@section('main-title','الطلاب')

{{-- @section('sub-title','sub-title') --}}



@section('styles')




<style>
  :root{
      --bg:#f6f8fc;
      --card:#ffffff;
      --text:#1f2a37;
      --muted:#6b7280;
      --primary:#3e7cd7;
      --primary-soft:#e9f1ff;
      --border:#e6edf5;
      --shadow:0 12px 30px rgba(15, 23, 42, .08);
      --shadow2:0 6px 14px rgba(15, 23, 42, .06);
      --radius:16px;
      --green:#12b76a;
      --orange:#f79009;
      --red:#f04438;
    }

    *{box-sizing:border-box}
    body{
      margin:0;
      font-family: Tahoma, Arial, sans-serif;
      background:var(--bg);
      color:var(--text);
    }

    /* ====== (اختياري) لو عندك Topbar جاهز تجاهلي الجزء هذا ====== */


    /* ====== Layout ====== */
    .admin-main{
      width:min(1100px, 92%);
      margin:18px auto 40px;
    }

    /* شريط تنقّل داخلي مثل اللي بالصورة */
    .subnav{
      display:flex;
      align-items:center;
      justify-content:flex-end;
      gap:18px;
      padding:12px 0;
      color:var(--muted);
      font-size:14px;
    }
    .subnav a{
      text-decoration:none;
      color:var(--primary);
      font-weight:700;
      display:flex;
      align-items:center;
      gap:8px;
      padding:8px 10px;
      border-radius:10px;
    }
    .subnav a:hover{background:var(--primary-soft)}
    .subnav .active{
      background:var(--primary-soft);
      border:1px solid #d8e7ff;
    }

    .page-head{
      background:var(--card);
      border:1px solid var(--border);
      box-shadow:var(--shadow2);
      border-radius:18px;
      padding:18px 18px;
      display:flex;
      align-items:flex-start;
      justify-content:space-between;
      gap:14px;
    }
    .page-head h2{
      margin:0;
      font-size:20px;
      font-weight:900;
    }
    .page-head p{
      margin:6px 0 0;
      color:var(--muted);
      font-size:13px;
    }

    .head-actions{
      display:flex;
      gap:10px;
      flex-wrap:wrap;
      justify-content:flex-start;
    }
    .btn{
      border:0;
      cursor:pointer;
      border-radius:12px;
      padding:10px 12px;
      font-weight:800;
      font-size:13px;
      display:inline-flex;
      align-items:center;
      gap:8px;
      transition:.2s;
    }
    .btn-primary{background:var(--primary); color:#fff; box-shadow:0 10px 18px rgba(62,124,215,.22)}
    .btn-primary:hover{filter:brightness(.96)}
    .btn-soft{background:var(--primary-soft); color:var(--primary); border:1px solid #d8e7ff}
    .btn-soft:hover{filter:brightness(.98)}
    .btn-danger{background:#ffe4e2; color:var(--red); border:1px solid #ffd1cc}
    .btn-danger:hover{filter:brightness(.98)}

    /* ====== Summary cards ====== */
    .cards{
      margin-top:14px;
      display:grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap:12px;
    }
    .stat{
      background:var(--card);
      border:1px solid var(--border);
      box-shadow:var(--shadow2);
      border-radius:18px;
      padding:14px 14px;
      min-height:92px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:12px;
    }
    .stat .label{
      color:var(--muted);
      font-size:13px;
      font-weight:800;
      display:flex;
      align-items:center;
      gap:8px;
    }
    .stat .value{
      font-size:26px;
      font-weight:900;
      color:var(--primary);
    }

    /* ====== Tool bar ====== */
    .panel{
      margin-top:14px;
      background:var(--card);
      border:1px solid var(--border);
      box-shadow:var(--shadow2);
      border-radius:18px;
      padding:12px;
    }

    .tools{
      display:flex;
      flex-wrap:wrap;
      gap:10px;
      align-items:center;
      justify-content:space-between;
      margin-bottom:10px;
    }
    .filters{
      display:flex;
      gap:10px;
      flex-wrap:wrap;
      align-items:center;
    }
    .input, .select{
      border:1px solid var(--border);
      border-radius:12px;
      padding:10px 12px;
      outline:none;
      background:#fff;
      min-width:220px;
      font-size:13px;
    }
    .select{min-width:170px}
    .input:focus,.select:focus{border-color:#cfe0ff; box-shadow:0 0 0 4px rgba(62,124,215,.12)}
    .meta-bar{
      color:var(--muted);
      font-size:13px;
      font-weight:700;
    }

    /* ====== Table ====== */
    .table-wrap{
      overflow:auto;
      border-radius:14px;
      border:1px solid var(--border);
    }
    table{
      width:100%;
      border-collapse:collapse;
      min-width:780px;
    }
    thead th{
      background:#f3f7ff;
      color:#334155;
      font-size:13px;
      text-align:right;
      padding:12px 12px;
      border-bottom:1px solid var(--border);
      white-space:nowrap;
    }
    tbody td{
      padding:12px 12px;
      border-bottom:1px solid #f0f3f8;
      font-size:13px;
      vertical-align:middle;
      white-space:nowrap;
    }
    tbody tr:hover{background:#fbfdff}

    .badge{
      display:inline-flex;
      align-items:center;
      gap:6px;
      padding:6px 10px;
      border-radius:999px;
      font-weight:900;
      font-size:12px;
      border:1px solid transparent;
    }
    .b-active{background:#e9fbf2; color:var(--green); border-color:#c9f3dd}
    .b-paused{background:#fff3e0; color:#b54708; border-color:#ffe0b5}
    .b-pending{background:#eef4ff; color:var(--primary); border-color:#d8e7ff}

    .actions{
      display:flex;
      gap:8px;
      justify-content:flex-start;
    }
    .icon-btn{
      border:1px solid var(--border);
      background:#fff;
      border-radius:12px;
      padding:8px 10px;
      cursor:pointer;
      font-weight:900;
      font-size:12px;
    }
    .icon-btn:hover{background:#f7fbff}
    .icon-btn.primary{border-color:#d8e7ff; background:var(--primary-soft); color:var(--primary)}
    .icon-btn.danger{border-color:#ffd1cc; background:#ffe4e2; color:var(--red)}

    /* ====== Dialog (Modal) ====== */
    dialog{
      width:min(560px, 92vw);
      border:0;
      border-radius:18px;
      padding:0;
      box-shadow:var(--shadow);
    }
    dialog::backdrop{
      background:rgba(15,23,42,.45);
      backdrop-filter: blur(2px);
    }
    .dlg{
      padding:14px 14px 12px;
    }
    .dlg-head{
      display:flex;
      align-items:flex-start;
      justify-content:space-between;
      gap:10px;
      padding:14px 14px 0;
    }
    .dlg-head h3{
      margin:0;
      font-size:18px;
      font-weight:900;
    }
    .dlg-head p{
      margin:6px 0 0;
      color:var(--muted);
      font-size:13px;
    }
    .dlg-close{
      border:1px solid var(--border);
      background:#fff;
      width:38px;height:38px;
      border-radius:12px;
      cursor:pointer;
      font-size:18px;
      font-weight:900;
    }
    .form{
      padding:12px 14px 14px;
      display:grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap:10px;
    }
    .field{display:flex; flex-direction:column; gap:6px}
    .field label{font-size:12px; color:#334155; font-weight:900}
    .field input, .field select{
      border:1px solid var(--border);
      border-radius:12px;
      padding:10px 12px;
      outline:none;
      font-size:13px;
      background:#fff;
    }
    .field input:focus, .field select:focus{border-color:#cfe0ff; box-shadow:0 0 0 4px rgba(62,124,215,.12)}
    .span2{grid-column: 1 / -1}
    .dlg-foot{
      display:flex;
      justify-content:flex-start;
      gap:10px;
      padding:0 14px 14px;
    }

    /* ====== Responsive ====== */
    @media (max-width: 920px){
      .cards{grid-template-columns: repeat(2, minmax(0,1fr));}
    }
    @media (max-width: 520px){
      .cards{grid-template-columns: 1fr;}
      .form{grid-template-columns:1fr;}
      .input{min-width: 100%;}
    }
</style>
@endsection
@section('content')
  <main class="admin-main">



    <!-- Header -->
    <section class="page-head">
      <div>
        <h2>إدارة الطلاب 👩‍🎓</h2>
        <p>ابحثي/فلترّي بسرعة، وأضيفي أو عدّلي بيانات الطلاب من نفس الصفحة.</p>
      </div>



      <div class="head-actions">
        <button class="btn btn-soft" id="seedBtn">✨ تعبئة بيانات تجريبية</button>
        <button class="btn btn-primary" id="addBtn">➕ إضافة طالب</button>
      </div>
    </section>

    <!-- Stats -->
    <section class="cards" aria-label="إحصائيات الطلاب">
      <div class="stat">
        <div class="label">👥 إجمالي الطلاب</div>
        <div class="value" id="stTotal">0</div>
      </div>
      <div class="stat">
        <div class="label">✅ نشط</div>
        <div class="value" id="stActive">0</div>
      </div>
      <div class="stat">
        <div class="label">⏸️ موقوف</div>
        <div class="value" id="stPaused">0</div>
      </div>
      <div class="stat">
        <div class="label">⏳ قيد المراجعة</div>
        <div class="value" id="stPending">0</div>
      </div>
    </section>
     {{-- <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>الفرص المنشورة</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="route('cms.Company.opportunities')" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>طلبات جديدة</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('cms.Company.applications') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>متدربين حاليين</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('cms.Company.interns') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>تقييمات مكتملة</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('cms.Company.evaluation') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

    </section> --}}
    <!-- Panel -->
    <section class="panel">
      <div class="tools">
        <div class="filters">
          <input class="input" id="searchInput" type="search" placeholder="ابحثي بالاسم / الرقم الجامعي / الشركة..." />
          <select class="select" id="statusFilter">
            <option value="all">كل الحالات</option>
            <option value="active">نشط</option>
            <option value="paused">موقوف</option>
            <option value="pending">قيد المراجعة</option>
          </select>
          <select class="select" id="companyFilter">
            <option value="all">كل الشركات</option>
          </select>
        </div>
        <div class="meta-bar">
          المعروض: <span id="shownCount">0</span> من <span id="allCount">0</span>
        </div>
      </div>

      <div class="table-wrap">
       <table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>الطالب</th>
            <th>الرقم الجامعي</th>
            <th>الشركة</th>
            <th>الحالة</th>
            <th>إجراءات</th>
        </tr>
    </thead>

    {{-- <tbody>
        @foreach($students as $index => $student)
        <tr>
            <td>{{ $index + 1 }}</td>

            <td>{{ $student->name }}</td>

            <td>{{ $student->university_id }}</td>

            <td>{{ $student->company->name ?? '-' }}</td>

            <td>
                @if($student->status == 'active')
                    <span class="badge bg-success">نشط</span>
                @elseif($student->status == 'pending')
                    <span class="badge bg-warning">قيد المراجعة</span>
                @elseif($student->status == 'stopped')
                    <span class="badge bg-secondary">موقوف</span>
                @endif
            </td>

            <td>
                <!-- عرض -->
                <a href="{{ route('supervisor.student.profile', $student->id) }}"
                   class="btn btn-sm btn-info">
                    👁 عرض
                </a>

                <!-- تعديل -->
                <a href="{{ route('students.edit', $student->id) }}"
                   class="btn btn-sm btn-primary">
                    ✏️ تعديل
                </a>

                <!-- تفعيل / إيقاف -->
                <form action="{{ route('students.toggle', $student->id) }}"
                      method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')

                    <button class="btn btn-sm {{ $student->status == 'active' ? 'btn-warning' : 'btn-success' }}">
                        {{ $student->status == 'active' ? 'إيقاف' : 'تفعيل' }}
                    </button>
                </form>

                <!-- حذف -->
                <form action=""
                      {{-- method="POST" style="display:inline;"> --}}
                    {{-- @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-danger"
                            onclick="return confirm('هل أنت متأكد؟')">
                        🗑 حذف
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody> --}}
</table>
      </div>

      <div style="margin-top:10px; display:flex; justify-content:flex-start;">
        <button class="btn btn-soft" id="clearBtn">🧹 مسح البيانات (localStorage)</button>
      </div>
    </section>

  </main>





@endsection

@section('scripts')

@endsection




