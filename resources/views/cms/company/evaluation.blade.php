@extends('cms.company.temp')
@section('title','evaluation')
@section('main-title','التقييم')
@section('content')

<style>
.company-evaluation-page {
    width: 92%;
    margin: 30px auto;
    font-family: Tahoma, Arial, sans-serif;
    direction: rtl;
    text-align: right;
}

.company-evaluation-card {
    background: #fff;
    padding: 20px;
    border-radius: 14px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    margin-bottom: 20px;
}

.company-evaluation-title {
    margin: 0 0 10px;
    color: #1c2b4a;
    font-size: 24px;
    font-weight: 700;
}

.company-evaluation-desc {
    margin: 0;
    color: #6b7280;
    font-size: 13px;
}

.company-evaluation-intern {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-top: 20px;
    flex-wrap: wrap;
}

.company-evaluation-intern img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    object-fit: cover;
}

.company-evaluation-name {
    font-weight: bold;
    font-size: 16px;
    color: #1c2b4a;
    margin-bottom: 6px;
}

.company-evaluation-meta {
    color: #6b7280;
    font-size: 14px;
    margin-bottom: 4px;
}

.company-evaluation-stars {
    margin-top: 20px;
    font-size: 28px;
    cursor: pointer;
    color: #ddd;
    user-select: none;
}

.company-evaluation-stars span.active {
    color: #f59e0b;
}

.company-evaluation-group {
    margin-top: 15px;
}

.company-evaluation-label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
    color: #1c2b4a;
    font-size: 14px;
}

.company-evaluation-select,
.company-evaluation-textarea {
    width: 100%;
    padding: 10px 12px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-family: Tahoma, Arial, sans-serif;
    font-size: 14px;
    outline: none;
    background: #fff;
    color: #333;
}

.company-evaluation-select:focus,
.company-evaluation-textarea:focus {
    border-color: #3e7cd7;
    box-shadow: 0 0 0 3px rgba(62,124,215,0.12);
}

.company-evaluation-textarea {
    resize: none;
    height: 110px;
}

.company-evaluation-btn {
    margin-top: 18px;
    background: #3e7cd7;
    color: #fff;
    border: none;
    padding: 12px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    width: 100%;
    transition: 0.2s ease;
}

.company-evaluation-btn:hover {
    background: #2f68bd;
}

.company-evaluation-success {
    display: none;
    margin-top: 12px;
    color: #16a34a;
    font-weight: bold;
    font-size: 14px;
}

@media (max-width: 768px) {
    .company-evaluation-page {
        width: 95%;
    }

    .company-evaluation-title {
        font-size: 20px;
    }

    .company-evaluation-intern {
        align-items: flex-start;
    }
}
</style>

<div class="company-evaluation-page">
    <div class="company-evaluation-card">

        <h2 class="company-evaluation-title">تقييم المتدرب</h2>
        <p class="company-evaluation-desc">يرجى تقييم أداء المتدرب بعد انتهاء فترة التدريب</p>

        <div class="company-evaluation-intern">
            <img src="{{ asset('internship/img/israa.jpeg') }}" alt="صورة المتدرب">

            <div>
                <div class="company-evaluation-name">اسراء جمال كسكين</div>
                <div class="company-evaluation-meta">التخصص: أمن المعلومات</div>
                <div class="company-evaluation-meta">التدريب: Back-End Laravel</div>
            </div>
        </div>

        <div class="company-evaluation-stars" id="companyEvaluationStars">
            <span onclick="rateEvaluation(1)">★</span>
            <span onclick="rateEvaluation(2)">★</span>
            <span onclick="rateEvaluation(3)">★</span>
            <span onclick="rateEvaluation(4)">★</span>
            <span onclick="rateEvaluation(5)">★</span>
        </div>

        <div class="company-evaluation-group">
            <label class="company-evaluation-label" for="technicalSkills">مستوى المهارات التقنية</label>
            <select id="technicalSkills" class="company-evaluation-select">
                <option>ممتاز</option>
                <option>جيد جدا</option>
                <option>جيد</option>
                <option>ضعيف</option>
            </select>
        </div>

        <div class="company-evaluation-group">
            <label class="company-evaluation-label" for="disciplineLevel">الالتزام والانضباط</label>
            <select id="disciplineLevel" class="company-evaluation-select">
                <option>ممتاز</option>
                <option>جيد جدا</option>
                <option>جيد</option>
                <option>ضعيف</option>
            </select>
        </div>

        <div class="company-evaluation-group">
            <label class="company-evaluation-label" for="teamworkLevel">التواصل والعمل الجماعي</label>
            <select id="teamworkLevel" class="company-evaluation-select">
                <option>ممتاز</option>
                <option>جيد جدا</option>
                <option>جيد</option>
                <option>ضعيف</option>
            </select>
        </div>

        <div class="company-evaluation-group">
            <label class="company-evaluation-label" for="companyComment">تعليق الشركة</label>
            <textarea id="companyComment" class="company-evaluation-textarea" placeholder="اكتب ملاحظاتك هنا..."></textarea>
        </div>

        <button type="button" class="company-evaluation-btn" onclick="submitEvaluation()">
            حفظ التقييم
        </button>

        <div class="company-evaluation-success" id="companyEvaluationSuccess">
            ✅ تم حفظ التقييم بنجاح
        </div>

    </div>
</div>

<script>
let companyEvaluationRating = 0;

function rateEvaluation(num) {
    companyEvaluationRating = num;
    const stars = document.querySelectorAll("#companyEvaluationStars span");

    stars.forEach((star, index) => {
        if (index < num) {
            star.classList.add("active");
        } else {
            star.classList.remove("active");
        }
    });
}

function submitEvaluation() {
    document.getElementById("companyEvaluationSuccess").style.display = "block";
}
</script>

@endsection
