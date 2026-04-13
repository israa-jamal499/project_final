@extends('cms.supervisor.temp')
@section('title','notifications')

@section('main-title','الاشعارات')
@section('css')
@endsection
@section('content')




<main class="sup-wrap">

  <section class="sup-head">
    <h2>🔔 إشعارات المشرف</h2>
    <p>كل إشعارات التقارير والطلاب تظهر هنا.</p>
  </section>

  <section class="sup-card">

    <div class="notif-tools">
      <button class="btn-soft" id="markAllRead">✅ تحديد الكل كمقروء</button>
      <button class="btn-soft" id="clearNotifs">🗑️ حذف الكل</button>
    </div>

    <div class="notif-list" id="notifList">
      <!-- JS -->
    </div>

  </section>

</main>
@endsection
@section('js')

@endsection


