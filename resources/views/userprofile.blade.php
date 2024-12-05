@extends('layouts.app')

@section('title', 'صارف کی پروفائل')

@section('additional_css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap');

    body {
        font-family: 'Noto Nastaliq Urdu', serif;
        background-color: #f8f9fa;
        color: #333;
    }
    .profile-wrapper {
        max-width: 800px;
        margin: 2rem auto;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }
    .profile-header {
        text-align: center;
        margin-bottom: 2rem;
        background-color: #FFA500;
        color: #fff;
        padding: 2rem;
        border-radius: 10px 10px 0 0;
        margin: -2rem -2rem 2rem -2rem;
    }
    .profile-header h1 {
        margin: 0;
        font-size: 2.5rem;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }
    .profile-info, .pdf-history {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
    .profile-info h2, .pdf-history h2 {
        color: #FFA500;
        border-bottom: 2px solid #FFA500;
        padding-bottom: 0.5rem;
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }
    .profile-info p {
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }
    .profile-info strong {
        color: #007bff;
    }
    .pdf-item {
        background-color: #ffffff;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        padding: 1rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }
    .pdf-item:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }
    .pdf-item h3 {
        margin-top: 0;
        color: #007bff;
        font-size: 1.2rem;
    }
    .pdf-item p {
        margin-bottom: 0.5rem;
        color: #555;
    }
    .pdf-download {
        display: inline-block;
        background-color: #007bff;
        color: white;
        padding: 0.5rem 1rem;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        font-weight: bold;
    }
    .pdf-download:hover {
        background-color: #0056b3;
        text-decoration: none;
        color: white;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="profile-wrapper">
        <div class="profile-header">
            <h1>احمد علی</h1>
        </div>

        <div class="profile-info">
            <h2>صارف کی معلومات</h2>
            <p><strong>صارف نام:</strong> ahmad_ali</p>
            <p><strong>ای میل:</strong> ahmad.ali@example.com</p>
            <p><strong>شمولیت کی تاریخ:</strong> 2023-01-15</p>
        </div>

        <div class="pdf-history">
            <h2>پی ڈی ایف کی تاریخ</h2>
            <div class="pdf-item">
                <h3>تدریسی منصوبہ - کمپیوٹر سائنس</h3>
                <p><strong>تاریخ:</strong> 2023-06-01</p>
                <p><strong>موضوع:</strong> کمپیوٹر سائنس</p>
                <a href="#" class="pdf-download">ڈاؤن لوڈ کریں</a>
            </div>
            <div class="pdf-item">
                <h3>تدریسی منصوبہ - ریاضی</h3>
                <p><strong>تاریخ:</strong> 2023-05-15</p>
                <p><strong>موضوع:</strong> ریاضی</p>
                <a href="#" class="pdf-download">ڈاؤن لوڈ کریں</a>
            </div>
            <div class="pdf-item">
                <h3>تدریسی منصوبہ - اردو</h3>
                <p><strong>تاریخ:</strong> 2023-04-30</p>
                <p><strong>موضوع:</strong> اردو</p>
                <a href="#" class="pdf-download">ڈاؤن لوڈ کریں</a>
            </div>
        </div>
    </div>
</div>
@endsection