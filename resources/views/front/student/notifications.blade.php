@extends('front.layout.student')

@section('title','notifications')

@section('content')
<main class="student-page notifications-page">

    <section class="page-title-box">
        <h2>الإشعارات</h2>
        <p>
            هنا يمكنك متابعة جميع التنبيهات المتعلقة بالطلبات، الساعات، التقارير، والرسائل الجديدة.
        </p>
    </section>

    <section class="notifications-actions-bar white-card">
        <div class="notifications-actions-left">
            <button class="btn btn-light" onclick="markAllNotificationsRead()">✓ تحديد الكل كمقروء</button>
            <button class="btn btn-danger" onclick="clearAllNotifications()">🗑 حذف الكل</button>
        </div>
    </section>

    <section class="notifications-list white-card" id="notificationsList">

        <article class="notification-card unread">
            <div class="notification-icon blue">🔔</div>
            <div class="notification-content">
                <h3>تم قبول طلب التدريب الخاص بك</h3>
                <p>تمت الموافقة على طلبك في شركة التقنية الحديثة، يمكنك الآن متابعة ملف التدريب.</p>
                <span>منذ ساعتين</span>
            </div>
            <div class="notification-status">
                <span class="badge badge-info">جديد</span>
            </div>
        </article>

        <article class="notification-card unread">
            <div class="notification-icon green">⏳</div>
            <div class="notification-content">
                <h3>تم اعتماد 8 ساعات تدريب</h3>
                <p>تمت مراجعة واعتماد الساعات الأخيرة المرفوعة من قبلك.</p>
                <span>أمس</span>
            </div>
            <div class="notification-status">
                <span class="badge badge-info">جديد</span>
            </div>
        </article>

        <article class="notification-card">
            <div class="notification-icon orange">📝</div>
            <div class="notification-content">
                <h3>تقريرك الأسبوعي قيد المراجعة</h3>
                <p>تم استلام التقرير بنجاح، وسيتم مراجعته من قبل المشرف قريبًا.</p>
                <span>منذ 3 أيام</span>
            </div>
            <div class="notification-status">
                <span class="badge badge-light-custom">مقروء</span>
            </div>
        </article>

        <article class="notification-card">
            <div class="notification-icon purple">💬</div>
            <div class="notification-content">
                <h3>رسالة جديدة من المشرف الأكاديمي</h3>
                <p>لديك رسالة جديدة بخصوص متابعة التقدم في التدريب.</p>
                <span>منذ 5 أيام</span>
            </div>
            <div class="notification-status">
                <a href="{{ route('front.student.massege') }}" class="btn btn-light btn-sm-link">عرض</a>
            </div>
        </article>

    </section>

</main>
@endsection

@section('css')
<style>
.notifications-page{
    display:grid;
    gap:18px;
}
.notifications-actions-bar{
    padding:16px 20px;
    border-radius:22px;
}
.notifications-actions-left{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}
.notifications-list{
    padding:20px;
    border-radius:22px;
    display:grid;
    gap:14px;
}
.notification-card{
    display:grid;
    grid-template-columns:64px 1fr auto;
    gap:16px;
    align-items:center;
    padding:18px;
    border:1px solid #e8eef7;
    border-radius:18px;
    background:#fff;
    transition:.2s ease;
}
.notification-card:hover{
    transform:translateY(-2px);
    background:#f9fbff;
}
.notification-card.unread{
    border-color:#d6e6ff;
    background:#f8fbff;
}
.notification-icon{
    width:52px;
    height:52px;
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
}
.notification-icon.blue{background:#eaf2ff;}
.notification-icon.green{background:#e8fff1;}
.notification-icon.orange{background:#fff5e8;}
.notification-icon.purple{background:#f3ecff;}

.notification-content h3{
    margin:0 0 6px;
    font-size:17px;
    color:#122033;
}
.notification-content p{
    margin:0 0 8px;
    color:#64748b;
    line-height:1.8;
    font-size:14px;
}
.notification-content span{
    font-size:12px;
    color:#94a3b8;
}
.badge-light-custom{
    background:#f1f5f9;
    color:#475569;
    padding:7px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:800;
}
.btn-sm-link{
    padding:9px 12px;
    font-size:12px;
}
@media (max-width:768px){
    .notification-card{
        grid-template-columns:1fr;
        align-items:flex-start;
    }
}
</style>
@endsection

@section('js')
<script>
function markAllNotificationsRead() {
    document.querySelectorAll('.notification-card.unread').forEach(card => {
        card.classList.remove('unread');
        const status = card.querySelector('.notification-status');
        if (status) {
            status.innerHTML = '<span class="badge-light-custom">مقروء</span>';
        }
    });
}

function clearAllNotifications() {
    const list = document.getElementById('notificationsList');
    list.innerHTML = `
        <div class="empty-box">
            <h3>لا توجد إشعارات</h3>
            <p>سيتم عرض التنبيهات الجديدة هنا عند توفرها.</p>
        </div>
    `;
}
</script>
<style>
.empty-box{
    text-align:center;
    padding:40px 20px;
    color:#64748b;
}
.empty-box h3{
    margin:0 0 8px;
    color:#122033;
}
</style>
@endsection
