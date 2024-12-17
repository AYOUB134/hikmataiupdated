@extends('layouts.app')

@section('title', 'Terms and Conditions')

@section('content')
<style>
    .terms-container {
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
</style>

<div class="terms-container">
    <h1>Terms and Conditions</h1>
    
    <p class="last-updated"><strong>Last Updated: December 15th, 2024</strong></p>

    <h2>1. Acceptance of Terms</h2>
    <p>By accessing and using www.hikmat.ai ("the Website"), you agree to comply with and be bound by these Terms and Conditions ("Terms"). If you do not agree with these Terms, please do not use the Website.</p>

    <h2>2. Description of Service</h2>
    <p>hikmat.ai provides an online platform that assists teachers in generating lesson plans in Urdu ("the Service"). The Service is intended for educational purposes only.</p>

    <h2>3. User Responsibilities</h2>
    <ul>
        <li><strong>Account Registration:</strong> To access certain features, you may be required to create an account. You agree to provide accurate and complete information during registration and to keep this information updated.</li>
        <li><strong>Account Security:</strong> You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</li>
        <li><strong>Prohibited Conduct:</strong> You agree not to use the Service for any unlawful purposes or to engage in any activity that could harm the Website or its users.</li>
    </ul>

    <h2>4. Intellectual Property</h2>
    <p><strong>Ownership:</strong> All content, features, and functionality on the Website, including but not limited to text, graphics, logos, and software, are the exclusive property of hikmat.ai and are protected by intellectual property laws.</p>
    <p><strong>Limited License:</strong> hikmat.ai grants you a limited, non-exclusive, non-transferable license to access and use the Service for personal, educational purposes only.</p>

    <!-- Continue with the rest of the terms and conditions content -->

    <h2>10. Contact Information</h2>
    <p>For any questions or concerns regarding these Terms, please contact us using the Contact Us page.</p>
</div>
@endsection
