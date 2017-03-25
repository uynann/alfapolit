@extends('layouts.admin')

@section('title')
Profile
@endsection

@section('content')

<div class="page all-items admin-wrapper">
    <div class="page-header">
        <h2>Custom Fields</h2>
    </div>

    @if(session('message'))
    <div class="message">
        <p>{{ session('message') }}</p>
        <span class="close-message"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>
    @endif


</div>

@endsection
