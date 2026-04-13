@extends('front.layout.main')
@section('title',content: 'opportunities')

@section('content')
@section('css')
@endsection
<!-- Page Header -->
<section class="page-header">
  <h1>فرص التدريب</h1>
  <p>
    تصفحي أحدث فرص التدريب الميداني المعتمدة للطلبة في الكلية الجامعية للعلوم التطبيقية (UCAS).
  </p>
</section>

<!-- Filters -->
<section class="filters-container">
  <div class="filters">
    <input type="text" id="searchInput" placeholder="ابحث عن فرصة أو شركة..." />

    <select id="majorFilter">
      <option value="all">كل التخصصات</option>
      <option value="it">تكنولوجيا المعلومات</option>
      <option value="cs">علوم الحاسوب</option>
      <option value="cyber">الأمن السيبراني</option>
      <option value="design">التصميم</option>
      <option value="business">إدارة وأعمال</option>
    </select>

    <select id="typeFilter">
      <option value="all">كل الأنواع</option>
      <option value="onsite">وجاهي</option>
      <option value="remote">عن بعد</option>
      <option value="hybrid">هجين</option>
    </select>
  </div>
</section>

<!-- Cards -->
<section class="cards-container" id="cardsContainer">

  <!-- 1 -->
  <div class="op-card" data-major="design" data-type="onsite">
    <div class="thumb">
      <img src="{{ asset('internship/img/Illiustrations.co_Day_94_ui_ux.png')}}" alt="UI/UX" />
    </div>
    <h3>تدريب UI/UX Designer</h3>
    <div class="company">شركة VisionTech</div>
    <div class="info">📍 غزة - الرمال | ⏳ 120 ساعة</div>
    <p class="desc">
      تدريب عملي على تصميم واجهات المستخدم باستخدام Figma + بناء Prototype وتحسين تجربة المستخدم.
    </p>
     <a href="opportunity-details.html?id=2"class="btn-card"
>عرض التفاصيل</a>
  </div>

  <!-- 2 -->
  <div class="op-card" data-major="it" data-type="remote">
    <div class="thumb">
      <img src="{{ asset('internship/img/web.png')}}" alt="Web Development" />
    </div>
    <h3>تدريب Web Developer (Laravel)</h3>
    <div class="company">شركة CodeLine</div>
    <div class="info">🌍 عن بعد | ⏳ 160 ساعة</div>
    <p class="desc">
      تدريب على تطوير مواقع باستخدام Laravel + REST API + MySQL مع مشاريع حقيقية.
    </p>
     <a href="{{ route('front.home.opportunity-details', ['id' => 1]) }}" class="btn-card">عرض التفاصيل</a>
  </div>

  <!-- 3 -->
  <div class="op-card" data-major="cs" data-type="hybrid">
    <div class="thumb">
      <img src="{{ asset('internship/img/Business_Analyst_(BA).jpg')}}" alt="Data" />
    </div>
    <h3>تدريب Data Analyst</h3>
    <div class="company">شركة Smart Analytics</div>
    <div class="info">📍 غزة | 🌍 جزئي عن بعد | ⏳ 100 ساعة</div>
    <p class="desc">
      تحليل بيانات باستخدام Excel و Power BI + مبادئ SQL و Dashboard احترافية.
    </p>
   <a href="{{ route('front.home.opportunity-details', ['id' => 2]) }}" class="btn-card">عرض التفاصيل</a>
  </div>

  <!-- 4 -->
  <div class="op-card" data-major="cyber" data-type="onsite">
    <div class="thumb">
      <img src="{{ asset('internship/img/cyber.jpg')}}" alt="Cyber Security" />
    </div>
    <h3>تدريب Cyber Security Intern</h3>
    <div class="company">مركز Secure Gaza</div>
    <div class="info">📍 غزة - الجامعة | ⏳ 140 ساعة</div>
    <p class="desc">
      تدريب عملي على أساسيات اختبار الاختراق + OWASP + التعامل مع أدوات الأمن.
    </p>
   <a href="{{ route('front.home.opportunity-details', ['id' => 3]) }}" class="btn-card">عرض التفاصيل</a>
  </div>

  <!-- 5 -->
  <div class="op-card" data-major="it" data-type="onsite">
    <div class="thumb">
      <img src="{{ asset('internship/img/netSupport.jpeg')}}" alt="Networking" />
    </div>
    <h3>تدريب Network Support</h3>
    <div class="company">شركة NetPro</div>
    <div class="info">📍 غزة - تل الهوى | ⏳ 90 ساعة</div>
    <p class="desc">
      تدريب عملي على شبكات Cisco + إعدادات Router/Switch + دعم فني داخل الشركة.
    </p>
    <a href="{{ route('front.home.opportunity-details', ['id' => 4]) }}" class="btn-card">عرض التفاصيل</a>
  </div>

  <!-- 6 -->
  <div class="op-card" data-major="business" data-type="remote">
    <div class="thumb">
      <img src="{{ asset('internship/img/digital.jpeg')}}" alt="Marketing" />
    </div>
    <h3>تدريب Digital Marketing</h3>
    <div class="company">شركة Media Boost</div>
    <div class="info">🌍 عن بعد | ⏳ 80 ساعة</div>
    <p class="desc">
      تدريب على التسويق الرقمي + كتابة محتوى + إدارة صفحات + إعلانات ممولة.
    </p>
   <a href="{{ route('front.home.opportunity-details', ['id' => 5]) }}" class="btn-card">عرض التفاصيل</a>
  </div>

  <!-- 7 -->
  <div class="op-card" data-major="it" data-type="hybrid">
    <div class="thumb">
      <img src="{{ asset('internship/img/app.jpeg')}}" alt="Mobile Development" />
    </div>
    <h3>تدريب Mobile App Developer</h3>
    <div class="company">شركة Appify</div>
    <div class="info">📍 غزة | 🌍 جزئي عن بعد | ⏳ 150 ساعة</div>
    <p class="desc">
      تدريب على بناء تطبيقات موبايل (Android) وربطها بـ API + قواعد بيانات.
    </p>
    <a href="{{ route('front.home.opportunity-details', ['id' => 6]) }}" class="btn-card">عرض التفاصيل</a>
  </div>

  <!-- 8 -->
  <div class="op-card" data-major="cs" data-type="remote">
    <div class="thumb">
      <img src="{{ asset('internship/img/test.jpeg')}}" alt="Software Testing" />
    </div>
    <h3>تدريب Software Testing</h3>
    <div class="company">شركة QA Masters</div>
    <div class="info">🌍 عن بعد | ⏳ 110 ساعة</div>
    <p class="desc">
      تدريب على كتابة Test Cases + أساسيات Automation + توثيق الأخطاء (Bug Reports).
    </p>
   <a href="{{ route('front.home.opportunity-details', ['id' => 7]) }}" class="btn-card">
    عرض التفاصيل
</a>
  </div>

</section>

<!-- Empty State -->
<div class="empty-state" id="emptyState">
  لا توجد فرص مطابقة لبحثك 💔
</div>







@section('js')
@endsection
@endsection
