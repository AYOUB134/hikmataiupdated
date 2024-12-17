@extends('layouts.app')

@section('title', 'پریمیئم پلان')

@section('content')
<style>
    /* body {
        direction: rtl;
    } */

    @import url('https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap');

.qz-body {
    font-family: 'Noto Nastaliq Urdu', serif;
    direction: rtl;
} 
    .container {
        font-family: 'Noto Nastaliq Urdu', serif;
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
        text-align: right;
    }

    .title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 2rem;
        text-align: center;
    }

    .grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 768px) {
        .grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .card {
        background-color: #fff;
        padding: 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }

    .card h2 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .card p {
        margin-bottom: 1rem;
    }

    .btn {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        border-radius: 0.25rem;
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .btn-blue {
        background-color: #4299e1;
    }

    .btn-blue:hover {
        background-color: #3182ce;
    }

    .btn-green {
        background-color: #48bb78;
    }

    .btn-green:hover {
        background-color: #38a169;
    }

    .btn-purple {
        background-color: #9f7aea;
    }

    .btn-purple:hover {
        background-color: #805ad5;
    }
</style>

<div class="container">
    <h1 class="title">پریمیئم پلان</h1>

    <div class="grid">
        <div class="card">
            <h2>کوئز</h2>
            <p>طلبہ کے لئے دلچسپ کوئزز بنائیں۔</p>
            <a href="/premiumplan/quiz" class="btn btn-blue">کوئز پر جائیں</a>
        </div>

        <div class="card">
            <h2>تدریسی منصوبہ</h2>
            <p>تفصیلی تدریسی منصوبے تیار کریں۔</p>
            <a href="/premiumplan/tadreesimansooba" class="btn btn-green">منصوبے پر جائیں</a>
        </div>

        <div class="card">
            <h2>کہانی</h2>
            <p>طلبہ کے لئے دلچسپ کہانیاں تخلیق کریں۔</p>
            <a href="/premiumplan/story" class="btn btn-purple">کہانی پر جائیں</a>
        </div>
    </div>
</div>
@endsection
