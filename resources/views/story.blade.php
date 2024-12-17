@extends('layouts.app')

@section('title', 'کہانی')

@section('additional_css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap');

    .st-body {
        font-family: 'Noto Nastaliq Urdu', serif;
        direction: rtl;
    }

    .st-form-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 20px;
    }

    .st-form-header {
        background-color: #fff;
        border: 2px solid #FFD700;
        padding: 10px;
        margin-bottom: 20px;
        text-align: right;
    }

    .st-form-header h1 {
        margin: 0;
        color: #333;
        font-size: 24px;
    }

    .st-form-group {
        margin-bottom: 20px;
    }

    .st-form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        text-align: right;
    }

    .st-form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-align: right;
    }

    .st-textarea {
        min-height: 100px;
    }

    .st-btn-submit {
        background-color: #0099ff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Noto Nastaliq Urdu', serif;
    }

    .st-btn-submit:hover {
        background-color: #0077cc;
    }

    .st-result-container {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-align: right;
    }

    .st-result-container h2 {
        margin-bottom: 15px;
    }

    .st-result-container p {
        margin-bottom: 10px;
    }

    .st-action-buttons {
        display: flex;
        justify-content: flex-start;
        margin-top: 20px;
    }

    .st-action-button {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Noto Nastaliq Urdu', serif;
        margin-left: 10px;
    }

    .st-action-button:hover {
        background-color: #218838;
    }
</style>
@endsection

@section('content')
<div class="st-body">
    <div class="st-form-container">
        <div class="st-form-header">
            <h1>کہانی</h1>
        </div>

        <form method="POST" action="" id="storyForm">
            @csrf
            
            <div class="st-form-group">
                <label>انداز بیانیہ</label>
                <input type="text" name="narrative_style" class="st-form-control" required>
            </div>

            <div class="st-form-group">
                <label>کہانی کا عنوان</label>
                <input type="text" name="story_title" class="st-form-control" required>
            </div>

            <div class="st-form-group">
                <label>کہانی کی تفصیلات</label>
                <textarea name="story_details" class="st-form-control st-textarea" rows="6" required></textarea>
            </div>

            <div class="st-form-group">
                <label>کہانی سے کیا سبق دینا چاہیں گے اپنے قارئین کو؟</label>
                <textarea name="story_lesson" class="st-form-control st-textarea" rows="4" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="st-btn-submit">کہانی تیار کریں</button>
            </div>
        </form>

        <div class="st-result-container" id="resultContainer" style="display: none;">
            <h2>کہانی کی تفصیلات</h2>
            <p><strong>انداز بیانیہ:</strong> <span id="resultNarrativeStyle"></span></p>
            <p><strong>کہانی کا عنوان:</strong> <span id="resultStoryTitle"></span></p>
            <p><strong>کہانی کی تفصیلات:</strong> <span id="resultStoryDetails"></span></p>
            <p><strong>سبق:</strong> <span id="resultStoryLesson"></span></p>

            <div class="st-action-buttons">
                <button onclick="copyToClipboard()" class="st-action-button">کاپی کریں</button>
                <button onclick="downloadPDF()" class="st-action-button">PDF ڈاؤن لوڈ کریں</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
document.getElementById('storyForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form values
    var narrativeStyle = document.getElementsByName('narrative_style')[0].value;
    var storyTitle = document.getElementsByName('story_title')[0].value;
    var storyDetails = document.getElementsByName('story_details')[0].value;
    var storyLesson = document.getElementsByName('story_lesson')[0].value;

    // Update result container
    document.getElementById('resultNarrativeStyle').textContent = narrativeStyle;
    document.getElementById('resultStoryTitle').textContent = storyTitle;
    document.getElementById('resultStoryDetails').textContent = storyDetails;
    document.getElementById('resultStoryLesson').textContent = storyLesson;

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
    alert('کہانی کی تفصیلات کاپی کر دی گئی ہیں۔');
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
    doc.save('کہانی.pdf');
}
</script>
@endsection

