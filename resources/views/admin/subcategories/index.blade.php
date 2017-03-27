@extends('layouts.admin')

@section('title')Subcategories @endsection

@section('content')

<div class="page all-items admin-wrapper">
    <div class="page-header">
        <h2>Sub Categories</h2>
    </div>

    @if(session('message'))
    <div class="message">
        <p>{{ session('message') }}</p>
        <span class="close-message"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>
    @endif

    <div class="statistics">
        @if( count($subcategories) == 1)
        <span>{{ count($subcategories) }} item</span>
        @elseif (count($subcategories) > 1)
        <span>{{ count($subcategories) }} items</span>
        @endif
    </div>

    <div class="items-table">
        <div class="item-titles group">
            <div class="col span_1_of_6">
                <b>Name</b>
            </div>
            <div class="col span_1_of_6">
                <b>Category</b>
            </div>
            <div class="col span_1_of_6">
                <b>Articles</b>
            </div>
            <div class="col span_2_of_6">
                <b>Description</b>
            </div>
            <div class="col span_1_of_6">
                <b>Action</b>
            </div>
        </div>

        @forelse($subcategories as $subcategory)
        <div class="item-body group">
            <div class="col span_1_of_6 khmer">
                <a href="">{{ $subcategory->name }}</a>
            </div>
            <div class="col span_1_of_6 khmer">
                <p>{{ $subcategory->category->name }}</p>
            </div>
            <div class="col span_1_of_6 khmer">
                <p>{{ count($subcategory->articles) }}</p>
            </div>
            <div class="col span_2_of_6 khmer">
                <p>{{ $subcategory->description }}</p>
            </div>
            <div class="col span_1_of_6">
                <a href="{{ url('/admin/subcategories/' . $subcategory->id . '/edit') }}" class="btn btn-small"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                <form class="delete-form" action="{{ url('/admin/subcategories/' . $subcategory->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-small"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
        @empty
        <div class="item-body group">
            <p class="not-found-text">No sub categories found.</p>
        </div>
        @endforelse
    </div>

    <div class="note-on-page">
        <span><strong><em>Note:</em></strong></span>
        <span><em>Deleting a sub category does not delete articles associated to it.</em></span>
    </div>

    <div class="add-new-subcategory group">
        <div class="col span_1_of_5"></div>
        <div class="col span_3_of_5">
            <h3 class="add-category-header">Add New Sub Category</h3>
            <form action="{{ url('/admin/subcategories') }}" class="new-form" method="POST">
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
                        <p><sup>*</sup> Category:</p>
                    </div>
                    <div class="col span_4_of_6 khmer">
                        <select class="form-control" name="category" value="{{ old('category') }}">
                            @foreach($categories as $key=>$category)
                            @if($key == count($categories))
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            @endforeach
                        </select>
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


<div class="confirm-modal">
    <div class="modal-header">
        <h3>Delete Sub Category</h3>
        <span class="close-modal"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this sub category?</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn confirm">Yes</button>
        <button type="button" class="btn btn-trans cancel">Cancel</button>
    </div>
</div>

<div class="modal-overlay"></div>

@endsection
