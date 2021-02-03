@extends('layouts.layout')

@section('SectionRegisterForm')

<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(images/bg-breadcrumbs-01-1894x424.jpg);">
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="/">VI Full Day</a></li>
        <li class="active">Formulario de registro</li>
      </ul>
      <h3 class="breadcrumbs-custom-title">Participa en nuestro evento</h3>
    </div>
</section>

<div id="app">
    <register-form-component></register-form-component>
</div>
@endsection

@section('scripts')
<script src="/js/app.js"></script>
{{-- <script>
    var app = new Vue({
      el: '#app',
      data: {
        message: 'Hello Vue!'
      }
    })
</script> --}}
@endsection
