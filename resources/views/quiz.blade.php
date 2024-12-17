@extends('layouts.app')

@section('title', 'کوئز')

@section('additional_css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap');

    .qz-body {
        font-family: 'Noto Nastaliq Urdu', serif;
        direction: rtl;
    }

    .qz-form-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 20px;
    }

    .qz-form-header {
        background-color: #fff;
        border: 2px solid #FFD700;
        padding: 10px;
        margin-bottom: 20px;
        text-align: right;
    }

    .qz-form-header h1 {
        margin: 0;
        color: #333;
        font-size: 24px;
    }

    .qz-form-group {
        margin-bottom: 20px;
    }

    .qz-form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        text-align: right;
    }

    .qz-form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-align: right;
    }

    .qz-textarea {
        min-height: 100px;
    }

    .qz-btn-submit {
        background-color: #0099ff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Noto Nastaliq Urdu', serif;
    }

    .qz-btn-submit:hover {
        background-color: #0077cc;
    }

    .qz-result-container {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-align: right;
    }

    .qz-result-container h2 {
        margin-bottom: 15px;
    }

    .qz-result-container p {
        margin-bottom: 10px;
    }

    .qz-action-buttons {
        display: flex;
        justify-content: flex-start;
        margin-top: 20px;
    }

    .qz-action-button {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Noto Nastaliq Urdu', serif;
        margin-left: 10px;
    }

    .qz-action-button:hover {
        background-color: #218838;
    }
</style>
@endsection

@section('content')
<div class="qz-body">
    <div class="qz-form-container">
        <div class="qz-form-header">
            <h1>کوئز</h1>
        </div>

        <form method="POST" action="" id="quizForm">
            @csrf
            
            <div class="qz-form-group">
                <label>کوئز کی قسم</label>
                <select name="quiz_type" class="qz-form-control" required>
                    <option value="">منتخب کریں</option>
                    <option value="MCQ">کثیر انتخابی سوالات</option>
                    <option value="True/False">صحیح/غلط</option>
                    <option value="Short Answer">مختصر جوابی سوالات</option>
                    <option value="Long Answer">طویل جوابی سوالات</option>
                </select>
            </div>

            <div class="qz-form-group">
                <label>کوئز کی تفصیلات</label>
                <textarea name="quiz_details" class="qz-form-control qz-textarea" rows="6" required></textarea>
            </div>

            <div class="qz-form-group">
                <label>کوئز کے سوالات کی تعداد</label>
                <select name="question_count" class="qz-form-control" required>
                    <option value="">منتخب کریں</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="qz-btn-submit">تیار کریں کوئز</button>
            </div>
        </form>

        <div class="qz-result-container" id="resultContainer" style="display: none;">
            <h2>کوئز کی تفصیلات</h2>
            <p><strong>کوئز کی قسم:</strong> <span id="resultQuizType"></span></p>
            <p><strong>کوئز کی تفصیلات:</strong> <span id="resultQuizDetails"></span></p>
            <p><strong>کوئز کے سوالات کی تعداد:</strong> <span id="resultQuestionCount"></span></p>

            <div id="dummyQuizData"></div>

            <div class="qz-action-buttons">
                <button onclick="copyToClipboard()" class="qz-action-button">کاپی کریں</button>
                <button onclick="downloadPDF()" class="qz-action-button">PDF ڈاؤن لوڈ کریں</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('quizForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        var quizType = document.getElementsByName('quiz_type')[0].value;
        var quizDetails = document.getElementsByName('quiz_details')[0].value;
        var questionCount = document.getElementsByName('question_count')[0].value;

        // Update result container
        document.getElementById('resultQuizType').textContent = quizType;
        document.getElementById('resultQuizDetails').textContent = quizDetails;
        document.getElementById('resultQuestionCount').textContent = questionCount;

        // Generate dummy quiz data
        var dummyQuizData = generateDummyQuizData(quizType, parseInt(questionCount));
        document.getElementById('dummyQuizData').innerHTML = dummyQuizData;

        // Show result container
        document.getElementById('resultContainer').style.display = 'block';
    });
});

function generateDummyQuizData(quizType, questionCount) {
    var dummyData = '<h3>نمونہ کوئز</h3>';
    for (var i = 1; i <= questionCount; i++) {
        dummyData += '<p><strong>سوال ' + i + ':</strong> ';
        switch (quizType) {
            case 'MCQ':
                dummyData += 'یہ ایک کثیر انتخابی سوال ہے۔<br>';
                dummyData += '(الف) پہلا اختیار<br>(ب) دوسرا اختیار<br>(ج) تیسرا اختیار<br>(د) چوتھا اختیار';
                break;
            case 'True/False':
                dummyData += 'یہ ایک صحیح/غلط سوال ہے۔<br>';
                dummyData += '(الف) صحیح<br>(ب) غلط';
                break;
            case 'Short Answer':
                dummyData += 'یہ ایک مختصر جوابی سوال ہے۔ براہ کرم اپنا جواب یہاں لکھیں۔';
                break;
            case 'Long Answer':
                dummyData += 'یہ ایک طویل جوابی سوال ہے۔ براہ کرم اپنا تفصیلی جواب یہاں لکھیں۔';
                break;
        }
        dummyData += '</p>';
    }
    return dummyData;
}

function copyToClipboard() {
    var resultContainer = document.getElementById('resultContainer');
    var range = document.createRange();
    range.selectNode(resultContainer);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand('copy');
    window.getSelection().removeAllRanges();
    alert('کوئز کی تفصیلات کاپی کر دی گئی ہیں۔');
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
    doc.save('کوئز.pdf');
}
</script>
@endsection

