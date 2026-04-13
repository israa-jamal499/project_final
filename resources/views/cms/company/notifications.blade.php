@extends('cms.company.temp')
@section('title','notifications')
@section('main-title','الاشعارات')
@section('content')

<style>
.company-notifications-page {
    width: 92%;
    margin: 25px auto;
    direction: rtl;
    text-align: right;
}

/* header */
.company-notifications-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.company-notifications-title {
    margin: 0;
    color: #1c2b4a;
    font-size: 22px;
    font-weight: 700;
}

.company-notifications-clear {
    background: #ef4444;
    color: #fff;
    border: none;
    padding: 10px 14px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
}

.company-notifications-clear:hover {
    background: #dc2626;
}

/* card */
.company-notification-card {
    background: #fff;
    border-radius: 14px;
    padding: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    margin-bottom: 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* unread */
.company-notification-unread {
    border-right: 5px solid #3e7cd7;
    background: #f8fbff;
}

/* content */
.company-notification-content {
    display: flex;
    gap: 12px;
    align-items: center;
}

/* icon */
.company-notification-icon {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    background: #eef3ff;
}

/* text */
.company-notification-text h4 {
    margin: 0;
    font-size: 15px;
    color: #1c2b4a;
}

.company-notification-text p {
    margin: 3px 0 0;
    font-size: 13px;
    color: #6b7280;
}

.company-notification-time {
    font-size: 12px;
    color: #9ca3af;
    margin-top: 4px;
}

/* buttons */
.company-notification-actions {
    display: flex;
    gap: 8px;
}

.company-notification-btn {
    border: none;
    padding: 7px 10px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 12px;
}

.company-notification-read {
    background: #3e7cd7;
    color: #fff;
}

.company-notification-delete {
    background: #ef4444;
    color: #fff;
}

/* empty */
.company-notification-empty {
    text-align: center;
    margin-top: 50px;
    color: #6b7280;
    display: none;
}
</style>

<div class="company-notifications-page">

    <div class="company-notifications-header">
        <h2 class="company-notifications-title">الإشعارات</h2>
        <button class="company-notifications-clear" onclick="clearAll()">حذف الكل</button>
    </div>

    <!-- notification -->
    <div class="company-notification-card company-notification-unread">

        <div class="company-notification-content">
            <div class="company-notification-icon">📩</div>

            <div class="company-notification-text">
                <h4>طلب تدريب جديد</h4>
                <p>قام الطالب محمد بالتقديم على فرصة Front-End</p>
                <div class="company-notification-time">قبل 5 دقائق</div>
            </div>
        </div>

        <div class="company-notification-actions">
            <button class="company-notification-btn company-notification-read" onclick="markRead(this)">تمت القراءة</button>
            <button class="company-notification-btn company-notification-delete" onclick="deleteNotif(this)">حذف</button>
        </div>

    </div>

    <div class="company-notification-card company-notification-unread">

        <div class="company-notification-content">
            <div class="company-notification-icon">🎓</div>

            <div class="company-notification-text">
                <h4>انتهاء تدريب</h4>
                <p>انتهى تدريب الطالب أحمد، يرجى إضافة تقييم</p>
                <div class="company-notification-time">قبل ساعة</div>
            </div>
        </div>

        <div class="company-notification-actions">
            <button class="company-notification-btn company-notification-read" onclick="markRead(this)">تمت القراءة</button>
            <button class="company-notification-btn company-notification-delete" onclick="deleteNotif(this)">حذف</button>
        </div>

    </div>

    <div class="company-notification-card">

        <div class="company-notification-content">
            <div class="company-notification-icon">✅</div>

            <div class="company-notification-text">
                <h4>تم قبول طالب</h4>
                <p>تم قبول الطالب اسراء في فرصة Back-End</p>
                <div class="company-notification-time">قبل يوم</div>
            </div>
        </div>

        <div class="company-notification-actions">
            <button class="company-notification-btn company-notification-delete" onclick="deleteNotif(this)">حذف</button>
        </div>

    </div>

    <div class="company-notification-empty" id="emptyMsg">
        لا يوجد إشعارات
    </div>

</div>

<script>
function markRead(btn){
    const card = btn.closest(".company-notification-card");
    card.classList.remove("company-notification-unread");
    btn.remove();
}

function deleteNotif(btn){
    const card = btn.closest(".company-notification-card");
    card.remove();
    checkEmpty();
}

function clearAll(){
    document.querySelectorAll(".company-notification-card").forEach(card => card.remove());
    checkEmpty();
}

function checkEmpty(){
    const cards = document.querySelectorAll(".company-notification-card");
    if(cards.length === 0){
        document.getElementById("emptyMsg").style.display = "block";
    }
}
</script>

@endsection
