@extends('layouts.app')

@section('nav-webgl') active @endsection
@section('content')
<div class="card">
    <div class="card-header">WebGL</div>
    <div class="card-body">
        <canvas id="glcanvas" width="640" height="480"></canvas>
    </div>
</div>
@endsection

@push('scripts-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gl-matrix/2.8.1/gl-matrix-min.js" integrity="sha512-zhHQR0/H5SEBL3Wn6yYSaTTZej12z0hVZKOv3TwCUXT1z5qeqGcXJLLrbERYRScEDDpYIJhPC1fk31gqR783iQ==" crossorigin="anonymous" defer></script>
<script src="{{ asset('adminlte/webgl-demo.js') }}" type="module"></script>
@endpush