@extends('front.layout.main')
@section('title',content: 'login')

@section('content')
@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700&display=swap">
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .login-link {
    color: #ffffff; /* غيري اللون هون */
    font-weight: 500;
    text-decoration: none;
}

.login-link:hover {
    color: #ffd700; /* لون عند المرور */
}
</style>
@endsection

<section class="login-page">

  <div class="login-card">

    <h2>مرحبًا بعودتك 👋</h2>
    <p class="login-subtitle">
      سجل الدخول لمتابعة فرص التدريب
    </p>

    <form>

      <div class="input-group">
        <i class="fa fa-envelope"></i>
        <input type="email" placeholder="البريد الإلكتروني" required>
      </div>

      <div class="input-group">
        <i class="fa fa-lock"></i>
        <input type="password" placeholder="كلمة المرور" required>
      </div>

       <div class="social-auth-links text-center mb-3">

       <a href="" class="btn btn-danger">
    تسجيل الدخول باستخدام جوجل
</a>

<a href="" class="btn btn-primary">
    تسجيل الدخول باستخدام فيسبوك
</a>
      </div>
      <!-- /.social-auth-links -->

     <p class="mb-1">
  <a href="{{ route('front.auth.forgot-password') }}" class="login-link">نسيت كلمة المرور</a>
</p>

<p class="mb-0">
  <a href="{{ route('front.auth.register-new') }}" class="login-link">تسجيل جديد</a>
</p>
    </div>
  </div>

    </form>

  </div>

</section>



@section('js')
@endsection
@endsection
