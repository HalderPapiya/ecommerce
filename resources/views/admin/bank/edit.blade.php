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
                <form action="{{ route('admin.bank.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                    <input type="hidden" name="id" value="{{ $targetBank->id }}">
                       
                        <div class="form-group">
                            <label class="control-label" for="type">Bank Type <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('type') is-invalid @enderror" type="text" name="type" id="title" value="{{ old('title', $targetBank->type) }}"/>
                            @error('title') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="bank_name">bank_name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('bank_name') is-invalid @enderror" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $targetBank->bank_name) }}"/>
                            @error('bank_name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="beneficiary_name">beneficiary_name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('beneficiary_name') is-invalid @enderror" type="text" name="beneficiary_name" id="beneficiary_name" value="{{ old('beneficiary_name', $targetBank->beneficiary_name) }}"/>
                            @error('beneficiary_name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="IFSC">IFSC <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('IFSC') is-invalid @enderror" type="text" name="IFSC" id="pin_code" value="{{ old('IFSC', $targetBank->IFSC) }}"/>
                            @error('IFSC') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="branch_name">branch_name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('branch_name') is-invalid @enderror" type="text" name="branch_name" id="branch_name" value="{{ old('branch_name', $targetBank->branch_name) }}"/>
                            @error('branch_name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="acount_no">acount_no <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('acount_no') is-invalid @enderror" type="text" name="acount_no" id="acount_no" value="{{ old('acount_no', $targetBank->acount_no) }}"/>
                            @error('acount_no') {{ $message }} @enderror
                        </div>
                    </div>
                    
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Bank Details</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.bank.list') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection