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
      <h3 class="breadcrumbs-custom-title">Sorteo Participantes</h3>
    </div>
</section>

    {{-- <sorteo-participantes></sorteo-participantes> --}}
    <iframe width="100%" height="300px" src="{{ route('iframesorteo') }}">Tu navegador con es compatible</iframe>

@endsection

@section('scripts')


{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script> --}}

{{-- <script src="/js/script.js"></script> --}}
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
