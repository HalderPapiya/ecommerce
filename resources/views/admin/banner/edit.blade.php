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
                <form action="{{ route('admin.banner.update',['id' => $targetBanner->id]) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                    <input type="hidden" name="id" value="{{ $targetBanner->id }}">
                        <div class="form-group">
                            <label class="control-label" for="image">Image <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image"/>
                            @error('image') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $targetBanner->title) }}"/>
                            @error('title') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">Description <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description', $targetBanner->description) }}"/>
                            @error('description') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="redirect_link">Url <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('redirect_link') is-invalid @enderror" type="text" name="redirect_link" id="redirect_link" value="{{ old('redirect_link', $targetBanner->redirect_link) }}"/>
                            @error('redirect_link') {{ $message }} @enderror
                        </div>
                    </div>
                    
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Banner</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.banner.list') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection