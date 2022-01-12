@extends('admin.app')
@section('title')
 {{ $pageTitle }} 
 @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <!-- {{-- <h1><i class="fa fa-tags"></i> Add Category</h1> --}} -->
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">
                {{ $subTitle }}
                    <!-- {{-- <span class="top-form-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Coupon</button>
                        <a class="btn btn-secondary" href=""><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </span> --}} -->
                </h3>
                <hr>
                <form action="{{ route('admin.coupon.store') }}" method="POST" role="form">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="coupon_code">Coupon Code <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('coupon_code') is-invalid @enderror" type="text" name="coupon_code" id="coupon_code" value="{{ old('name') }}"/>
                            @error('coupon_code') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            @error('title') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="type">Type <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('type') is-invalid @enderror" type="text" name="type" id="type" value="{{ old('type') }}"/>
                            @error('type') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="description">Description <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description') }}"/>
                            @error('description') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="expiry_date">Expiry Date <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('expiry_date') is-invalid @enderror" type="text" name="expiry_date" id="expiry_date" value="{{ old('description') }}"/>
                            @error('expiry_date') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="amount">Amount <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('amount') is-invalid @enderror" type="text" name="amount" id="amount" value="{{ old('amount') }}"/>
                            @error('amount') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <!-- <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="address">Address <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address') }}"/>
                            @error('address') {{ $message ?? '' }} @enderror
                        </div>
                    </div> -->
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Coupon</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.coupon.list') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection