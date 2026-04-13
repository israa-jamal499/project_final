@extends('front.layout.main')
@section('title',content: 'opportunities details')

@section('content')
@section('css')
@endsection


<!-- Page Header -->
<section class="page-header">
  <h1>تفاصيل فرصة التدريب</h1>
  <p>
    اقرأ تفاصيل الفرصة قبل التقديم. تأكدي أنها مناسبة لتخصصك وساعات التدريب المطلوبة.
  </p>
</section>

<!-- Opportunity Details Layout -->
<section class="details-layout">

  <!-- LEFT: Main Content -->
  <div class="details-main">

    <!-- Opportunity Cover -->
    <div class="details-cover">
      <img src="{{ asset('internship/img/webDev.jpeg') }}" alt="Opportunity Cover" />
    </div>

    <!-- Title + Company -->
    <div class="details-title">
      <h2 id="opTitle">تدريب Web Developer (Laravel)</h2>
      <div class="details-company">
        <span id="opCompany">شركة CodeLine</span>
        <span class="badge badge-type" id="opType">عن بعد</span>
        <span class="badge badge-status" id="opStatus">مفتوحة</span>
      </div>
    </div>

    <!-- Quick Info -->
    <div class="details-info-grid">
      <div class="info-box">
        <div class="label">📍 الموقع</div>
        <div class="value" id="opLocation">عن بعد</div>
      </div>

      <div class="info-box">
        <div class="label">⏳ عدد الساعات</div>
        <div class="value" id="opHours">160 ساعة</div>
      </div>

      <div class="info-box">
        <div class="label">🎓 التخصص المطلوب</div>
        <div class="value" id="opMajor">تكنولوجيا المعلومات</div>
      </div>

      <div class="info-box">
        <div class="label">📅 تاريخ النشر</div>
        <div class="value" id="opDate">2026-02-09</div>
      </div>
    </div>

    <!-- Description -->
    <div class="details-section">
      <h3>📌 وصف الفرصة</h3>
      <p id="opDesc">
        فرصة تدريب ميداني لطلبة الكلية الجامعية للعلوم التطبيقية، تهدف إلى تدريب الطالب عملياً على تطوير تطبيقات الويب
        باستخدام Laravel و MySQL، وبناء REST API وربط الواجهة الأمامية مع النظام الخلفي.
      </p>
    </div>

    <!-- Requirements -->
    <div class="details-section">
      <h3>✅ المتطلبات</h3>
      <ul id="opRequirements">
        <li>معرفة أساسية بلغة PHP.</li>
        <li>معرفة بأساسيات Laravel (Routes, Controllers, Views).</li>
        <li>فهم قواعد البيانات MySQL.</li>
        <li>الالتزام بالحضور/المهام حسب خطة التدريب.</li>
      </ul>
    </div>

    <!-- Responsibilities -->
    <div class="details-section">
      <h3>🧩 المهام المطلوبة</h3>
      <ul id="opTasks">
        <li>بناء صفحات Backend وربطها مع قاعدة البيانات.</li>
        <li>إنشاء CRUD لموديولات بسيطة.</li>
        <li>كتابة API وربطها مع Front-End.</li>
        <li>تسليم تقارير أسبوعية عن الإنجاز.</li>
      </ul>
    </div>

    <!-- Skills -->
    <div class="details-section">
      <h3>⭐ المهارات التي ستكتسبها</h3>

      <div class="skills-list" id="opSkills">
        <span class="skill">Laravel</span>
        <span class="skill">MySQL</span>
        <span class="skill">REST API</span>
        <span class="skill">GitHub</span>
        <span class="skill">Clean Code</span>
      </div>
    </div>

    <!-- Company Info -->
    <div class="details-section">
      <h3>🏢 معلومات عن الشركة</h3>

      <div class="company-card">
        <div class="company-logo">
          <img src="{{ asset('internship/img/codelog.png') }}" alt="Company Logo" />
        </div>

        <div class="company-data">
          <h4 id="companyName">شركة CodeLine</h4>
          <p id="companyAbout">
            شركة تقنية تعمل على تطوير أنظمة ويب وتطبيقات متخصصة، وتستقبل متدربين من الكلية الجامعية للعلوم التطبيقية.
          </p>

          <div class="company-meta">
            <span>📧 البريد: <strong id="companyEmail">info@codeline.ps</strong></span>
            <span>🌐 الموقع: <strong id="companyWebsite">www.codeline.ps</strong></span>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- RIGHT: Sidebar -->
  <aside class="details-sidebar">

    <!-- Apply Card -->
    <div class="sidebar-card apply-card">
      <h3>التقديم على الفرصة</h3>
      <p>
        للتقديم يجب تسجيل الدخول كطالب أولاً.
      </p>

      <button class="btn-primary" id="applyBtn">تقديم الآن</button>

      <div class="apply-note">
        ⚠️ سيتم إرسال الطلب للشركة + للمشرف الأكاديمي للمراجعة.
      </div>
    </div>

    <!-- Supervisor Note -->
    <div class="sidebar-card">
      <h3>ملاحظة من الكلية</h3>
      <p>
        يجب أن تكون الفرصة ضمن ساعات التدريب المعتمدة، وسيتم متابعة التقارير الأسبوعية خلال فترة التدريب.
      </p>
    </div>

    <!-- Similar Opportunities -->
    <!-- Similar Opportunities -->
