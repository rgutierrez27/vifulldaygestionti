@extends('layouts.layout')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css">

@endsection

@section('SectionRegisterForm')

<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(images/bg-breadcrumbs-01-1894x424.jpg);">
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="/">VI Full Day</a></li>
        <li class="active">Confirmación</li>
      </ul>
      <h3 class="breadcrumbs-custom-title">Confirmación de correo</h3>
    </div>
</section>

<div id="app">
    <section class="section section-lg bg-default text-center">|
        <div class="container">
        <div class="row justify-content-md-center" id="infoAfterRegister">
            <div class="col-md-12 col-lg-8">
                <h4>Correo Verificado</h4>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script src="/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.js"></script>
{{-- <script>
    var app = new Vue({
      el: '#app',
      data: {
        message: 'Hello Vue!'
      }
    })
</script> --}}
@endsection
