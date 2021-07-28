@extends('layouts.app')

@section('content')
<div id="app">
    <div class="row">
        <div class="col-xl-8">
        </div>
        <div class="col-xl-4">
        </div>
    </div>
</div>
@endsection

@push('socketjs')
    <script src="{{ asset('black') }}/js/socket.io.js"></script>
@endpush
