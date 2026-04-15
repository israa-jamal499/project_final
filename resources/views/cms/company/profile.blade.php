@extends('cms.company.temp')
@section('title','profile')
@section('main-title','بروفايل الشركة')
@section('content')
<div style="max-width:750px">
  <div class="card">
    <div class="card-header">
      <span class="card-title"><i class="fa fa-building" style="color:var(--primary)"></i> ملف الشركة</span>
      <span class="badge {{ ['active'=>'badge-success','pending'=>'badge-warning','inactive'=>'badge-gray'][$company->status] ?? 'badge-gray' }}">
        {{ ['active'=>'نشطة','pending'=>'بانتظار الموافقة','inactive'=>'موقوفة'][$company->status] ?? $company->status }}
      </span>
    </div>

    {{-- Logo + Info --}}
    <div style="display:flex;align-items:center;gap:20px;padding:16px;background:#f8fafc;border-radius:12px;margin-bottom:20px">
      @if($company->image)
        <img src="{{ asset('storage/'.$company->image->path) }}" alt="logo" style="width:80px;height:80px;border-radius:12px;object-fit:cover;border:2px solid var(--border)">
      @else
        <div style="width:80px;height:80px;border-radius:12px;background:var(--primary);color:#fff;display:flex;align-items:center;justify-content:center;font-size:28px;font-weight:700">{{ mb_substr($company->name,0,1) }}</div>
      @endif
      <div>
        <div style="font-size:18px;font-weight:700">{{ $company->name }}</div>
        <div style="color:var(--muted);font-size:13px">{{ $user->email }}</div>
        @if($company->field_name)<div style="font-size:12px;color:var(--muted);margin-top:4px"><i class="fa fa-briefcase" style="color:var(--primary)"></i> {{ $company->field_name }}</div>@endif
        @if($company->city)<div style="font-size:12px;color:var(--muted)"><i class="fa fa-map-marker-alt" style="color:var(--primary)"></i> {{ $company->city->name }}</div>@endif
      </div>
    </div>

    {{-- المشرفون المرتبطون --}}
    @if($company->supervisors->count())
    <div style="margin-bottom:20px">
      <div style="font-size:13px;font-weight:700;margin-bottom:10px;color:var(--muted)"><i class="fa fa-chalkboard-teacher"></i> المشرفون الأكاديميون المرتبطون</div>
      <div style="display:flex;flex-wrap:wrap;gap:10px">
        @foreach($company->supervisors as $sup)
        <div style="background:#f0f7ff;border:1px solid #dbeafe;border-radius:10px;padding:8px 14px;display:flex;align-items:center;gap:10px;font-size:13px">
          <div style="width:34px;height:34px;border-radius:50%;background:#3e7cd7;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px">{{ mb_substr($sup->full_name,0,1) }}</div>
          <div><div style="font-weight:600">{{ $sup->full_name }}</div><div style="font-size:11px;color:var(--muted)">{{ $sup->college->name ?? '' }}</div></div>
          <span class="badge {{ $sup->pivot->status=='active'?'badge-success':'badge-gray' }}">{{ $sup->pivot->status=='active'?'نشط':'موقوف' }}</span>
        </div>
        @endforeach
      </div>
    </div>
    @endif

    <form action="{{ route('company.profile.update') }}" method="POST" enctype="multipart/form-data">@csrf
      {{-- رفع الشعار --}}
      <div class="form-group">
        <label class="form-label"><i class="fa fa-image"></i> تغيير شعار الشركة</label>
        <div style="display:flex;align-items:center;gap:10px">
          <label for="logo" style="display:inline-flex;align-items:center;gap:6px;padding:7px 14px;border-radius:8px;font-size:12px;font-weight:600;background:#fff;border:1px solid var(--border);cursor:pointer;transition:.2s">
            <i class="fa fa-upload"></i> اختر صورة
          </label>
          <input type="file" name="logo" id="logo" accept="image/*" style="display:none">
          <span id="logoName" style="font-size:12px;color:var(--muted)">لم يتم اختيار ملف</span>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label class="form-label">اسم الشركة *</label>
          <div class="input-wrap"><i class="fa fa-building"></i>
            <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">مجال العمل</label>
          <div class="input-wrap"><i class="fa fa-briefcase"></i>
            <input type="text" name="field_name" class="form-control" value="{{ $company->field_name }}">
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label class="form-label">الموقع الإلكتروني</label>
          <div class="input-wrap"><i class="fa fa-globe"></i>
            <input type="url" name="website" class="form-control" value="{{ $company->website }}">
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">المدينة</label>
          <div class="input-wrap"><i class="fa fa-map-marker-alt"></i>
            <select name="cities_id" class="form-control form-select">
              <option value="">اختر</option>
              @foreach($cities as $cities)
              <option value="{{ $cities->id }}" {{ $company->cities_id==$c->id?'selected':'' }}>{{ $cities->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">العنوان</label>
        <div class="input-wrap"><i class="fa fa-location-dot"></i>
          <input type="text" name="address" class="form-control" value="{{ $company->address }}">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">نبذة عن الشركة</label>
        <textarea name="description" class="form-control" rows="3" style="padding:9px 12px">{{ $company->description }}</textarea>
      </div>

      <div style="border-top:1px solid var(--border);padding-top:16px;margin-top:4px">
        <div style="font-size:13px;font-weight:700;color:var(--muted);margin-bottom:14px"><i class="fa fa-lock"></i> تغيير كلمة المرور</div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">كلمة المرور الجديدة</label>
            <div class="input-wrap"><i class="fa fa-lock"></i>
              <input type="password" name="password" class="form-control" placeholder="اتركها فارغة للإبقاء">
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">تأكيد كلمة المرور</label>
            <div class="input-wrap"><i class="fa fa-lock"></i>
              <input type="password" name="password_confirmation" class="form-control">
            </div>
          </div>
        </div>
      </div>

      <div style="display:flex;gap:10px">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> حفظ التغييرات</button>
        <a href="{{ route('company.dashboard') }}" class="btn btn-outline">إلغاء</a>
      </div>
    </form>
  </div>
</div>
<script>
    unction performUpdate(id){
        let formData=new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('street',document.getElementById('street').value);
        formData.append('country_id', document.getElementById('country_id').value);
        storeRoute('/cms/admin/cities_update/'+id,formData);
    }
document.getElementById('logo').addEventListener('change',function(){
  document.getElementById('logoName').textContent = this.files[0]?.name ?? 'لم يتم اختيار ملف';
});
</script>
@endsection

);




