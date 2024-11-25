@extends('layouts.app')

@section('title', 'Home')

@section('additional_css')
<style>
    /* Import Urdu fonts */
    @import url('https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap');
    
    /* Reset and base styles */

    body {
        font-family: 'Noto Nastaliq Urdu', serif;
    }
    
    /* Banner styles */
    .banner-section {
        background-color: #E6F3F5;
        padding: 2.5rem 0;
        border: none;
        position: relative;
        overflow: hidden;
    }
    
    .urdu-text {
        font-family: 'Noto Nastaliq Urdu', serif;
        font-size: 2rem;
        text-align: center;
        color: #000000;
        margin-bottom: 3rem;
        line-height: 1.6;
        font-weight: 700;
    }
    
    .start-button {
        background-color: #F4C430;
        border: none;
        padding: 1rem 3rem;
        border-radius: 30px;
        font-size: 1.25rem;
        color: #000000;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(244, 196, 48, 0.2);
    }
    
    .start-button:hover {
        background-color: #DAA520;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(244, 196, 48, 0.3);
    }
    
    .banner-icons {
        text-align: center;
        margin-top: 3rem;
        display: flex;
        justify-content: center;
        gap: 3rem;
    }
    
    .banner-icons img {
        max-height: 120px;
        transition: transform 0.3s ease;
    }
    
    .banner-icons img:hover {
        transform: scale(1.05);
    }
</style>
@endsection

@section('content')
<!-- Banner Section -->
<div class="banner-section">
    <div class="container">
        <h1 class="urdu-text">مصنوعی ذہانت کے ذریعے پلک جھپکتے میں اسباق کی منصوبہ بندی کریں</h1>
        <div class="text-center">
            <button class="start-button" onclick="scrollToPackages()">ابھی مفت آغاز کریں</button>
        </div>
        <div class="banner-icons">
            <img src="{{ asset('/images/blackboard-icon.png') }}" alt="Blackboard" class="img-fluid">
            <img src="{{ asset('/images/easel-icon.png') }}" alt="Easel" class="img-fluid">
        </div>
    </div>
</div>

<!-- Include Packages Section -->
@include('packages')

@endsection

@section('additional_js')
<script>
    function scrollToPackages() {
        const packagesSection = document.getElementById('packages');
        if (packagesSection) {
            packagesSection.scrollIntoView({ behavior: 'smooth' });
        }
    }
</script>
@endsection
