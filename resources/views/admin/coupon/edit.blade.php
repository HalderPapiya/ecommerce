@extends('admin.app')
@section('title'){{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            {{-- <h1><i class="fa fa-tags"></i> Edit Category</h1> --}}
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.coupon.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                    <input type="hidden" name="id" value="{{ $targetCoupon->id }}">
                        <div class="form-group">
                            <label class="control-label" for="coupon_code">Coupon Code <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('coupon_code') is-invalid @enderror" type="text" name="coupon_code" id="coupon_code" value="{{ old('name', $targetCoupon->coupon_code) }}"/>
                            @error('coupon_code') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $targetCoupon->title) }}"/>
                            @error('title') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="description">Description <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description', $targetCoupon->description) }}"/>
                            @error('description') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="expiry_date">Expiry Date <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('expiry_date') is-invalid @enderror" type="text" name="expiry_date" id="expiry_date" value="{{ old('expiry_date', $targetCoupon->expiry_date) }}"/>
                            @error('expiry_date') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="amount">Amount <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('amount') is-invalid @enderror" type="text" name="amount" id="amount" value="{{ old('amount', $targetCoupon->amount) }}"/>
                            @error('expiry_date') {{ $message }} @enderror
                        </div>
                    </div>
                    
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Coupon</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.coupon.list') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection