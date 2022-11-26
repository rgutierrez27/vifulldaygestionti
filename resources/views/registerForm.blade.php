@extends('layouts.layout')

@section('styles')
  <style>
      .rd-navbar{
        display: none !important;
      }

      .breadcrumbs-custom{
        padding: 5% !important;
      }

      .footer{
        display: none !important;
      }
  </style>
@endsection

@section('SectionRegisterForm')

<div id="app">
    <register-form-component></register-form-component>
</div>
@endsection

@section('scripts')
<script>
    const event_                = @json($event);
    const concepto_inscripcion  = @json($concepto_inscripcion);
    const concepto_certificado  = @json($concepto_certificado);
</script>
<script src="/js/app.js"></script>
@endsection
