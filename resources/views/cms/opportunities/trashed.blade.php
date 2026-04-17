@extends('cms.admin.temp')

@section('title', 'الفرص')
@section('main-title', 'الفرص المحذوفة')

@section('styles')
<style>
.chip { padding: 3px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; }
.chip-success { background: #d4edda; color: #155724; }
.chip-warning { background: #fff3cd; color: #856404; }
.chip-danger  { background: #f8d7da; color: #721c24; }
</style>
@endsection

@section('content')
<main class="page" data-page="opportunities">

    {{-- رسالة النجاح --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- زر الإضافة --}}
    <div class="page-actions" style="margin-bottom: 15px">

        <a href="{{ route('opportunities.index') }}" class="btn btn-primary">
            رجوع
        </a>
        <a href="{{ route('opportunities_forceAll') }}" class="btn btn-danger">
         حذف الجميع
        </a>
    </div>
    <div class="table-wrap">
        <table class="table" id="oppsTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان الفرصة</th>
                    <th>وصف الفرصة</th>
                    <th>نوع الفرصة</th>
                    <th>الساعات المطلوبة</th>
                    <th>عدد المقاعد</th>
                    <th>المقاعد الممتلئة</th>
                    <th>آخر موعد</th>
                    <th>الحالة</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($opportunities as $opportunity)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw">{{ $opportunity->title }}</td>
                    <td>{{ Str::limit($opportunity->description, 50) }}</td>
                    <td>
                        @if($opportunity->type === 'online')
                            <span class="chip chip-success">عن بعد</span>
                        @elseif($opportunity->type === 'offline')
                            <span class="chip chip-danger">حضوري</span>
                        @else
                            <span class="chip chip-warning">هجين</span>
                        @endif
                    </td>
                    <td>{{ $opportunity->required_hours }} ساعة</td>
                    <td>{{ $opportunity->seats }}</td>
                    <td>{{ $opportunity->filled_seats }}</td>
                    <td>{{ $opportunity->deadline }}</td>
                    <td>
                        @if($opportunity->status === 'opened')
                            <span class="chip chip-success">مفتوحة</span>
                        @elseif($opportunity->status === 'waited')
                            <span class="chip chip-warning">انتظار</span>
                        @else
                            <span class="chip chip-danger">مغلقة</span>
                        @endif
                    </td>
                    <td class="actions">

                        {{-- عرض --}}
                        <a href="{{ route('opportunities_restore',$opportunity->id) }}"
                           class="icon-btn" title="استعادة">استعادة</a>

                        {{-- تعديل --}}
                        <a href="{{ route('opportunities_force',$opportunity->id) }}"
                           class="icon-btn" title="حذف نهائي">حذف نهائي</a>


                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">لا توجد فرص بعد</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</main>
@endsection

@section('scripts')
<script>
function performDestroy(id , reference) {


    confirmDestroy('/opportunities/'+id , reference);
}
</script>
@endsection
