@extends('front.layout.student')

@section('title','certificate')

@section('content')
<main class="student-page certificate-page-wrap">

    <section class="page-title-box">
        <h2>شهادة التدريب</h2>
        <p>
            بعد إكمال جميع متطلبات التدريب واعتماد الساعات، يمكنك عرض الشهادة وطباعتها من هنا.
        </p>
    </section>

    <section class="certificate-status-box white-card">
        <div>
            <h3>حالة الشهادة</h3>
            <p>الشهادة متاحة للطباعة بعد إتمام جميع الشروط المطلوبة.</p>
        </div>
        <span class="badge badge-success">جاهزة</span>
    </section>

    <section class="certificate-card">
        <div class="certificate-inner">
            <div class="certificate-header">
                <h2>الكلية الجامعية للعلوم التطبيقية</h2>
                <p>بوابة التدريب الميداني</p>
            </div>

            <div class="certificate-title">
                <h1>شهادة إتمام تدريب</h1>
            </div>

            <div class="certificate-body">
                <p>تشهد الكلية الجامعية للعلوم التطبيقية بأن الطالبة</p>
                <h3>اسراء جمال محمد كسكين</h3>
                <p>
                    قد أتمت بنجاح متطلبات التدريب الميداني في
                    <strong>شركة التقنية الحديثة</strong>
                    بواقع
                    <strong>120 ساعة تدريبية</strong>
                </p>
                <p>وذلك ضمن متطلبات برنامج هندسة أمن المعلومات السيبراني.</p>
            </div>

            <div class="certificate-footer">
                <div class="sign-box">
                    <span>المشرف الأكاديمي</span>
                    <strong>د. أحمد خالد</strong>
                </div>

                <div class="sign-box">
                    <span>جهة التدريب</span>
                    <strong>شركة التقنية الحديثة</strong>
                </div>

                <div class="sign-box">
                    <span>تاريخ الإصدار</span>
                    <strong>2026-05-25</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="certificate-actions">
        <button onclick="window.print()" class="btn btn-primary">🖨 طباعة الشهادة</button>
    </section>

</main>
@endsection

@section('css')
<style>
.certificate-page-wrap{
    display:grid;
    gap:18px;
}
.certificate-status-box{
    padding:18px 22px;
    border-radius:22px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:16px;
}
.certificate-status-box h3{
    margin:0 0 6px;
    color:#122033;
}
.certificate-status-box p{
    margin:0;
    color:#64748b;
}

.certificate-card{
    background:#fff;
    border:10px solid #d9b24c;
    border-radius:20px;
    padding:20px;
    box-shadow:0 12px 30px rgba(15,23,42,.08);
}
.certificate-inner{
    border:2px solid #d9b24c;
    border-radius:12px;
    padding:50px 30px;
    text-align:center;
}
.certificate-header h2{
    margin:0;
    color:#122033;
    font-size:28px;
    font-weight:900;
}
.certificate-header p{
    margin:8px 0 0;
    color:#64748b;
}
.certificate-title h1{
    margin:38px 0 24px;
    font-size:42px;
    color:#1e293b;
}
.certificate-body p{
    margin:12px 0;
    color:#334155;
    font-size:19px;
    line-height:2;
}
.certificate-body h3{
    margin:18px 0;
    font-size:34px;
    color:#0f172a;
    font-weight:900;
}
.certificate-footer{
    margin-top:50px;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
}
.sign-box{
    padding-top:18px;
    border-top:1px solid #cbd5e1;
}
.sign-box span{
    display:block;
    color:#64748b;
    font-size:13px;
    margin-bottom:8px;
}
.sign-box strong{
    color:#122033;
}
.certificate-actions{
    display:flex;
    justify-content:center;
}
@media (max-width:768px){
    .certificate-footer{
        grid-template-columns:1fr;
    }
    .certificate-title h1{
        font-size:30px;
    }
    .certificate-body h3{
        font-size:24px;
    }
}
@media print{
    .student-topbar,
    .student-pages-nav,
    .main-footer,
    .page-title-box,
    .certificate-status-box,
    .certificate-actions{
        display:none !important;
    }

    body{
        background:#fff !important;
    }

    .certificate-page-wrap{
        width:100%;
        margin:0;
    }

    .certificate-card{
        box-shadow:none;
        border-width:8px;
    }
}
</style>
@endsection
