@extends('cms.supervisor.parent')

@section('title','تغيير كلمة المرور')

@section('content')
<main class="change-password-page">
    <div class="change-password-wrapper">

        <section class="password-card">
            <div class="password-card-header">
                <h2>🔒 تغيير كلمة المرور</h2>
                <p>أدخلي كلمة المرور الحالية ثم كلمة المرور الجديدة.</p>
            </div>

            <form class="password-form">
                <div class="form-group">
                    <label>كلمة المرور الحالية</label>
                    <input type="password" placeholder="أدخلي كلمة المرور الحالية">
                </div>

                <div class="form-group">
                    <label>كلمة المرور الجديدة</label>
                    <input type="password" placeholder="أدخلي كلمة المرور الجديدة">
                </div>

                <div class="form-group">
                    <label>تأكيد كلمة المرور الجديدة</label>
                    <input type="password" placeholder="أعيدي إدخال كلمة المرور الجديدة">
                </div>

                <div class="password-actions">
                    <button type="submit" class="save-password-btn">💾 حفظ كلمة المرور</button>
                </div>
            </form>
        </section>

    </div>
</main>
@endsection
