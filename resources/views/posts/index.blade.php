@extends('main')

@section('title','| All Posts')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-4">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Creando un Nuevo Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div><!--finnde row-->
    
    <div class="row">
        <div class="col-md-2">
            <table class="table table-dark">
                <thead class="thead-dark">
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created at</th>
                    <th></th>
                </thead>
                
                <tbody>
                    
                    @foreach ($posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td><a href="#" class="btn btn-default">View</a><a href="#" class="btn btn-default">Edit</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop