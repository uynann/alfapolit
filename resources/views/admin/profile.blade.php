@extends('layouts.admin')

@section('title')
Profile
@endsection

@section('content')

<div class="page all-items admin-wrapper">
    <div class="page-header">
        <h2>Profile</h2>
    </div>

    @if(session('message'))
    <div class="message">
        <p>{{ session('message') }}</p>
        <span class="close-message"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>
    @endif

    <div class="group">
        <div class="col span_1_of_5"></div>
        <div class="col span_3_of_5">
            <form action="{{ url('/admin/profile') }}" class="new-form" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="group">
                    <div class="col span_2_of_6">
                        <p>Name:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="ឈ្មោះអ្នក" name="name" value="{{ $user->name }}">

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <p>{{ $errors->first('name') }}</p>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="group">
                    <div class="col span_2_of_6">
                        <p><sup>*</sup> Email:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="អីម៉ែល" name="email" value="{{ $user->email }}">

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <p>{{ $errors->first('email') }}</p>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="group">
                    <div class="col span_2_of_6">
                    </div>
                    <div class="col span_2_of_6">
                        <input type="submit" class="btn btn-small" value="Save">
                    </div>
                </div>
            </form>

            <div class="note-on-page">
                <span><strong><em>Note:</em></strong></span>
                <span><em>Fields marked with &#42;  are required.</em></span>
            </div>
        </div>
    </div>
</div>

@endsection
