@extends('layouts.app')

@section('title', 'Register')

@section('additional_css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap');

    body {
        font-family: 'Noto Nastaliq Urdu', serif;
    }

    .auth-container {
        max-width: 400px;
        margin: 2rem auto;
        padding: 2rem;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .auth-title {
        font-family: 'Noto Nastaliq Urdu', serif;
        font-size: 2rem;
        text-align: center;
        color: #000000;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 1rem;
    }

    .auth-button {
        background-color: #F4C430;
        border: none;
        padding: 0.75rem;
        border-radius: 5px;
        font-size: 1rem;
        color: #000000;
        font-weight: 500;
        width: 100%;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .auth-button:hover {
        background-color: #DAA520;
    }

    .auth-links {
        text-align: center;
        margin-top: 1rem;
    }

    .auth-links a {
        color: #000000;
        text-decoration: none;
    }

    .auth-links a:hover {
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
<div class="auth-container">
    <h2 class="auth-title">رجسٹر کریں</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">نام</label>
            <input id="name" type="text" class="form-input" name="name" required autofocus>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">ای میل</label>
            <input id="email" type="email" class="form-input" name="email" required>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">پاس ورڈ</label>
            <input id="password" type="password" class="form-input" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="form-label">پاس ورڈ کی تصدیق</label>
            <input id="password_confirmation" type="password" class="form-input" name="password_confirmation" required>
        </div>
        <div class="form-group">
            <button type="submit" class="auth-button">رجسٹر</button>
        </div>
    </form>
    <div class="auth-links">
        <a href="/login">پہلے سے اکاؤنٹ ہے؟ لاگ ان کریں</a>
    </div>
</div>
@endsection

