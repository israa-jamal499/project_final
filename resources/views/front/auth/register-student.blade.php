@extends('front.layout.main')
@section('title',content: 'Student Register')

@section('content')
@section('css')
@endsection
  <style>
  /* ===== Register Page ===== */

.register-section {
  min-height: 90vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(135deg, #1e4fa3, #0f2b5b);
  padding: 40px 20px;
}

.register-card {
  width: 100%;
  max-width: 420px;
  background: rgba(255,255,255,0.15);
  backdrop-filter: blur(14px);
  padding: 35px;
  border-radius: 20px;
  text-align: center;
  color: white;
  box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}

.register-card h2 {
  margin-bottom: 8px;
}

.register-card p {
  opacity: 0.9;
  margin-bottom: 20px;
}

/* Inputs */

.input-group {
  margin-bottom: 14px;
}

.input-group input {
  width: 100%;
  padding: 14px;
  border-radius: 10px;
  border: none;
  outline: none;
  font-size: 15px;
  box-sizing: border-box;
}

/* Button */

.register-btn {
  width: 100%;
  padding: 14px;
  border-radius: 12px;
  border: none;
  background: rgb(15, 79, 152);
  color: #0b101a;
  font-weight: bold;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
}

.register-btn:hover {
  background: #0b1e45;
  transform: translateY(-2px);
}

/* Login link */

.login-link {
  margin-top: 18px;
  font-size: 14px;
}

.login-link a {
  color: #cfe3ff;
  text-decoration: none;
  font-weight: bold;
}

.login-link a:hover {
  text-decoration: underline;
}

  </style>



<section class="register-section">

  <div class="register-card">

    <h2>إنشاء حساب طالب 🎓</h2>
    <p>املئي البيانات لإنشاء حساب جديد</p>

    <form class="register-form">

      <div class="input-group">
        <input type="text" placeholder="الاسم الكامل" required>
      </div>

      <div class="input-group">
        <input type="email" placeholder="البريد الإلكتروني" required>
      </div>
      <div class="input-group">
        <input type="email" placeholder="الرقم الجامعي" required>
      </div>
     <div class="input-group">
        <input type="email" placeholder="الكلية" required>
      </div>
      <div class="input-group">
        <input type="text" placeholder="التخصص" required>
      </div>

      <div class="input-group">
        <input type="password" placeholder="كلمة المرور" required>
      </div>

      <div class="input-group">
        <input type="password" placeholder="تأكيد كلمة المرور" required>
      </div>

      <button type="submit" class="register-btn">
        إنشاء الحساب
      </button>

    </form>

    <p class="login-link">
      لديك حساب بالفعل؟
      <a href="{{ route('front.auth.login') }}">سجل الدخول</a>
    </p>

  </div>

</section>



@section('js')
@endsection
@endsection
