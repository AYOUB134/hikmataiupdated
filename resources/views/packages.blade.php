<!-- resources/views/packages.blade.php -->
<style>
    .pricing-section {
        background-color: #f8f9fa;
        padding: 4rem 0;
    }
    .plan-card {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease;
    }
    .plan-card:hover {
        transform: translateY(-5px);
    }
    .plan-title {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 1rem;
        color: #333;
    }
    .plan-price {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
        color: #F4C430;
    }
    .plan-features {
        list-style-type: none;
        padding: 0;
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }
    .plan-features li {
        margin-bottom: 0.5rem;
        color: #555;
    }
    .subscribe-button {
        background-color: #F4C430;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 30px;
        font-size: 1rem;
        color: #000000;
        font-weight: 500;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: auto;
    }
    .subscribe-button:hover {
        background-color: #DAA520;
        transform: translateY(-2px);
    }

    .btn-disabled {
        cursor: not-allowed !important;
    }
</style>

<div class="pricing-section" id="packages">
    <div class="container">
        <div class="row g-4">
            <!-- Basic Plan -->
            <div class="col-md-4">
                <div class="plan-card">
                    <h2 class="plan-title">Basic</h2>
                    <div class="plan-price">$1.00</div>
                    <ul class="plan-features">
                        <li>✓ 1 Free Lesson Plan</li>
                        <li>✓ 5 Periods</li>
                    </ul>
                    <a href="{{ route('freeplan') }}" class="btn subscribe-button">Generate Now</a>
                </div>
            </div>
            
            <!-- Premium Plan -->
            <div class="col-md-4">
                <div class="plan-card">
                    <h2 class="plan-title">Premium</h2>
                    <div class="plan-price">$2.99</div>
                    <ul class="plan-features">
                        <li>✓ Everything in Basic</li>
                        <li>✓ Story Generator</li>
                        <li>✓ Quiz Tool</li>
                    </ul>
                    <button class="subscribe-button btn-disabled">Generate Now</button>
                </div>
            </div>
            
            <!-- Gold Plan -->
            <div class="col-md-4">
                <div class="plan-card">
                    <h2 class="plan-title">Gold</h2>
                    <div class="plan-price">$5.99</div>
                    <ul class="plan-features">
                        <li>✓ Everything in Premium</li>
                        <li>✓ Rubrics</li>
                        <li>✓ Worksheets</li>
                        <li>✓ Videos with Quizzes</li>
                        <li>✓ Projects</li>
                        <li>✓ Assessments</li>
                        <li>✓ CIE Urdu First & Second Language Assessment</li>
                    </ul>
                    <button class="subscribe-button btn-disabled">Generate Now</button>
                </div>
            </div>
        </div>
    </div>
</div>