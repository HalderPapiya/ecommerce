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
                <!-- <div class="tile-body">
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
                </div> -->
                <div class="tile-body">
                    <input type="hidden" name="id" value="{{ $targetProduct->id }}">

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
                        @error('category_level_one_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_level_two_id">Category Two</label>
                        <select class="form-control @error('category_level_two_id') is-invalid @enderror" name="category_level_two_id"
                            id="category_level_two_id" value="{{ old('category_level_two_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach ($levelTwoCategories as $categoryTwo)
                            <option value="{{$categoryTwo->id}}" @if($targetProduct->category_level_two_id ==
                                $categoryTwo->id){{('selected')}}@endif>{{$categoryTwo->name}}</option>
                            @endforeach
                        </select>
                        @error('category_level_two_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_level_three_id">Category Three</label>
                        <select class="form-control @error('category_level_three_id') is-invalid @enderror" name="category_level_three_id"
                            id="category_level_three_id" value="{{ old('category_level_three_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach ($levelThreeCategories as $categoryThree)
                            <option value="{{$categoryThree->id}}" @if($targetProduct->category_level_three_id ==
                                $categoryThree->id){{('selected')}}@endif>{{$categoryThree->name}}</option>
                            @endforeach
                        </select>
                        @error('category_level_three_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_level_four_id">Category Four</label>
                        <select class="form-control @error('category_level_four_id') is-invalid @enderror" name="category_level_four_id"
                            id="category_level_four_id" value="{{ old('category_level_four_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach ($levelFourCategories as $categoryFour)
                            <option value="{{$categoryFour->id}}" @if($targetProduct->category_level_four_id ==
                                $categoryFour->id){{('selected')}}@endif>{{$categoryFour->name}}</option>
                            @endforeach
                        </select>
                        @error('category_level_four_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_level_five_id">Category Five</label>
                        <select class="form-control @error('category_level_five_id') is-invalid @enderror" name="category_level_five_id"
                            id="category_level_five_id" value="{{ old('category_level_five_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach ($levelFiveCategories as $categoryFive)
                            <option value="{{$categoryFive->id}}" @if($targetProduct->category_level_five_id ==
                                $categoryFive->id){{('selected')}}@endif>{{$categoryFive->name}}</option>
                            @endforeach
                        </select>
                        @error('category_level_five_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="seller_id">Seller</label>
                        <select class="form-control @error('seller_id') is-invalid @enderror" name="seller_id"
                            id="seller_id" value="{{ old('seller_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach ($sellers as $seller)
                            <option value="{{$seller->id}}" @if($targetProduct->seller_id ==
                                $seller->id){{('selected')}}@endif>{{$seller->name}}</option>
                            @endforeach
                        </select>
                        @error('seller_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="brand_id">Brand</label>
                        <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id"
                            id="brand_id" value="{{ old('brand_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach ($brands as $brand)
                            <option value="{{$brand->id}}" @if($targetProduct->brand_id ==
                                $brand->id){{('selected')}}@endif>{{$brand->name}}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name', $targetProduct->name) }}" />
                        @error('name') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="description">Description <span class="m-l-5 text-danger">
                                *</span></label>
                        <input class="form-control @error('description') is-invalid @enderror" type="text" name="description"
                            id="description" value="{{ old('description', $targetProduct->description) }}" />
                        @error('description') {{ $message }} @enderror
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