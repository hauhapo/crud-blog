@extends('blogs.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb pb-3">
        <div class="pull-left">
            <h2>Create New Blog</h2>
        </div>
        <div class="pb-3 pull-right">
            <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>
        </div>
    </div>
</div>

<form action="{{ route('blogs.store') }}" method="POST">

    @csrf
    <div class="row">
        @if ($errors->has('title')) 
        <div class="alert alert-danger">
            <strong>Warning!</strong>Please check your input code<br><br>
            <ul>
                @foreach ($errors->get('title') as $errormessage) 
                {{ $errormessage }}<br>
                @endforeach

            </ul>
        </div>
        @endif

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
            </div>
        </div>

        @if ($errors->has('description')) 
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check your input code<br><br>
            <ul>
                @foreach ($errors->get('description') as $errormessage) 
                {{ $errormessage }}<br>
                @endforeach

            </ul>
        </div>
        @endif

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:280px" name="description" placeholder="Description"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
