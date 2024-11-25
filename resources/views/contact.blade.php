@extends('layouts.app')

@section('title', 'Contact Us')

@section('additional_css')
<style>
    .contact-section {
        background-color: #f8f9fa;
        padding: 4rem 0;
    }
    .contact-form {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }
    .form-label {
        font-weight: 600;
        color: #333;
    }
    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #ced4da;
        padding: 0.75rem 1rem;
    }
    .form-control:focus, .form-select:focus {
        border-color: #F4C430;
        box-shadow: 0 0 0 0.2rem rgba(244, 196, 48, 0.25);
    }
    .btn-primary {
        background-color: #F4C430;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 30px;
        font-size: 1rem;
        color: #000000;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #DAA520;
        transform: translateY(-2px);
    }
    .char-count {
        color: #6c757d;
        font-size: 0.875rem;
    }
</style>
@endsection

@section('content')
<div class="contact-section">
    <div class="container">
        <h1 class="text-center mb-5">Contact Us</h1>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="contact-form">
                    <form id="contactForm" action="https://formsubmit.co/support@hikmat.ai" method="POST">
                        @csrf
                        <!-- Redirect to a Thank You page (optional) -->
                        <input type="hidden" name="_next" value="{{ url('/thank-you') }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="">Select a category</option>
                                <option value="Question">Question</option>
                                <option value="Feedback">Feedback</option>
                                <option value="Refund Request">Refund Request</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" maxlength="256" required></textarea>
                            <div id="charCount" class="char-count mt-2">0 / 256 characters</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional_js')
<script>
    document.getElementById('message').addEventListener('input', function() {
        var charCount = this.value.length;
        document.getElementById('charCount').textContent = charCount + ' / 256 characters';
        
        if (charCount > 256) {
            this.value = this.value.slice(0, 256);
            document.getElementById('charCount').textContent = '256 / 256 characters';
        }
    });
</script>
@endsection
