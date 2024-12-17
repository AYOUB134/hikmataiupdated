@extends('layouts.app')

@section('title', 'Refund Policy')

@section('content')
<style>
    .refund-container {
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
</style>

<div class="refund-container">
    <h1>Refund Policy for Hikmat.ai</h1>
    
    <p class="last-updated"><strong>Last Updated: December 15th, 2024</strong></p>

    <h2>1. Policy Overview</h2>
    <p>hikmat.ai is committed to providing high-quality lesson planning tools for educators. This Refund Policy outlines the terms and conditions for refunds related to our digital services.</p>

    <h2>2. Subscription and Service Refund Terms</h2>
    <h3>2.1 Subscription-Based Services</h3>
    <h4>2.1.1 Free Tier</h4>
    <ul>
        <li>No refund is applicable for the free tier of our service</li>
        <li>Users can cancel their free subscription at any time</li>
    </ul>

    <h4>2.1.2 Paid Subscription</h4>
    <ul>
        <li>Premium subscription plans are subject to the following refund conditions</li>
        <li>Refunds are provided on a prorated basis for unused subscription time</li>
    </ul>

    <!-- Continue with the rest of the refund policy content -->

    <h2>10. Policy Updates</h2>
    <p>This refund policy may be updated periodically. Users will be notified of any significant changes via:</p>
    <ul>
        <li>Email communication</li>
        <li>Website announcements</li>
        <li>Updated policy documentation</li>
    </ul>

    <p><em>Note: This policy is subject to the terms and conditions of service outlined in our main user agreement.</em></p>
</div>
@endsection

