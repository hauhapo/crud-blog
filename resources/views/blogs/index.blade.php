@extends('blogs.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Check all Blogs</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create new blogs</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Description</th>
        <th width="250px">Action</th>
    </tr>
    @foreach ($blogs as $blog)
    <tr>
        <td>{{ $blog->title }}</td>
        <td>{{ $blog->description }}</td>
        <td>
            <div class="d-flex">
                <div >
                    <a class="btn btn-info" href="{{ route('blogs.show', $blog->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                </div>
                <div class="">
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>        
            </div>
        </td>
    </tr>
    @endforeach
</table>

@endsection
