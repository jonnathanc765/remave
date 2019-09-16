@extends('frontend.layouts.app')

@section('title')
Contacto
@endsection

@section('contact')
    active
@endsection

@section('content')

<!-- ================ contact section start ================= -->
<section class="section-margin--small">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
            <div id="map" style="height: 420px;">
               <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.7898781037234!2d-69.44304148516699!3d10.034190775197702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e87637b1e76e2d7%3A0xcb6549e480fe8876!2s10+Av.+Florencio+Jim%C3%A9nez%2C+Barquisimeto+3001%2C+Lara!5e0!3m2!1ses!2sve!4v1565705342257!5m2!1ses!2sve" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Barquisimeto Lara</h3>
                        <p>Tosato</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:454545654">012345678998745631</a></h3>
                        <p>De lunes a viernes de 8:00 Am a 5:30 Pm.</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:support@myshop.com">remaveshopss@gmail.com.com</a></h3>
                        <p>Envíenos su consulta en cualquier momento!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
                <form action="#/" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
                    novalidate="novalidate">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Ingrese su nombre">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Ingrese su correo electronico">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text" placeholder="Ingrese su asunto">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <textarea class="form-control different-control w-100" name="message" id="message" cols="30"
                                    rows="5" placeholder="Ingrese su mensaje"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                        <button type="submit" class="button button--active button-contactForm">Enviar Mensaje</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@endsection
