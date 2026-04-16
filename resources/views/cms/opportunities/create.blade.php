@extends('cms.admin.parent')

@section('title', 'اضافة فرصة')
@section('main-title', 'اضافة فرصة')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">اضافة فرصة جديدة</h3>
    </div>

    <form id="createForm" action="{{ route('opportunities.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">

                {{-- العنوان --}}
                <div class="form-group col-md-6">
                    <label for="title">عنوان الفرصة *</label>
                    <input type="text" class="form-control" id="title"
                           name="title" placeholder="عنوان الفرصة" required>
                </div>

                {{-- النوع --}}
                <div class="form-group col-md-6">
                    <label for="type">نوع التدريب *</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="online">عن بعد</option>
                        <option value="offline">حضوري</option>
                        <option value="mixed">هجين</option>
                    </select>
                </div>

                {{-- الشركة -- الإدخال بالاسم والتخزين بالـ ID --}}
                <div class="form-group col-md-6">
                    <label for="company_id">الشركة *</label>
                    <select name="company_id" id="company_id" class="form-control" required>
                        <option value="">اختر الشركة</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}"
                                {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- المدينة -- الإدخال بالاسم والتخزين بالـ ID --}}
                <div class="form-group col-md-6">
                    <label for="city_id">المدينة *</label>
                    <select name="city_id" id="city_id" class="form-control" required>
                        <option value="">اختر المدينة</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}"
                                {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- الساعات المطلوبة --}}
                <div class="form-group col-md-6">
                    <label for="required_hours">الساعات المطلوبة *</label>
                    <input type="number" class="form-control" id="required_hours"
                           name="required_hours" placeholder="عدد الساعات" min="1" required>
                </div>

                {{-- عدد المقاعد --}}
                <div class="form-group col-md-6">
                    <label for="seats">عدد المقاعد *</label>
                    <input type="number" class="form-control" id="seats"
                           name="seats" placeholder="عدد المقاعد" min="1" required>
                </div>

                {{-- آخر موعد للتقديم --}}
                <div class="form-group col-md-6">
                    <label for="deadline">آخر موعد للتقديم *</label>
                    <input type="date" class="form-control" id="deadline"
                           name="deadline" required>
                </div>

                {{-- الحالة --}}
                <div class="form-group col-md-6">
                    <label for="status">الحالة *</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="opened">مفتوحة</option>
                        <option value="closed">مغلقة</option>
                        <option value="waited">بانتظار الموافقة</option>
                    </select>
                </div>

                {{-- الوصف --}}
                <div class="form-group col-md-12">
                    <label for="description">الوصف *</label>
                    <textarea class="form-control" id="description"
                              name="description" rows="3"
                              placeholder="وصف الفرصة" required></textarea>
                </div>

                {{-- المتطلبات --}}
                <div class="form-group col-md-12">
                    <label for="requirements">المتطلبات</label>
                    <textarea class="form-control" id="requirements"
                              name="requirements" rows="3"
                              placeholder="متطلبات الفرصة"></textarea>
                </div>

                {{-- المزايا --}}
                <div class="form-group col-md-12">
                    <label for="benefits">المزايا</label>
                    <textarea class="form-control" id="benefits"
                              name="benefits" rows="3"
                              placeholder="مزايا الفرصة"></textarea>
                </div>

            </div>
        </div>

        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">حفظ</button>
            <a href="{{ route('opportunities.index') }}" class="btn btn-secondary">رجوع</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
function performStore() {
    let formData = new FormData();
    formData.append('title',          document.getElementById('title').value);
    formData.append('type',           document.getElementById('type').value);
    formData.append('company_id',     document.getElementById('company_id').value);
    formData.append('city_id',        document.getElementById('city_id').value);
    formData.append('required_hours', document.getElementById('required_hours').value);
    formData.append('seats',          document.getElementById('seats').value);
    formData.append('deadline',       document.getElementById('deadline').value);
    formData.append('status',         document.getElementById('status').value);
    formData.append('description',    document.getElementById('description').value);
    formData.append('requirements',   document.getElementById('requirements').value);
    formData.append('benefits',       document.getElementById('benefits').value);

    store('/opportunities', formData);
}
</script>
@endsection
