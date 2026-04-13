@extends('front.layout.student')

@section('title','messages')

@section('content')
<main class="student-page messages-page">

    <section class="page-title-box">
        <h2>الرسائل</h2>
        <p>
            يمكنك التواصل مع المشرف الأكاديمي أو مسؤول جهة التدريب من خلال هذه الصفحة.
        </p>
    </section>

    <section class="messages-layout">

        <!-- Sidebar -->
        <aside class="messages-sidebar white-card">
            <div class="messages-sidebar-head">
                <h3>المحادثات</h3>
            </div>

            <div class="chat-list">
                <div class="chat-user active" onclick="selectChat('supervisor')">
                    <div class="chat-avatar">أ</div>
                    <div class="chat-user-info">
                        <strong>د. أحمد خالد</strong>
                        <span>المشرف الأكاديمي</span>
                    </div>
                </div>

                <div class="chat-user" onclick="selectChat('company')">
                    <div class="chat-avatar company">ش</div>
                    <div class="chat-user-info">
                        <strong>شركة التقنية الحديثة</strong>
                        <span>جهة التدريب</span>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Chat -->
        <section class="messages-chat white-card">
            <div class="chat-header">
                <div class="chat-header-user">
                    <div class="chat-avatar">أ</div>
                    <div>
                        <strong id="chatName">د. أحمد خالد</strong>
                        <span id="chatRole">المشرف الأكاديمي</span>
                    </div>
                </div>
            </div>

            <div class="chat-body" id="chatBody">
                <div class="message received">
                    <p>مرحبًا اسراء، أرجو متابعة رفع التقرير الأسبوعي في موعده.</p>
                    <span>10:30 AM</span>
                </div>

                <div class="message sent">
                    <p>تم دكتور، سأقوم برفعه اليوم بإذن الله.</p>
                    <span>10:45 AM</span>
                </div>

                <div class="message received">
                    <p>ممتاز، أيضًا لا تنسي تحديث ساعات التدريب بعد الاعتماد.</p>
                    <span>11:00 AM</span>
                </div>
            </div>

            <form class="chat-input-area" onsubmit="sendMessage(event)">
                <input type="text" id="messageInput" class="form-control" placeholder="اكتبي رسالتك هنا...">
                <button type="submit" class="btn btn-primary">إرسال</button>
            </form>
        </section>

    </section>

</main>
@endsection

@section('css')
<style>
.messages-page{
    display:grid;
    gap:18px;
}
.messages-layout{
    display:grid;
    grid-template-columns:320px 1fr;
    gap:18px;
    align-items:start;
}
.messages-sidebar,
.messages-chat{
    border-radius:22px;
}
.messages-sidebar{
    padding:18px;
}
.messages-sidebar-head{
    margin-bottom:14px;
}
.messages-sidebar-head h3{
    margin:0;
    color:#122033;
}
.chat-list{
    display:grid;
    gap:10px;
}
.chat-user{
    display:flex;
    align-items:center;
    gap:12px;
    padding:14px;
    border-radius:16px;
    cursor:pointer;
    transition:.2s ease;
    border:1px solid #edf2f7;
}
.chat-user:hover{
    background:#f8fbff;
}
.chat-user.active{
    background:#eef4ff;
    border-color:#d7e6ff;
}
.chat-avatar{
    width:48px;
    height:48px;
    border-radius:14px;
    background:#3e7cd7;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:900;
    font-size:20px;
}
.chat-avatar.company{
    background:#14a44d;
}
.chat-user-info strong{
    display:block;
    color:#122033;
    font-size:14px;
    margin-bottom:4px;
}
.chat-user-info span{
    color:#64748b;
    font-size:12px;
}

.messages-chat{
    display:grid;
    grid-template-rows:auto 1fr auto;
    min-height:520px;
}
.chat-header{
    padding:18px 20px;
    border-bottom:1px solid #eef2f7;
}
.chat-header-user{
    display:flex;
    align-items:center;
    gap:12px;
}
.chat-header-user strong{
    display:block;
    color:#122033;
}
.chat-header-user span{
    color:#64748b;
    font-size:13px;
}

.chat-body{
    padding:20px;
    display:grid;
    gap:12px;
    background:#f8fbff;
}
.message{
    max-width:70%;
    padding:14px 16px;
    border-radius:18px;
}
.message p{
    margin:0 0 6px;
    line-height:1.8;
    font-size:14px;
}
.message span{
    font-size:11px;
    color:#64748b;
}
.message.received{
    background:#fff;
    border:1px solid #e5edf5;
    justify-self:start;
}
.message.sent{
    background:#3e7cd7;
    color:#fff;
    justify-self:end;
}
.message.sent span{
    color:rgba(255,255,255,.8);
}
.chat-input-area{
    display:grid;
    grid-template-columns:1fr auto;
    gap:12px;
    padding:18px 20px;
    border-top:1px solid #eef2f7;
    background:#fff;
}
@media (max-width:900px){
    .messages-layout{
        grid-template-columns:1fr;
    }
}
@media (max-width:600px){
    .chat-input-area{
        grid-template-columns:1fr;
    }
    .message{
        max-width:100%;
    }
}
</style>
@endsection

@section('js')
<script>
const chats = {
    supervisor: {
        name: 'د. أحمد خالد',
        role: 'المشرف الأكاديمي',
        messages: [
            { type: 'received', text: 'مرحبًا اسراء، أرجو متابعة رفع التقرير الأسبوعي في موعده.', time: '10:30 AM' },
            { type: 'sent', text: 'تم دكتور، سأقوم برفعه اليوم بإذن الله.', time: '10:45 AM' },
            { type: 'received', text: 'ممتاز، أيضًا لا تنسي تحديث ساعات التدريب بعد الاعتماد.', time: '11:00 AM' }
        ]
    },
    company: {
        name: 'شركة التقنية الحديثة',
        role: 'جهة التدريب',
        messages: [
            { type: 'received', text: 'نرجو الحضور غدًا الساعة 9:00 صباحًا.', time: '09:00 AM' },
            { type: 'sent', text: 'تم، سأكون متواجدة في الموعد.', time: '09:10 AM' }
        ]
    }
};

let currentChat = 'supervisor';

function selectChat(chatKey){
    currentChat = chatKey;

    document.querySelectorAll('.chat-user').forEach(item => item.classList.remove('active'));

    if(chatKey === 'supervisor'){
        document.querySelectorAll('.chat-user')[0].classList.add('active');
    } else {
        document.querySelectorAll('.chat-user')[1].classList.add('active');
    }

    document.getElementById('chatName').textContent = chats[chatKey].name;
    document.getElementById('chatRole').textContent = chats[chatKey].role;

    renderMessages();
}

function renderMessages(){
    const body = document.getElementById('chatBody');
    body.innerHTML = '';

    chats[currentChat].messages.forEach(msg => {
        const div = document.createElement('div');
        div.className = `message ${msg.type}`;
        div.innerHTML = `<p>${msg.text}</p><span>${msg.time}</span>`;
        body.appendChild(div);
    });
}

function sendMessage(e){
    e.preventDefault();

    const input = document.getElementById('messageInput');
    const text = input.value.trim();

    if(!text) return;

    chats[currentChat].messages.push({
        type: 'sent',
        text: text,
        time: 'الآن'
    });

    input.value = '';
    renderMessages();
}

document.addEventListener('DOMContentLoaded', renderMessages);
</script>
@endsection
