@extends('cms.admin.parent')

@section('title', 'تفاصيل الفرصة')
@section('main-title', 'تفاصيل الفرصة')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $opportunity->title }}</h3>
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-md-6">
                <table class="table table-bordered">

                    <tr>
                        <th style="width:40%">عنوان الفرصة</th>
                        <td>{{ $opportunity->title }}</td>
                    </tr>

                    <tr>
                        <th>الشركة</th>
                        <td>{{ $opportunity->company->name ?? '—' }}</td>
                    </tr>

                    <tr>
                        <th>المدينة</th>
                        <td>{{ $opportunity->city->name ?? '—' }}</td>
                    </tr>

                    <tr>
                        <th>نوع التدريب</th>
                        <td>
                            @if($opportunity->type === 'online')
                                <span class="badge badge-success">عن بعد</span>
                            @elseif($opportunity->type === 'offline')
                                <span class="badge badge-danger">حضوري</span>
                            @else
                                <span class="badge badge-warning">هجين</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>الحالة</th>
                        <td>
                            @if($opportunity->status === 'opened')
                                <span class="badge badge-success">مفتوحة</span>
                            @elseif($opportunity->status === 'waited')
                                <span class="badge badge-warning">انتظار</span>
                            @else
                                <span class="badge badge-danger">مغلقة</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>الساعات المطلوبة</th>
                        <td>{{ $opportunity->required_hours }} ساعة</td>
                    </tr>

                    <tr>
                        <th>عدد المقاعد</th>
                        <td>{{ $opportunity->seats }}</td>
                    </tr>

                    <tr>
                        <th>المقاعد الممتلئة</th>
                        <td>{{ $opportunity->filled_seats }}</td>
                    </tr>

                    <tr>
                        <th>آخر موعد للتقديم</th>
                        <td>{{ $opportunity->deadline }}</td>
                    </tr>

                    <table class="table table-bordered">

                    <tr>
                        <th style="width:40%">الوصف</th>
                        <td>{{ $opportunity->description }}</td>
                    </tr>

                    <tr>
                        <th>المتطلبات</th>
                        <td>{{ $opportunity->requirements ?? '—' }}</td>
                    </tr>

                    <tr>
                        <th>المزايا</th>
                        <td>{{ $opportunity->benefits ?? '—' }}</td>
                    </tr>

                    <tr>
                        <th>تاريخ الإضافة</th>
                        <td>{{ $opportunity->created_at}}</td>
                    </tr>

                </table>

                </table>

            </div>

        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('admin.opportunities.edit', $opportunity->id) }}"
           class="btn btn-primary">تعديل</a>
        <a href="{{ route('opportunities.index') }}"
           class="btn btn-secondary">رجوع</a>
    </div>
</div>
@endsection
