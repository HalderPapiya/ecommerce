@extends('admin.app')
@section('title')
{{ $pageTitle }}
@endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        {{-- <h1><i class="fa fa-tags"></i> Add Category</h1> --}}
    </div>
</div>
@include('admin.partials.flash')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="tile">
            <h3 class="tile-title">
                {{ $subTitle }}
                {{-- <span class="top-form-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Category</button>
                        <a class="btn btn-secondary" href=""><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </span> --}}
            </h3>
            <hr>
            <form action="{{ route('admin.product.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label for="category_level_one_id">category_level_one_id</label>
                        <select class="form-control @error('category_level_one_id') is-invalid @enderror" name="category_level_one_id"
                            id="category_level_one_id" value="{{ old('category_level_one_id') }}">
                            <option selected disabled>Select one</option>
                            <option value="customer">Customer</option>
                            <option value="seller">Seller</option>
                        </select>
                        @error('category_level_one_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <input type="hidden" name="user_id">
                    <div class="form-group">
                        <label class="control-label" for="type">Address Type <span class="m-l-5 text-danger">
                                *</span></label><br>
                        <input type="radio" id="home" name="type" value="Home">
                        <label for="home">Home</label>
                        <input type="radio" id="work" name="type" value="Work">
                        <label for="work">Work</label>
                        <input type="radio" id="other" name="type" value="Other">
                        <label for="other">Other</label>
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="street">Street <span class="m-l-5 text-danger">
                                *</span></label>
                        <input class="form-control @error('street') is-invalid @enderror" type="text" name="street"
                            id="street" value="{{ old('street') }}" />
                        @error('street') {{ $message ?? '' }} @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="city">City <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('city') is-invalid @enderror" type="text" name="city"
                            id="city" value="{{ old('city') }}" />
                        @error('city') {{ $message ?? '' }} @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="pin_code">Pin Code <span class="m-l-5 text-danger">
                                *</span></label>
                        <input class="form-control @error('pin_code') is-invalid @enderror" type="text" name="pin_code"
                            id="pin_code" value="{{ old('pin_code') }}" />
                        @error('pin_code') {{ $message ?? '' }} @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="state">State <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('state') is-invalid @enderror" type="text" name="state"
                            id="state" value="{{ old('state') }}" />
                        @error('state') {{ $message ?? '' }} @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="country">Country <span class="m-l-5 text-danger">
                                *</span></label>
                        <input class="form-control @error('country') is-invalid @enderror" type="text" name="country"
                            id="country" value="{{ old('country') }}" />
                        @error('country') {{ $message ?? '' }} @enderror
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save
                    Product</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="{{ route('admin.product.list') }}"><i
                            class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection