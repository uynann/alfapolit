@extends('layouts.admin')

@section('title')
Categories
@endsection

@section('content')

<div class="page all-items admin-wrapper">
    <div class="page-header">
        <h2>Categories</h2>
    </div>

    <div class="group">
        <div class="col span_3_of_5">
            <div class="items-table">
                <div class="item-titles group">
                    <div class="col span_2_of_6">
                        <b>Name</b>
                    </div>
                    <div class="col span_3_of_6">
                        <b>Description</b>
                    </div>
                </div>

                @foreach($categories as $category)
                <div class="item-body group">
                    <div class="col span_2_of_5 khmer">
                        <a href="">{{ $category->name }}</a>
                    </div>
                    <div class="col span_2_of_5 khmer">
                        <p>{{ $category->description }}</p>
                    </div>
                    <div class="col span_1_of_5">
                        <a href="{{ url('/admin/categories/' . $category->id . '/edit') }}" class="btn btn-small"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="" class="btn btn-small"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="note-on-page">
                <span><strong><em>Note:</em></strong></span>
                <span><em>Deleting a post does not delete it permanently. Instead post is moved to trash.</em></span>
            </div>
        </div>

        <div class="col span_2_of_5">
            <h3 class="add-category-header">Add New Category</h3>
            <form action="{{ url('/admin/categories') }}" class="new-form" method="POST">
                {{ csrf_field() }}
                <div class="group">
                    <div class="col span_2_of_6">
                        <p><sup>*</sup> Name:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <input type="text" class="form-control" placeholder="ឈ្មោះផ្នែក" name="name" value="{{ old('name') }}">

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
                        <textarea class="form-control" placeholder="បរិយាយ" rows="4" name="description">{{ old('description') }}</textarea>

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
                        <input type="submit" class="btn btn-small" value="Create">
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
