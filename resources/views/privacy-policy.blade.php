@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
<style>
    .privacy-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        font-family: Arial, sans-serif;
        line-height: 1.6;
        color: #333;
    }
    h1 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
    }
    h2 {
        color: #3498db;
        margin-top: 30px;
        margin-bottom: 15px;
    }
    h3 {
        color: #e74c3c;
        margin-top: 20px;
        margin-bottom: 10px;
    }
    p {
        margin-bottom: 15px;
    }
    ul {
        margin-bottom: 15px;
        padding-left: 20px;
    }
    .last-updated {
        font-style: italic;
        color: #7f8c8d;
        margin-bottom: 20px;
    }
    .disclaimer {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 5px;
        padding: 15px;
        margin-top: 30px;
    }
</style>

<div class="privacy-container">
    <h1>Privacy Policy for Hikmat.ai</h1>
    
    <p class="last-updated"><strong>Last Updated: December 15th, 2024</strong></p>

    <h2>1. Introduction</h2>
    <p>Welcome to hikmat.ai, a digital platform designed to assist teachers in generating lesson plans in Urdu. At hikmat.ai, we are committed to protecting the privacy and personal information of our users. This Privacy Policy outlines how we collect, use, disclose, and safeguard your information when you use our website and services.</p>

    <h2>2. Information We Collect</h2>
    <h3>2.1 Personal Information</h3>
    <p>We may collect the following types of personal information:</p>
    <ul>
        <li>Name</li>
        <li>Email address</li>
        <li>School or institutional affiliation</li>
        <li>Account login credentials</li>
    </ul>

    <h3>2.2 Usage Information</h3>
    <p>We collect data about how you interact with our platform:</p>
    <ul>
        <li>IP address</li>
        <li>Browser type</li>
        <li>Device information</li>
        <li>Pages visited</li>
        <li>Time spent on pages</li>
        <li>Lesson plan generation history</li>
        <li>Search and interaction patterns</li>
    </ul>

    <!-- Continue with the rest of the privacy policy content -->

    <h2>15. Governing Law</h2>
    <p>This Privacy Policy is governed by the laws of Islamic Republic Of Pakistan.</p>

    <div class="disclaimer">
        <p><em>Disclaimer: While we strive to protect user privacy, no online platform can guarantee absolute security. Users are encouraged to take their own precautions.</em></p>
    </div>
</div>
@endsection

