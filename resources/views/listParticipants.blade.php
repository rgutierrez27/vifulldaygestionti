@extends('layouts.layout')

@section('styles')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css"> --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">

@endsection

@section('SectionRegisterForm')

<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(/images/bg-breadcrumbs-01-1894x424.jpg);">
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="/">V CONGRESO MUNDIAL DE INVESTIGACIÓN CIENTÍFICA</a></li>
        <li class="active">Participantes</li>
      </ul>
      <h3 class="breadcrumbs-custom-title">Lista Participantes</h3>
    </div>
</section>

<div id="app">

    <lista-participantes></lista-participantes>
</div>
@endsection

@section('scripts')
<script src="/js/app.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.js"></script> --}}
{{-- <script>
    var app = new Vue({
      el: '#app',
      data: {
        message: 'Hello Vue!'
      }
    })
</script> --}}
@endsection
