@extends('cms.supervisor.parent')

@section('title','الملف الشخصي')

@section('content')
<main class="supervisor-profile-page">

    <div class="profile-wrapper">

        <!-- Hero Card -->
        <section class="profile-hero-card">
            <div class="profile-hero-info">
                <div class="profile-hero-text">
                    <h2>أهلاً، إسراء 👋</h2>
                    <p>مشرف تدريب - شركة التقنية</p>
                    <span class="profile-badge">لوحة المشرف</span>
                </div>

                <div class="profile-hero-avatar">
                    <img src="{{ asset('images/user.png') }}" alt="Supervisor">
                </div>
            </div>
        </section>

        <!-- Personal Info Card -->
        <section class="profile-main-card">
            <div class="card-header-custom">
                <h3>👤 المعلومات الشخصية</h3>
                <p>يمكنك تعديل بياناتك الأساسية من هنا</p>
            </div>

            <form class="profile-form">
                <div class="form-grid">
                    <div class="form-group">
                        <label>الاسم الكامل</label>
                        <input type="text" value="إسراء كسكين">
                    </div>

                    <div class="form-group">
                        <label>البريد الإلكتروني</label>
                        <input type="email" value="israa@email.com">
                    </div>

                    <div class="form-group">
                        <label>رقم الهاتف</label>
                        <input type="text" value="0590000000">
                    </div>

                    <div class="form-group">
                        <label>المسمى الوظيفي</label>
                        <input type="text" value="مشرف تدريب">
                    </div>

                    <div class="form-group full-width">
                        <label>اسم الشركة</label>
                        <input type="text" value="شركة التقنية">
                    </div>
                </div>

                <div class="profile-actions">
                    <button type="submit" class="save-btn">💾 حفظ التعديلات</button>
                </div>
            </form>
        </section>

    </div>
</main>
@endsection
