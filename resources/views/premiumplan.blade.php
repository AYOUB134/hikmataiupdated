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

                <button class="lesson-plan-copy" id="copyButton">کاپی کریں</button>
                <button class="lesson-plan-copy" id="downloadPdfButton">ڈاؤن لوڈ پی ڈی ایف</button>

                <div class="copy-feedback" id="copyFeedback">منصوبہ کاپی ہو گیا ہے!</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample data for testing
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
                quiz_type: "کثیر انتخابی سوالات",
                quiz_question_number: "8"
            },
            // Add more sample data as needed
        ];

        document.getElementById('lessonPlanForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // For testing purposes, we'll use the first item in the sample data
            const data = sampleData[0];
            
            // Populate the lesson plan output
            document.getElementById('teacherNameOutput').textContent = data.teacher_name;
            document.getElementById('classGroupOutput').textContent = data.grade_level;
            document.getElementById('subjectOutput').textContent = data.subject_topic;
            document.getElementById('topicOutput').textContent = data.subject_topic;
            document.getElementById('topicDetailsOutput').textContent = data.topic_details;
            document.getElementById('periodsOutput').textContent = data.number_of_periods;
            document.getElementById('durationOutput').textContent = data.time_duration + ' منٹ';
            document.getElementById('classExerciseOutput').textContent = data.written_exercise_details;
            document.getElementById('homeworkOutput').textContent = data.homework_detail;
            document.getElementById('learningOutcomesOutput').textContent = "طلبہ کے حاصلاتِ تعلم کی تفصیلات";
            document.getElementById('quizTypeOutput').textContent = data.quiz_type;
            document.getElementById('quizQuestionNumberOutput').textContent = data.quiz_question_number;
            
            // Show the lesson plan output and buttons
            document.getElementById('lessonPlanOutput').style.display = 'block';
            document.getElementById('copyButton').style.display = 'inline-block';
            document.getElementById('downloadPdfButton').style.display = 'inline-block';
            
            // Scroll to the lesson plan output
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
            // Collect form data
            const formData = new FormData(document.getElementById('lessonPlanForm'));
            
            // Send a POST request to the server
            fetch('/download-lesson-plan-pdf', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.blob())
            .then(blob => {
                // Create a temporary URL for the blob
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

