@extends('layouts.admin')

@section('title')
Edit Category
@endsection

@section('content')

<div class="page all-items admin-wrapper">
    <div class="page-header">
        <h2>Edit Category</h2>
        <a href="{{ url('/admin/categories') }}" class="btn btn-small">Back to Category</a>
    </div>

    <div class="group">
       <div class="col span_1_of_5"></div>
        <div class="col span_3_of_5">
            <form action="{{ url('/admin/categories/' . $category->id) }}" class="new-form" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="group">
                    <div class="col span_2_of_6">
                        <p><sup>*</sup> Name:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="ឈ្មោះផ្នែក" name="name" value="{{ $category->name }}">

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <p>{{ $errors->first('name') }}</p>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="group">
                    <div class="col span_2_of_6">
                        <p>Description:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <textarea class="form-control" placeholder="បរិយាយ" rows="4" name="description">{{ $category->description }}</textarea>

                        @if ($errors->has('description'))
                        <span class="help-block">
                            <p>{{ $errors->first('description') }}</p>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="group">
                    <div class="col span_2_of_6">
                    </div>
                    <div class="col span_2_of_6">
                        <input type="submit" class="btn btn-small" value="Update">
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
