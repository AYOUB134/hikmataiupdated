@extends('layouts.app')

@section('title', 'تدریسی منصوبہ')

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
        }
        .copy-feedback {
            display: none;
            color: green;
            margin-top: 0.5rem;
        }
    </style>
@endsection

@section('content')
<div class="container">
        <div class="lesson-plan-wrapper">
            <form class="lesson-plan-form" id="lessonPlanForm">
                <div class="mb-3">
                    <label for="teacher_name">معلم/معلمہ کا نام</label>
                    <input type="text" id="teacher_name" name="teacher_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="class_group">جماعت/فریق</label>
                    <select id="class_group" name="class_group" class="form-select" required>
                        <option value="">منتخب کریں</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
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
                    <label for="periods">پیریڈ کی تعداد</label>
                    <select id="periods" name="periods" class="form-select" required>
                        <option value="">منتخب کریں</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
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
                    <input type="text" id="class_exercise" name="class_exercise" class="form-control" maxlength="40" required>
                </div>

                <div class="mb-3">
                    <label for="homework">گھر کے کام کی تفصیل</label>
                    <input type="text" id="homework" name="homework" class="form-control" maxlength="40" required>
                </div>

                <div class="mb-3">
                    <label for="topic">عنوان/موضوع</label>
                    <input type="text" id="topic" name="topic" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="time">وقت</label>
                    <input type="text" id="time" name="time" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="learning_outcomes">طلبہ کے حاصلاتِ تعلم</label>
                    <textarea id="learning_outcomes" name="learning_outcomes" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="lesson-plan-submit">منصوبہ بنائیں</button>
            </form>

            <div id="lessonPlanOutput" style="display: none;">
                <!-- First Table -->
                <div class="lesson-plan-header">تدریسی منصوبہ</div>
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
                            <th>دورانیہ</th>
                            <td id="durationOutput"></td>
                            <th>وقت</th>
                            <td id="timeOutput"></td>
                        </tr>
                        <tr>
                            <th>طلبہ کے<br>حاصلاتِ تعلم</th>
                            <td colspan="3" id="learningOutcomesOutput"></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Second Table -->
                <div class="lesson-plan-header">پیریڈ</div>
                <table class="lesson-plan-table">
                    <tbody>
                        <tr>
                            <th>ذہنی آمادگی اور وسائل</th>
                            <td>ذہنی آمادگی اور وسائل کی تفصیلات</td>
                        </tr>
                        <tr>
                            <th>معلم/طالب علم کا طریقہ تدریس</th>
                            <td>معلم/طالب علم کے طریقہ تدریس کی تفصیلات</td>
                        </tr>
                        <tr>
                            <th>طلبہ کا عملی کام</th>
                            <td>طلبہ کے عملی کام کی تفصیلات</td>
                        </tr>
                        <tr>
                            <th>عملی سرگرمی</th>
                            <td>عملی سرگرمی کی تفصیلات</td>
                        </tr>
                        <tr>
                            <th>استحکام / جائزہ / تشخیص</th>
                            <td>استحکام / جائزہ / تشخیص کی تفصیلات</td>
                        </tr>
                        <tr>
                            <th>معلم/طالب علم کا گھر کا کام</th>
                            <td id="homeworkOutput"></td>
                        </tr>
                        <tr>
                            <th>آلات و مشینات</th>
                            <td>آلات و مشینات کی تفصیلات</td>
                        </tr>
                        <tr>
                            <th>جماعتی مشق</th>
                            <td id="classExerciseOutput"></td>
                        </tr>
                    </tbody>
                </table>

                <button class="lesson-plan-copy" id="copyButton">کاپی کریں</button>
                <div class="copy-feedback" id="copyFeedback">منصوبہ کاپی ہو گیا ہے!</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('lessonPlanForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Populate the lesson plan output
            document.getElementById('teacherNameOutput').textContent = document.getElementById('teacher_name').value;
            document.getElementById('classGroupOutput').textContent = document.getElementById('class_group').value;
            document.getElementById('subjectOutput').textContent = document.getElementById('subject').value;
            document.getElementById('topicOutput').textContent = document.getElementById('topic').value;
            document.getElementById('durationOutput').textContent = document.getElementById('duration').value + ' منٹ';
            document.getElementById('timeOutput').textContent = document.getElementById('time').value;
            document.getElementById('learningOutcomesOutput').textContent = document.getElementById('learning_outcomes').value;
            document.getElementById('homeworkOutput').textContent = document.getElementById('homework').value;
            document.getElementById('classExerciseOutput').textContent = document.getElementById('class_exercise').value;
            
            // Show the lesson plan output and copy button
            document.getElementById('lessonPlanOutput').style.display = 'block';
            document.getElementById('copyButton').style.display = 'inline-block';
            
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
    </script>
@endsection

