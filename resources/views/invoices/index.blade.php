@extends('layouts.master')

@section('scripts')
    @livewireScripts
@endsection

@section('content')
    @include('partials.navbar')
    <div class="p-4" style="margin-top: 10%">
        @livewire('invoice-table', ['invoices' => $invoices])
    </div>
@endsection
