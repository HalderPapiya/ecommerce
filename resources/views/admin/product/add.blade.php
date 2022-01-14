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
                            @foreach($levelOneCategories as $levelOneCategorie)
                            <option value="{{$levelOneCategorie->id}}">{{$levelOneCategorie->name}}</option>
                            @endforeach
                        </select>
                        @error('category_level_one_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label for="category_level_two_id">category_level_two_id</label>
                        <select class="form-control @error('category_level_two_idcategory_level_two_id') is-invalid @enderror" name="category_level_two_id"
                            id="category_level_two_id" value="{{ old('category_level_two_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach($levelTwoCategories as $levelTwoCategorie)
                            <option value="{{$levelTwoCategorie->id}}">{{$levelTwoCategorie->name}}</option>
                            @endforeach
                        </select>
                        @error('category_level_two_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label for="category_level_three_id">category_level_three_id</label>
                        <select class="form-control @error('category_level_three_id') is-invalid @enderror" name="category_level_three_id"
                            id="category_level_three_id" value="{{ old('category_level_three_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach($levelThreeCategories as $levelThreeCategorie)
                            <option value="{{$levelThreeCategorie->id}}">{{$levelThreeCategorie->name}}</option>
                            @endforeach
                        </select>
                        @error('category_level_three_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label for="category_level_four_id">category_level_four_id</label>
                        <select class="form-control @error('category_level_four_id') is-invalid @enderror" name="category_level_four_id"
                            id="category_level_four_id" value="{{ old('category_level_four_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach($levelFourCategories as $levelFourCategorie)
                            <option value="{{$levelFourCategorie->id}}">{{$levelFourCategorie->name}}</option>
                            @endforeach
                        </select>
                        @error('category_level_four_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label for="category_level_five_id">category_level_five_id</label>
                        <select class="form-control @error('category_level_five_id') is-invalid @enderror" name="category_level_five_id"
                            id="category_level_five_id" value="{{ old('category_level_five_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach($levelFiveCategories as $levelFiveCategorie)
                            <option value="{{$levelFiveCategorie->id}}">{{$levelFiveCategorie->name}}</option>
                            @endforeach
                        </select>
                        @error('category_level_five_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label for="brand_id">Brand</label>
                        <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id"
                            id="brand_id" value="{{ old('brand_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option> 
                            @endforeach
                            
                        </select>
                        @error('brand_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label for="seller_id">Seller</label>
                        <select class="form-control @error('seller_id') is-invalid @enderror" name="seller_id"
                            id="seller_id" value="{{ old('seller_id') }}">
                            <option selected disabled>Select one</option>
                            @foreach($sellers as $seller)
                            <option value="{{$seller->id}}">{{$seller->name}}</option> 
                            @endforeach
                            
                        </select>
                        @error('seller_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
              <!--   <div class="tile-body">
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
                </div> -->
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="name">Name <span class="m-l-5 text-danger">
                                *</span></label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name') }}" />
                        @error('name') {{ $message ?? '' }} @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="description">Description <span class="m-l-5 text-danger">
                                *</span></label>
                        <input class="form-control @error('description') is-invalid @enderror" type="text" name="description"
                            id="description" value="{{ old('description') }}" />
                        @error('description') {{ $message ?? '' }} @enderror
                    </div>
                </div>
                <!-- <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="image">Image <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('image') is-invalid @enderror" type="text" name="image"
                            id="image" value="{{ old('image') }}" />
                        @error('image') {{ $message ?? '' }} @enderror
                    </div>
                </div> -->
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