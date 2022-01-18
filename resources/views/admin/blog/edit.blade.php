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
            <form action="{{ route('admin.blog.update',['id' => $targetBlog->id]) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    <input type="hidden" name="id" value="{{ $targetBlog->id }}">
                    <div class="form-group">
                        <label class="control-label" for="image">Image <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                            id="image" />
                        @error('image') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                            id="title" value="{{ old('title', $targetBlog->title) }}" />
                        @error('title') {{ $message }} @enderror
                    </div>
                </div>
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="description">Description <span class="m-l-5 text-danger">
                                *</span></label>
                        <input class="form-control @error('description') is-invalid @enderror" type="text"
                            name="description" id="description"
                            value="{{ old('description', $targetBlog->description) }}" />
                        @error('description') {{ $message }} @enderror
                    </div>
                </div>


                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                        Blog</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="{{ route('admin.blog.list') }}"><i
                            class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection