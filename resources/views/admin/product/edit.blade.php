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
            <form action="{{ route('admin.product.update') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label for="category_level_one_id">Category One</label>
                        <select class="form-control @error('category_level_one_id') is-invalid @enderror" name="category_level_one_id"
                            id="category_level_one_id" value="{{ old('category_level_one_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach ($levelOneCategories as $categoryOne)
                            <option value="{{$categoryOne->id}}" @if($targetProduct->category_level_one_id ==
                                $categoryOne->id){{('selected')}}@endif>{{$categoryOne->name}}</option>
                            @endforeach
                        </select>
                        @error('user_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update
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