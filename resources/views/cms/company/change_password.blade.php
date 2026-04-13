@extends('cms.company.parent')


@section('title','title')

@section('main-title','تغيير كلمة المرور')

{{-- @section('sub-title','sub-title') --}}



@section('styles')

<style>
    .change-password-page {
    padding: 25px 20px 40px;
    background: #f4f6f9;
    min-height: calc(100vh - 120px);
}

.change-password-wrapper {
    max-width: 700px;
    margin: 0 auto;
}

.password-card {
    background: #fff;
    border-radius: 22px;
    padding: 30px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    border: 1px solid #edf1f5;
}

.password-card-header {
    margin-bottom: 24px;
    text-align: right;
}

.password-card-header h2 {
    margin: 0 0 8px;
    color: #2c5aa0;
    font-size: 28px;
    font-weight: 800;
}

.password-card-header p {
    margin: 0;
    color: #6b7280;
    font-size: 14px;
}

.password-form .form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 18px;
}

.password-form .form-group label {
    font-size: 14px;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 8px;
}

.password-form .form-group input {
    height: 50px;
    border: 1px solid #d8e0ea;
    border-radius: 14px;
    padding: 0 16px;
    font-size: 15px;
    background: #fafbfd;
    transition: 0.2s ease;
}

.password-form .form-group input:focus {
    outline: none;
    border-color: #3e7cd7;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(62, 124, 215, 0.10);
}

.password-actions {
    margin-top: 24px;
    display: flex;
    justify-content: flex-start;
}

.save-password-btn {
    min-width: 220px;
    height: 50px;
    border: none;
    border-radius: 14px;
    background: #3e7cd7;
    color: #fff;
    font-size: 16px;
    font-weight: 800;
    cursor: pointer;
    transition: 0.2s ease;
}

.save-password-btn:hover {
    background: #2f69c0;
}

@media (max-width: 768px) {
    .change-password-wrapper {
        max-width: 100%;
    }

    .save-password-btn {
        width: 100%;
    }

    .password-actions {
        justify-content: center;
    }
}
</style>
@endsection



@section('content')
    <!-- Password -->
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

@section('scripts')

@endsection
