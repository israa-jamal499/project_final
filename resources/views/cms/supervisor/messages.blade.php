@extends('cms.supervisor.parent')

@section('title','الرسائل')

@section('content')
<section class="content supervisor-messages-page">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="card card-outline card-primary shadow-sm border-0 page-header-card">
                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <h3 class="mb-1">📨 رسائل الطلاب</h3>
                            <p class="text-muted mb-0">راجعي الرسائل الواردة من الطلاب، وافتحي أي رسالة للقراءة والرد.</p>
                        </div>

                        <div class="header-stats d-flex align-items-center flex-wrap">
                            <span class="badge badge-primary p-2 ml-2">الواردة: 4</span>
                            <span class="badge badge-warning p-2">غير المقروءة: 2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Right Sidebar -->
            <ul class="nav nav-pills flex-column text-right message-folder-list" id="folderList">
    <li class="nav-item">
        <a href="#" class="nav-link active" data-filter="all">
            الوارد
            <span class="badge bg-primary float-left">4</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" data-filter="unread">
            غير المقروءة
            <span class="badge bg-warning float-left">2</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" data-filter="read">المقروءة</a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" data-filter="saved">المحفوظة</a>
    </li>
</ul>

            <!-- Main Content -->
            <div class="col-md-9">

                <!-- Inbox -->
                <div class="card card-primary card-outline shadow-sm border-0">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                        <h3 class="card-title mb-2 mb-md-0">📨 صندوق الوارد</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm inbox-search-box">
                                <input type="text" class="form-control" id="messageSearchInput" placeholder="بحث عن طالب أو موضوع">
                                <div class="input-group-append">
                                    <button class="btn btn-default" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped mb-0">
                                <tbody id="messagesTableBody">

                                   <tr class="message-row active-message-row"
    data-folder="unread"
    data-student="إسراء كسكين"
    data-subject="استفسار بخصوص التقرير الأسبوعي"
    data-body="السلام عليكم، أستاذة. بدي أستفسر عن طريقة رفع التقرير الأسبوعي وهل أرفقه PDF أو أكتبه داخل النموذج؟"
    data-time="منذ 5 دقائق">
                                        <td width="50">
                                            <button class="btn btn-default btn-sm" type="button">
                                                <i class="far fa-star"></i>
                                            </button>
                                        </td>
                                        <td class="mailbox-name text-primary font-weight-bold">إسراء كسكين</td>
                                        <td class="mailbox-subject">
                                            <b>استفسار</b> - بخصوص التقرير الأسبوعي
                                        </td>
                                        <td class="mailbox-date">5 دقائق</td>
                                    </tr>

                                    <tr class="message-row"
    data-folder="unread"
    data-student="سارة أحمد"
    data-subject="طلب تأكيد ساعات التدريب"
    data-body="مرحبًا، أريد تأكيد الساعات التي أنجزتها هذا الأسبوع، لأن النظام ما زال يعرضها بانتظار الاعتماد."
    data-time="منذ 10 دقائق">
                                        <td width="50">
                                            <button class="btn btn-default btn-sm" type="button">
                                                <i class="far fa-star"></i>
                                            </button>
                                        </td>
                                        <td class="mailbox-name text-primary font-weight-bold">سارة أحمد</td>
                                        <td class="mailbox-subject">
                                            <b>طلب</b> - تأكيد ساعات التدريب
                                        </td>
                                        <td class="mailbox-date">10 دقائق</td>
                                    </tr>

                                    <tr class="message-row"
                                        data-student="هبة علي"
                                        data-subject="مشكلة في صفحة الساعات"
                                        data-body="عندي مشكلة في صفحة الساعات، كلما أدخل عدد الساعات لا يتم الحفظ. ممكن أعرف السبب؟"
                                        data-time="منذ 20 دقيقة">
                                        <td width="50">
                                            <button class="btn btn-default btn-sm" type="button">
                                                <i class="far fa-star"></i>
                                            </button>
                                        </td>
                                        <td class="mailbox-name text-primary font-weight-bold">هبة علي</td>
                                        <td class="mailbox-subject">
                                            <b>مشكلة</b> - في صفحة الساعات
                                        </td>
                                        <td class="mailbox-date">20 دقيقة</td>
                                    </tr>

                                    <tr class="message-row"
                                        data-student="دعاء محمد"
                                        data-subject="استفسار عن موعد التقييم النهائي"
                                        data-body="لو سمحتِ، متى سيتم فتح التقييم النهائي للتدريب؟ وهل هناك موعد محدد للتسليم؟"
                                        data-time="منذ 30 دقيقة">
                                        <td width="50">
                                            <button class="btn btn-default btn-sm" type="button">
                                                <i class="far fa-star"></i>
                                            </button>
                                        </td>
                                        <td class="mailbox-name text-primary font-weight-bold">دعاء محمد</td>
                                        <td class="mailbox-subject">
                                            <b>استفسار</b> - عن موعد التقييم النهائي
                                        </td>
                                        <td class="mailbox-date">30 دقيقة</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Message Preview -->
                <div class="card mt-3 shadow-sm border-0" id="messagePreviewCard">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center flex-wrap">
                        <h3 class="card-title mb-2 mb-md-0">📄 تفاصيل الرسالة</h3>

                        <div class="preview-actions">
                            <button class="btn btn-primary btn-sm" type="button" id="openReplyBtn">رد</button>
                            <button class="btn btn-outline-secondary btn-sm" type="button">تعليم كمقروءة</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="preview-meta-row">
                            <strong>الطالب:</strong>
                            <span id="previewStudent">إسراء كسكين</span>
                        </div>

                        <div class="preview-meta-row">
                            <strong>الموضوع:</strong>
                            <span id="previewSubject">استفسار بخصوص التقرير الأسبوعي</span>
                        </div>

                        <div class="preview-meta-row">
                            <strong>الوقت:</strong>
                            <span id="previewTime">منذ 5 دقائق</span>
                        </div>

                        <hr>

                        <p id="previewBody" class="mb-0 preview-message-body">
                            السلام عليكم، أستاذة. بدي أستفسر عن طريقة رفع التقرير الأسبوعي وهل أرفقه PDF أو أكتبه داخل النموذج؟
                        </p>
                    </div>
                </div>

                <!-- Reply Box -->
                <div class="card mt-3 shadow-sm border-0" id="replyCard">
                    <div class="card-header bg-white">
                        <h3 class="card-title mb-0">✉️ الرد على الرسالة</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label>إلى الطالب</label>
                            <input type="text" id="replyStudent" class="form-control" value="إسراء كسكين" readonly>
                        </div>

                        <div class="form-group">
                            <label>الموضوع</label>
                            <input type="text" id="replySubject" class="form-control" value="رد: استفسار بخصوص التقرير الأسبوعي">
                        </div>

                        <div class="form-group">
                            <label>الرسالة</label>
                            <textarea id="replyMessage" class="form-control" rows="5" placeholder="اكتبي ردك هنا..."></textarea>
                        </div>
                    </div>

                    <div class="card-footer bg-white text-left">
                        <button type="button" class="btn btn-primary" id="sendReplyBtn">إرسال الرد</button>
                        <button type="button" class="btn btn-outline-secondary" id="cancelReplyBtn">إلغاء</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const rows = document.querySelectorAll('.message-row');
    const searchInput = document.getElementById('messageSearchInput');
    const tableBody = document.getElementById('messagesTableBody');

    const previewStudent = document.getElementById('previewStudent');
    const previewSubject = document.getElementById('previewSubject');
    const previewBody = document.getElementById('previewBody');
    const previewTime = document.getElementById('previewTime');

    const replyCard = document.getElementById('replyCard');
    const openReplyBtn = document.getElementById('openReplyBtn');
    const cancelReplyBtn = document.getElementById('cancelReplyBtn');
    const sendReplyBtn = document.getElementById('sendReplyBtn');

    const replyStudent = document.getElementById('replyStudent');
    const replySubject = document.getElementById('replySubject');
    const replyMessage = document.getElementById('replyMessage');

    if (replyCard) {
        replyCard.style.display = 'none';
    }

    function selectMessage(row) {
        const student = row.dataset.student;
        const subject = row.dataset.subject;
        const body = row.dataset.body;
        const time = row.dataset.time;

        previewStudent.textContent = student;
        previewSubject.textContent = subject;
        previewBody.textContent = body;
        previewTime.textContent = time;

        replyStudent.value = student;
        replySubject.value = 'رد: ' + subject;

        rows.forEach(r => r.classList.remove('active-message-row'));
        row.classList.add('active-message-row');
    }

    rows.forEach(row => {
        row.addEventListener('click', function () {
            selectMessage(this);
        });
    });

    if (openReplyBtn && replyCard) {
        openReplyBtn.addEventListener('click', function () {
            replyCard.style.display = 'block';
            replyCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    }

    if (cancelReplyBtn && replyCard) {
        cancelReplyBtn.addEventListener('click', function () {
            replyCard.style.display = 'none';
            replyMessage.value = '';
        });
    }

    if (sendReplyBtn) {
        sendReplyBtn.addEventListener('click', function () {
            if (!replyMessage.value.trim()) {
                alert('اكتبي الرد أولًا');
                return;
            }

            alert('تم إرسال الرد بنجاح');
            replyMessage.value = '';
            replyCard.style.display = 'none';
        });
    }

    if (searchInput && tableBody) {
        searchInput.addEventListener('keyup', function () {
            const value = this.value.toLowerCase().trim();
            const allRows = tableBody.querySelectorAll('.message-row');

            allRows.forEach(row => {
                const student = row.dataset.student.toLowerCase();
                const subject = row.dataset.subject.toLowerCase();
                const body = row.dataset.body.toLowerCase();

                if (student.includes(value) || subject.includes(value) || body.includes(value)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }

    const firstActiveRow = document.querySelector('.message-row.active-message-row');
    if (firstActiveRow) {
        selectMessage(firstActiveRow);
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const rows = document.querySelectorAll('.message-row');
    const searchInput = document.getElementById('messageSearchInput');

    const previewStudent = document.getElementById('previewStudent');
    const previewSubject = document.getElementById('previewSubject');
    const previewBody = document.getElementById('previewBody');
    const previewTime = document.getElementById('previewTime');

    const replyCard = document.getElementById('replyCard');
    const openReplyBtn = document.getElementById('openReplyBtn');
    const cancelReplyBtn = document.getElementById('cancelReplyBtn');
    const sendReplyBtn = document.getElementById('sendReplyBtn');

    const replyStudent = document.getElementById('replyStudent');
    const replySubject = document.getElementById('replySubject');
    const replyMessage = document.getElementById('replyMessage');

    const folderLinks = document.querySelectorAll('#folderList .nav-link');

    if (replyCard) {
        replyCard.style.display = 'none';
    }

    function selectMessage(row) {
        const student = row.dataset.student;
        const subject = row.dataset.subject;
        const body = row.dataset.body;
        const time = row.dataset.time;

        if (previewStudent) previewStudent.textContent = student;
        if (previewSubject) previewSubject.textContent = subject;
        if (previewBody) previewBody.textContent = body;
        if (previewTime) previewTime.textContent = time;

        if (replyStudent) replyStudent.value = student;
        if (replySubject) replySubject.value = 'رد: ' + subject;

        rows.forEach(r => r.classList.remove('active-message-row'));
        row.classList.add('active-message-row');
    }

    rows.forEach(row => {
        row.addEventListener('click', function () {
            selectMessage(this);
        });
    });

    folderLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const filter = this.dataset.filter;

            folderLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');

            rows.forEach(row => {
                const folder = row.dataset.folder;

                if (filter === 'all' || folder === filter) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            const firstVisibleRow = Array.from(rows).find(row => row.style.display !== 'none');
            if (firstVisibleRow) {
                selectMessage(firstVisibleRow);
            }
        });
    });

    if (searchInput) {
        searchInput.addEventListener('keyup', function () {
            const value = this.value.toLowerCase().trim();

            rows.forEach(row => {
                const student = row.dataset.student.toLowerCase();
                const subject = row.dataset.subject.toLowerCase();
                const body = row.dataset.body.toLowerCase();

                if (
                    student.includes(value) ||
                    subject.includes(value) ||
                    body.includes(value)
                ) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            const firstVisibleRow = Array.from(rows).find(row => row.style.display !== 'none');
            if (firstVisibleRow) {
                selectMessage(firstVisibleRow);
            }
        });
    }

    if (openReplyBtn && replyCard) {
        openReplyBtn.addEventListener('click', function () {
            replyCard.style.display = 'block';
            replyCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    }

    if (cancelReplyBtn && replyCard) {
        cancelReplyBtn.addEventListener('click', function () {
            replyCard.style.display = 'none';
            if (replyMessage) replyMessage.value = '';
        });
    }

    if (sendReplyBtn) {
        sendReplyBtn.addEventListener('click', function () {
            if (!replyMessage.value.trim()) {
                alert('اكتبي الرد أولًا');
                return;
            }

            alert('تم إرسال الرد بنجاح');
            replyMessage.value = '';
            replyCard.style.display = 'none';
        });
    }

    const firstActiveRow = document.querySelector('.message-row.active-message-row');
    if (firstActiveRow) {
        selectMessage(firstActiveRow);
    }
});
</script>
@endsection
