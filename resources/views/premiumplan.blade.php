@extends('layouts.app')

@section('title', 'تدریسی منصوبہ (پریمیم)')

@section('additional_css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap');

    body {
        font-family: 'Noto Nastaliq Urdu', serif;
    }
   .lesson-plan-wrapper {
            max-width: 800px;
            margin: 2rem auto;
        }
        .lesson-plan-form {
            margin-bottom: 2rem;
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .lesson-plan-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333;
        }
        .lesson-plan-form input,
        .lesson-plan-form textarea,
        .lesson-plan-form select {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 1rem;
        }
        .lesson-plan-table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 2rem;
        }
        .lesson-plan-table th, 
        .lesson-plan-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: right;
        }
        .lesson-plan-table th {
            background-color: #FFA500;
            font-weight: bold;
            width: 25%;
            white-space: nowrap;
        }
        .lesson-plan-header {
            background-color: #FFA500;
            color: black;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            border: 1px solid black;
            margin-bottom: 0;
        }
        .lesson-plan-submit,
        .lesson-plan-copy {
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        .lesson-plan-submit:hover,
        .lesson-plan-copy:hover {
            background-color: #0056b3;
        }
        .lesson-plan-copy {
            display: none;
            margin-top: 1rem;
            margin-right: 10px;
        }
        .copy-feedback {
            display: none;
            color: green;
            margin-top: 0.5rem;
        }
        .premium-badge {
            background-color: gold;
            color: black;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
        }
    .quiz-section {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 10px;
        padding: 1.5rem;
        margin-top: 2rem;
        margin-bottom: 2rem;
    }
    .quiz-section h2 {
        color: #FFA500;
        border-bottom: 2px solid #FFA500;
        padding-bottom: 0.5rem;
        margin-bottom: 1rem;
    }
    .quiz-question {
        margin-bottom: 1.5rem;
    }
    .quiz-question p {
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
    .quiz-options label {
        display: block;
        margin-bottom: 0.5rem;
    }
    .quiz-options input[type="radio"] {
        margin-right: 0.5rem;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="lesson-plan-wrapper">
        <!-- <div class="premium-badge">پریمیم پلان</div> -->
        <form class="lesson-plan-form" id="lessonPlanForm">
            <div class="mb-3">
                <label for="teacher_name">معلم/معلمہ کا نام</label>
                <input type="text" id="teacher_name" name="teacher_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="class_group">جماعت/فریق</label>
                <select id="class_group" name="class_group" class="form-select" required>
                    <option value="">منتخب کریں</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="subject">مضمون</label>
                <select id="subject" name="subject" class="form-select" required>
                    <option value="">منتخب کریں</option>
                    <option value="تاریخ">تاریخ</option>
                    <option value="جغرافیہ">جغرافیہ</option>
                    <option value="کمپیوٹر سائنس">کمپیوٹر سائنس</option>
                    <option value="اردو">اردو</option>
                    <option value="ریاضی">ریاضی</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="topic">عنوان/موضوع</label>
                <input type="text" id="topic" name="topic" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="topic_details">موضوع کی تفصیلات</label>
                <textarea id="topic_details" name="topic_details" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="periods">پیریڈ کی تعداد</label>
                <select id="periods" name="periods" class="form-select" required>
                    <option value="">منتخب کریں</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="duration">دورانیہ (منٹ)</label>
                <select id="duration" name="duration" class="form-select" required>
                    <option value="">منتخب کریں</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="class_exercise">جماعتی مشق کی تفصیل</label>
                <textarea id="class_exercise" name="class_exercise" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="homework">گھر کے کام کی تفصیل</label>
                <textarea id="homework" name="homework" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="learning_outcomes">طلبہ کے حاصلاتِ تعلم</label>
                <textarea id="learning_outcomes" name="learning_outcomes" class="form-control" rows="3" required></textarea>
            </div>

            <!-- New fields for Premium Plan -->
            <div class="mb-3">
                <label for="quiz_type">کوئز کی قسم</label>
                <select id="quiz_type" name="quiz_type" class="form-select" required>
                    <option value="">منتخب کریں</option>
                    <option value="MCQ">کثیر انتخابی سوالات</option>
                    <option value="Open-Ended Questions">کھلے سوالات</option>
                    <option value="True or False">صحیح یا غلط</option>
                    <option value="Yes or No">ہاں یا نہیں</option>
                    <option value="Matching Quiz">جوڑ ملانے والا کوئز</option>
                    <option value="Diagnostic Type">تشخیصی قسم</option>
                </select>
            </div>


           
            <div class="mb-3">
                <label for="quiz_question_number">کوئز سوالات کی کل تعداد</label>
                <select id="quiz_question_number" name="quiz_question_number" class="form-select" required>
                    <option value="">منتخب کریں</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>


            <button type="submit" class="lesson-plan-submit">منصوبہ بنائیں</button>
        </form>

        <div id="lessonPlanOutput" style="display: none;">
            <!-- First Table -->
            <div class="lesson-plan-header">تدریسی منصوبہ (پریمیم)</div>
            <table class="lesson-plan-table">
                <tbody>
                    <tr>
                        <th>معلم/معلمہ کا نام</th>
                        <td id="teacherNameOutput"></td>
                        <th>جماعت/فریق</th>
                        <td id="classGroupOutput"></td>
                    </tr>
                    <tr>
                        <th>مضمون</th>
                        <td id="subjectOutput"></td>
                        <th>عنوان/موضوع</th>
                        <td id="topicOutput"></td>
                    </tr>
                    <tr>
                        <th>موضوع کی تفصیلات</th>
                        <td colspan="3" id="topicDetailsOutput"></td>
                    </tr>
                    <tr>
                        <th>پیریڈ کی تعداد</th>
                        <td id="periodsOutput"></td>
                        <th>دورانیہ</th>
                        <td id="durationOutput"></td>
                    </tr>
                    <tr>
                        <th>جماعتی مشق کی تفصیل</th>
                        <td colspan="3" id="classExerciseOutput"></td>
                    </tr>
                    <tr>
                        <th>گھر کے کام کی تفصیل</th>
                        <td colspan="3" id="homeworkOutput"></td>
                    </tr>
                    <tr>
                        <th>طلبہ کے حاصلاتِ تعلم</th>
                        <td colspan="3" id="learningOutcomesOutput"></td>
                    </tr>
                    <tr>
                        <th>کوئز کی قسم</th>
                        <td id="quizTypeOutput"></td>
                        <th>کوئز سوالات کی تعداد</th>
                        <td id="quizQuestionNumberOutput"></td>
                    </tr>
                </tbody>
            </table>

            <div id="quizSection" class="quiz-section" style="display: none;">
                <h2>کوئز</h2>
                <div id="quizContent"></div>
            </div>

            <button class="lesson-plan-copy" id="copyButton">کاپی کریں</button>
            <button class="lesson-plan-copy" id="downloadPdfButton">ڈاؤن لوڈ پی ڈی ایف</button>

            <div class="copy-feedback" id="copyFeedback">منصوبہ کاپی ہو گیا ہے!</div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const sampleData = [
        {
            teacher_name: "موسیٰ اشفاق",
            grade_level: "7",
            subject_topic: "کمپیوٹر سائنس",
            topic_details: "کمپیوٹر پروگرامنگ کی بنیادیں۔ جاوا اور پائتھن سیکھیں",
            number_of_periods: "4",
            time_duration: "30",
            written_exercise_details: "طلبہ پروگرامنگ زبانوں کی تاریخ کے بارے میں سیکھیں گے اور جاوا کے حقیقی دنیا کے استعمال کے بارے میں لکھیں گے",
            homework_detail: "طلبہ پائتھن زبان میں ایک سادہ کیلکولیٹر کوڈ کریں گے",
            quiz_question_number: "3"
        },
    ];

    const quizTypes = {
        "MCQ": [
            {
                question: "کمپیوٹر پروگرامنگ کی بنیادی زبان کون سی ہے؟",
                options: ["پائتھن", "جاوا", "سی++", "جاوا سکرپٹ"]
            },
            {
                question: "ویب ڈویلپمنٹ کے لیے کون سی زبان سب سے زیادہ استعمال ہوتی ہے؟",
                options: ["HTML", "CSS", "JavaScript", "یہ سب"]
            },
            {
                question: "کمپیوٹر پروگرامنگ میں 'بگ' کیا ہوتا ہے؟",
                options: ["پروگرام میں غلطی", "کمپیوٹر وائرس", "سافٹ ویئر کا نام", "پروگرامنگ کی ایک قسم"]
            }
        ],
        "Open-Ended Questions": [
            {
                question: "کمپیوٹر پروگرامنگ کیا ہے؟ اپنے الفاظ میں بیان کریں۔"
            },
            {
                question: "پروگرامنگ زبانوں کی اہمیت کیا ہے؟"
            },
            {
                question: "آپ کے خیال میں مستقبل میں کمپیوٹر پروگرامنگ کا کیا کردار ہوگا؟"
            }
        ],
        "True or False": [
            {
                question: "پائتھن ایک پروگرامنگ زبان ہے۔",
                options: ["صحیح", "غلط"]
            },
            {
                question: "HTML ایک پروگرامنگ زبان ہے۔",
                options: ["صحیح", "غلط"]
            },
            {
                question: "کمپیوٹر پروگرامنگ صرف بڑی کمپنیوں کے لیے ہے۔",
                options: ["صحیح", "غلط"]
            }
        ],
        "Yes or No": [
            {
                question: "کیا آپ نے کبھی پروگرامنگ کی ہے؟",
                options: ["ہاں", "نہیں"]
            },
            {
                question: "کیا آپ کو لگتا ہے کہ ہر شخص کو پروگرامنگ سیکھنی چاہیے؟",
                options: ["ہاں", "نہیں"]
            },
            {
                question: "کیا آپ مستقبل میں پروگرامر بننا چاہتے ہیں؟",
                options: ["ہاں", "نہیں"]
            }
        ],
        "Matching Quiz": [
            {
                question: "درج ذیل پروگرامنگ زبانوں کو ان کے استعمال سے ملائیں:",
                options: [
                    {item: "پائتھن", match: "مشین لرننگ"},
                    {item: "جاوا سکرپٹ", match: "ویب ڈویلپمنٹ"},
                    {item: "SQL", match: "ڈیٹا بیس مینجمنٹ"}
                ]
            }
        ],
        "Diagnostic Type": [
            {
                question: "آپ کی پروگرامنگ مہارت کس سطح پر ہے؟",
                options: ["ابتدائی", "درمیانہ", "ماہر", "پیشہ ور"]
            },
            {
                question: "آپ کون سی پروگرامنگ زبانیں جانتے ہیں؟ (جتنے لاگو ہوں منتخب کریں)",
                options: ["پائتھن", "جاوا", "سی++", "جاوا سکرپٹ", "روبی", "پی ایچ پی"],
                multiple: true
            },
            {
                question: "آپ کو پروگرامنگ سیکھنے میں سب سے زیادہ دلچسپی کس شعبے میں ہے؟",
                options: ["ویب ڈویلپمنٹ", "موبائل ایپ ڈویلپمنٹ", "مشین لرننگ", "گیم ڈویلپمنٹ", "ڈیٹا سائنس"]
            }
        ]
    };

    document.getElementById('lessonPlanForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const data = sampleData[0];
        const selectedQuizType = document.getElementById('quiz_type').value;
        const selectedQuestionNumber = parseInt(document.getElementById('quiz_question_number').value);
        
        // Populate the lesson plan output (unchanged)
        
        // Display the quiz section if a quiz type is selected
        const quizSection = document.getElementById('quizSection');
        const quizContent = document.getElementById('quizContent');
        
        if (selectedQuizType in quizTypes) {
            quizContent.innerHTML = '';
            const questions = quizTypes[selectedQuizType].slice(0, selectedQuestionNumber);
            
            questions.forEach((q, index) => {
                let questionHtml = `
                    <div class="quiz-question">
                        <p>${index + 1}. ${q.question}</p>
                        <div class="quiz-options">
                `;
                
                switch(selectedQuizType) {
                    case "MCQ":
                    case "True or False":
                    case "Yes or No":
                        q.options.forEach((option, optIndex) => {
                            questionHtml += `
                                <label>
                                    <input type="radio" name="q${index}" value="${optIndex}">
                                    ${option}
                                </label>
                            `;
                        });
                        break;
                    case "Open-Ended Questions":
                        questionHtml += `
                            <textarea name="q${index}" rows="4" cols="50"></textarea>
                        `;
                        break;
                    case "Matching Quiz":
                        q.options.forEach((option, optIndex) => {
                            questionHtml += `
                                <div class="matching-quiz-item">
                                    <span>${option.item}</span>
                                    <select name="q${index}_${optIndex}">
                                        <option value="">Select a match</option>
                                        ${q.options.map(o => `<option value="${o.match}">${o.match}</option>`).join('')}
                                    </select>
                                </div>
                            `;
                        });
                        break;
                    case "Diagnostic Type":
                        if (q.multiple) {
                            q.options.forEach((option, optIndex) => {
                                questionHtml += `
                                    <label>
                                        <input type="checkbox" name="q${index}" value="${optIndex}">
                                        ${option}
                                    </label>
                                `;
                            });
                        } else {
                            q.options.forEach((option, optIndex) => {
                                questionHtml += `
                                    <label>
                                        <input type="radio" name="q${index}" value="${optIndex}">
                                        ${option}
                                    </label>
                                `;
                            });
                        }
                        break;
                }
                
                questionHtml += `
                        </div>
                    </div>
                `;
                quizContent.innerHTML += questionHtml;
            });
            quizSection.style.display = 'block';
        } else {
            quizSection.style.display = 'none';
        }
        
        document.getElementById('lessonPlanOutput').style.display = 'block';
        document.getElementById('copyButton').style.display = 'inline-block';
        document.getElementById('downloadPdfButton').style.display = 'inline-block';
        
        document.getElementById('lessonPlanOutput').scrollIntoView({ behavior: 'smooth' });
    });

    document.getElementById('copyButton').addEventListener('click', function() {
        const lessonPlan = document.getElementById('lessonPlanOutput');
        const range = document.createRange();
        range.selectNode(lessonPlan);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        
        try {
            document.execCommand('copy');
            document.getElementById('copyFeedback').style.display = 'block';
            setTimeout(() => {
                document.getElementById('copyFeedback').style.display = 'none';
            }, 3000);
        } catch (err) {
            console.error('کاپی کرنے میں خطا:', err);
            alert('کاپی کرنے میں خطا آگئی ہے');
        }
        
        window.getSelection().removeAllRanges();
    });

    document.getElementById('downloadPdfButton').addEventListener('click', function() {
        const formData = new FormData(document.getElementById('lessonPlanForm'));
        
        fetch('/download-lesson-plan-pdf', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.blob())
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'lesson_plan.pdf';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        })
        .catch(error => console.error('Error:', error));
    });
</script>
@endsection

