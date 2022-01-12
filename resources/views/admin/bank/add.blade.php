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
                <form action="{{ route('admin.bank.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                    <input type="hidden" name="user_id">
                        <div class="form-group">
                        <label class="control-label" for="type"> Type <span class="m-l-5 text-danger"> *</span></label><br>
                            <input type="radio" id="home" name="type" value="Home">
                            <label for="home">Home</label><br>
                            <input type="radio" id="work" name="type" value="Work">
                            <label for="work">Work</label><br>
                            <input type="radio" id="other" name="type" value="Other">
                            <label for="other">Other</label>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="bank_name">Bank Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('bank_name') is-invalid @enderror" type="text" name="bank_name" id="street" value="{{ old('bank_name') }}"/>
                            @error('bank_name') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="beneficiary_name">beneficiary name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('beneficiary_name') is-invalid @enderror" type="text" name="beneficiary_name" id="beneficiary_name" value="{{ old('beneficiary_name') }}"/>
                            @error('beneficiary_name') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="IFSC">IFSC <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('IFSC') is-invalid @enderror" type="text" name="IFSC" id="IFSC" value="{{ old('IFSC') }}"/>
                            @error('IFSC') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="branch_name">branch_name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('branch_name') is-invalid @enderror" type="text" name="branch_name" id="branch_name" value="{{ old('branch_name') }}"/>
                            @error('branch_name') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="acount_no">acount_no <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('acount_no') is-invalid @enderror" type="text" name="acount_no" id="acount_no" value="{{ old('acount_no') }}"/>
                            @error('acount_no') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Bank</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.bank.list') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection