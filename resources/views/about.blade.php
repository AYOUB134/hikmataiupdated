@extends('layouts.app')

@section('title', 'About Us')

@section('additional_css')
<style>
    .about-section {
        background-color: #f8f9fa;
        padding: 4rem 0;
    }
    .about-content {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }
    .team-member {
        margin-top: 3rem;
        text-align: center;
    }
    .team-member img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 1rem;
    }
    .team-member h3 {
        color: #333;
        margin-bottom: 0.5rem;
    }
    .team-member p {
        color: #666;
    }
</style>
@endsection

@section('content')
<div class="about-section">
    <div class="container">
        <h1 class="text-center mb-5">About Us</h1>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="about-content">
                    <p>
                        Hikmat is an innovative AI-powered platform designed to revolutionize the way Urdu language is taught and learned. Our mission is to provide educators with cutting-edge tools and resources to create engaging, effective, and personalized lesson plans for their students.
                    </p>
                    <p>
                        Founded by a team of passionate educators and technologists, Hikmat combines the power of artificial intelligence with pedagogical expertise to offer a unique solution for Urdu language instruction. We understand the challenges faced by Urdu teachers in creating diverse and engaging content, and our platform is built to address these needs.
                    </p>
                    <p>
                        Our team is dedicated to continuous improvement and innovation, ensuring that Hikmat remains at the forefront of educational technology. We work closely with educators, linguists, and AI experts to refine our algorithms and expand our offerings, always with the goal of enhancing the teaching and learning experience.
                    </p>
                    <p>
                        At Hikmat, we believe that language learning should be accessible, enjoyable, and effective. Our platform is designed to cater to various learning styles and proficiency levels, making it an invaluable resource for both teachers and students.
                    </p>
                    <p>
                        Join us in our journey to transform Urdu language education and empower the next generation of learners and educators.
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="team-member">
                                <img src="{{ asset('images/mehwish-asad.jpg') }}" alt="Mehwish Asad">
                                <h3>Mehwish Asad – CEO </h3>
                                <p>
                                    Mehwish has been working in the education sector for the last 8 years and has a passion to create innovative solutions for Teachers and Students. Her work has led her into such diverse areas as Lesson Planning improvements in Urdu Language, developing new ideas in Children's Education domain, as well as using Artificial Intelligence to create a massive new opportunity of learning for both Educators and Students. hikmat.ai is her brainchild, which she is using to enrich the field of Teaching in Urdu Language, both inside and outside Pakistan.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="team-member">
                                <img src="{{ asset('images/kamran-ali.jpg') }}" alt="Kamran Ali">
                                <h3>Kamran Ali – Technology Advisor</h3>
                                <p>
                                    Kamran is an 18-year veteran in the field of Information Technology with special focus on Artificial Intelligence and its impact on both businesses and the Society at large. He has been supporting Team hikmat as a Technology mentor, providing guidance on scaling the hikmat model to underserved areas in Pakistan as well as integrating it within large Education Groups in the Country.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection