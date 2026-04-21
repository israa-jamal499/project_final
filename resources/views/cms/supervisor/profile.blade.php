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
                        <input type="text" value="{{ $supervisor->name }}">
                    </div>

                    <div class="form-group">
                        <label>البريد الإلكتروني</label>
                        <input type="email" value="{{ $supervisor->user->email ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label>رقم الهاتف</label>
                        <input type="text" value="{{ $supervisor->phone }}">
                    </div>



                    <div class="form-group full-width">
                        <label>اسم الشركة</label>
                        <input type="text" value="{{ $supervisor->user->company->name ?? '' }}" readonly>
                    </div>
                </div>

                <div style="display:flex;gap:10px;margin-top:8px">
        <button type="button" onclick="performUpdate({{ $supervisor->id }})" class="btn btn-primary">Update</button>

                </div>
            </form>
        </section>

    </div>
</main>
<script>
function previewAvatar(input,id){
  if(input.files&&input.files[0]){
    document.getElementById('image').textContent=input.files[0].name;
  }
}
 function performUpdate(id){
        let formData=new FormData();
       // formData.append('image',document.getElementById('image').value);
        formData.append('name',document.getElementById('name').value);
        formData.append('user_id',document.getElementById('user_id').value);
        formData.append('phone',document.getElementById('phone').value);
        formData.append('user_id',document.getElementById('user_id').value);
        storeRoute('/cms/supervisor_update/'+id,formData);
    }
</script>
@endsection
