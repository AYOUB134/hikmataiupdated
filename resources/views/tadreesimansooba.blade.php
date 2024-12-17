@extends('layouts.app')

@section('title', 'تدریسی منصوبہ')

@section('additional_css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap');

    .tm-body {
        font-family: 'Noto Nastaliq Urdu', serif;
        direction: rtl;
    }

    .tm-form-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 20px;
    }

    .tm-form-header {
        background-color: #fff;
        border: 2px solid #FFD700;
        padding: 10px;
        margin-bottom: 20px;
        text-align: right;
    }

    .tm-form-header h1 {
        margin: 0;
        color: #333;
        font-size: 24px;
    }

    .tm-form-group {
        margin-bottom: 20px;
    }

    .tm-form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        text-align: right;
    }

    .tm-form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-align: right;
    }

    .tm-textarea {
        min-height: 100px;
    }

    .tm-btn-submit {
        background-color: #0099ff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Noto Nastaliq Urdu', serif;
    }

    .tm-btn-submit:hover {
        background-color: #0077cc;
    }

    .tm-result-container {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-align: right;
    }

    .tm-result-container h2 {
        margin-bottom: 15px;
    }

    .tm-result-container p {
        margin-bottom: 10px;
    }

    .tm-action-buttons {
        display: flex;
        justify-content: flex-start;
        margin-top: 20px;
    }

    .tm-action-button {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Noto Nastaliq Urdu', serif;
        margin-left: 10px;
    }

    .tm-action-button:hover {
        background-color: #218838;
    }
</style>
@endsection

@section('content')
<div class="tm-body">
    <div class="tm-form-container">
        <div class="tm-form-header">
            <h1>تدریسی منصوبہ</h1>
        </div>

        <form method="POST" action="" id="lessonForm">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="tm-form-group">
                        <label>معلم/معلمہ کا نام</label>
                        <input type="text" name="teacher_name" class="tm-form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tm-form-group">
                        <label>تاریخ</label>
                        <input type="date" name="date" class="tm-form-control" required>
                    </div>
                </div>
            </div>

            <div class="tm-form-group">
                <label>مضمون</label>
                <select name="subject" class="tm-form-control" required>
                    <option value="">منتخب کریں</option>
                    <option value="اردو">اردو</option>
                    <option value="ریاضی">ریاضی</option>
                    <option value="سائنس">سائنس</option>
                    <option value="سماجیات">سماجیات</option>
                    <option value="اسلامیات">اسلامیات</option>
                </select>
            </div>

            <div class="tm-form-group">
                <label>موضوع کی تفصیلات</label>
                <textarea name="topic_details" class="tm-form-control tm-textarea" rows="4" required></textarea>
            </div>

            <div class="tm-form-group">
                <label>دورانیہ (منٹ)</label>
                <select name="duration" class="tm-form-control" required>
                    <option value="">منتخب کریں</option>
                    <option value="30">30 منٹ</option>
                    <option value="45">45 منٹ</option>
                    <option value="60">60 منٹ</option>
                    <option value="90">90 منٹ</option>
                </select>
            </div>

            <div class="tm-form-group">
                <label>گھر کا کام</label>
                <textarea name="homework" class="tm-form-control tm-textarea" rows="4" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="tm-btn-submit">تدریسی منصوبہ بنائیں</button>
            </div>
        </form>

        <div class="tm-result-container" id="resultContainer" style="display: none;">
            <h2>تدریسی منصوبہ کی تفصیلات</h2>
            <p><strong>معلم/معلمہ کا نام:</strong> <span id="resultTeacherName"></span></p>
            <p><strong>تاریخ:</strong> <span id="resultDate"></span></p>
            <p><strong>مضمون:</strong> <span id="resultSubject"></span></p>
            <p><strong>موضوع کی تفصیلات:</strong> <span id="resultTopicDetails"></span></p>
            <p><strong>دورانیہ:</strong> <span id="resultDuration"></span> منٹ</p>
            <p><strong>گھر کا کام:</strong> <span id="resultHomework"></span></p>

            <div class="tm-action-buttons">
                <button onclick="copyToClipboard()" class="tm-action-button">کاپی کریں</button>
                <button onclick="downloadPDF()" class="tm-action-button">PDF ڈاؤن لوڈ کریں</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
document.getElementById('lessonForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form values
    var teacherName = document.getElementsByName('teacher_name')[0].value;
    var date = document.getElementsByName('date')[0].value;
    var subject = document.getElementsByName('subject')[0].value;
    var topicDetails = document.getElementsByName('topic_details')[0].value;
    var duration = document.getElementsByName('duration')[0].value;
    var homework = document.getElementsByName('homework')[0].value;

    // Update result container
    document.getElementById('resultTeacherName').textContent = teacherName;
    document.getElementById('resultDate').textContent = date;
    document.getElementById('resultSubject').textContent = subject;
    document.getElementById('resultTopicDetails').textContent = topicDetails;
    document.getElementById('resultDuration').textContent = duration;
    document.getElementById('resultHomework').textContent = homework;

    // Show result container
    document.getElementById('resultContainer').style.display = 'block';
});

function copyToClipboard() {
    var resultContainer = document.getElementById('resultContainer');
    var range = document.createRange();
    range.selectNode(resultContainer);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand('copy');
    window.getSelection().removeAllRanges();
    alert('تدریسی منصوبہ کی تفصیلات کاپی کر دی گئی ہیں۔');
}

function downloadPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    doc.addFont('NotoNastaliqUrdu-Regular.ttf', 'NotoNastaliqUrdu', 'normal');
    doc.setFont('NotoNastaliqUrdu');
    doc.setR2L(true);

    var resultContainer = document.getElementById('resultContainer');
    var content = resultContainer.innerText;

    doc.text(content, 200, 10, { align: 'right' });
    doc.save('تدریسی_منصوبہ.pdf');
}
</script>
@endsection