<div class="sidebar-card">
  <h3>فرص مشابهة</h3>

  <!-- 1 -->
  <div class="mini-op">
    <img src="{{ asset('internship/img/webDev.jpeg') }}" alt="mini" />
    <div>
      <h4>Web Developer (Laravel)</h4>
<a href="{{ route('front.home.opportunity-details', ['id' => 1]) }}" class="btn-card">عرض التفاصيل</a>
    </div>
  </div>

  <!-- 2 -->
  <div class="mini-op">
    <img src="{{ asset('internship/img/Illiustrations.co_Day_94_ui_ux.png') }}" alt="mini" />
    <div>
      <h4>UI/UX Designer</h4>
 <a href="{{ route('front.home.opportunity-details', ['id' => 2]) }}" class="btn-card">عرض التفاصيل</a>
    </div>
  </div>

  <!-- 3 -->
  <div class="mini-op">
    <img src="{{ asset('internship/img/cyber.jpg') }}" alt="mini" />
    <div>
      <h4>Cyber Security Intern</h4>
<a href="{{ route('front.home.opportunity-details', ['id' => 3]) }}" class="btn-card">عرض التفاصيل</a>
    </div>
  </div>

  <!-- 4 -->
  <div class="mini-op">
    <img src="{{ asset('internship/img/test.jpeg') }}" alt="mini" />
    <div>
      <h4>Software Testing</h4>
  <a href="{{ route('front.home.opportunity-details', ['id' => 4]) }}" class="btn-card">عرض التفاصيل</a>
    </div>
  </div>

  <!-- 5 -->
  <div class="mini-op">
    <img src="{{ asset('internship/img/netSupport.jpeg') }}" alt="mini" />
    <div>
      <h4>Network Support</h4>
    <a href="{{ route('front.home.opportunity-details', ['id' => 5]) }}" class="btn-card">عرض التفاصيل</a>
    </div>
  </div>

  <!-- 6 -->
  <div class="mini-op">
    <img src="{{ asset('internship/img/digital.jpeg') }}" alt="mini" />
    <div>
      <h4>Digital Marketing</h4>

  <a href="{{ route('front.home.opportunity-details', ['id' => 6]) }}" class="btn-card">عرض التفاصيل</a>
    </div>
  </div>

  <!-- 7 -->
  <div class="mini-op">
    <img src="{{ asset('internship/img/webDev.jpeg') }}" alt="mini" />
    <div>
      <h4>Mobile App Developer</h4>
      <a href="{{ route('front.home.opportunity-details', ['id' => 7]) }}" class="btn-card">عرض التفاصيل</a>
    </div>
  </div>

  <!-- 8 -->
  <div class="mini-op">
    <img src="{{ asset('internship/img/Business_Analyst_(BA).jpg') }}" alt="mini" />
    <div>
      <h4>Data Analyst</h4>
    <a href="{{ route('front.home.opportunity-details', ['id' => 8]) }}" class="btn-card">عرض التفاصيل</a>
</a>
    </div>
  </div>

</div>


  </aside>

</section>





@section('js')
@endsection
@endsection
