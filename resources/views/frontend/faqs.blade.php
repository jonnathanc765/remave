@extends('frontend.layouts.app')

@section('title')
Preguntas Frecuentes
@endsection

@section('contact')
    active
@endsection

@section('content')

<!-- ================ contact section start ================= -->
<section class="section-margin--small">
    <div class="container">
        

        <div class="row">
            <div class="col-md-12">
                

                @forelse ($faqs as $faq)
                <h4>Pregunta # {{ $loop->iteration }}</h4>
                <blockquote class="blockquote text-center">
                    
                    <p class="text-left">{{ $faq->question }}</p>
                    <span class="text-primary text-left">Respuesta</span>
                    <p class="mb-0">{{ $faq->answer }}</p>
                    
                </blockquote>
                @empty
                    
                @endforelse


            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@endsection
