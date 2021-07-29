@extends('layouts.app')

@section('content')
<div id="app">
</div>
@endsection

@push('socketjs')
    <script src="{{ asset('black') }}/js/socket.io.js"></script>
@endpush
