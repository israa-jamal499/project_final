@extends('front.layout.main')
@section('title',content: 'Company Register')

@section('content')
@section('css')
@endsection

  <style>
    .register-section {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;

  background: linear-gradient(135deg, #1e3c72, #2a5298);
  position: relative;
  overflow: hidden;
}

/* دوائر الخلفية */

.register-section::before,
.register-section::after {
  content: "";
  position: absolute;
  width: 400px;
  height: 400px;
  border-radius: 50%;
  background: rgba(255,255,255,0.08);
}

.register-section::before {
  top: -120px;
  right: -120px;
}

.register-section::after {
  bottom: -120px;
  left: -120px;
}

/* الكرت */

.register-card {
  background: rgba(255,255,255,0.15);
  backdrop-filter: blur(12px);
padding: 30px; /* بدل 40px */
  width: 360px;
 transition: 0.3s ease;
  border-radius: 20px;

  text-align: center;
  color: white;

  box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}
.register-card:hover {
  transform: translateY(-5px);
}
.register-card h2 {
  margin-bottom: 8px;
  font-size: 22px;
}

.register-card p {
  font-size: 14px;

  opacity: 0.9;
   margin-bottom: 25px;
}

/* الفورم */

.register-card form {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.register-card input[type="text"],
.register-card input[type="email"],
.register-card input[type="tel"],
.register-card input[type="password"] {
  width: 100%;
  height: 46px;
  padding: 0 14px;
  border-radius: 10px;
  border: none;
  outline: none;
  font-size: 14px;
  box-sizing: border-box;
  appearance: none;
  -webkit-appearance: none;
-moz-appearance: none;

}


.register-card button {
  padding: 14px;
  border-radius: 10px;
  border: none;

  color: white;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
  background: #1e78ff;
}

.register-card button:hover {
  opacity: 0.9;
   background: #0f5ed8;
}

.register-card span {
  display: block;
  margin-top: 15px;
  font-size: 14px;
}

.register-card a {
  color: #fff;
  text-decoration: underline;
}

  </style>




<section class="register-section">

  <div class="register-card">

    <h2>🏢 إنشاء حساب شركة</h2>
    <p>أدخلي بيانات الشركة لإنشاء حساب جديد</p>

    <form>

      <input type="text" placeholder="اسم الشركة" required>

      <input type="email" placeholder="البريد الإلكتروني للشركة" required>

      <input type="text" placeholder="اسم المسؤول" required>

      <input type="tel" placeholder="رقم الهاتف" required>

      <input type="password" placeholder="كلمة المرور" required>

      <input type="password" placeholder="تأكيد كلمة المرور" required>

      <button type="submit">إنشاء حساب الشركة</button>

    </form>

    <span>
      لديك حساب؟ <a href="{{ route('front.auth.login') }}">سجل الدخول</a>
    </span>

  </div>

</section>





@section('js')
@endsection
@endsection

