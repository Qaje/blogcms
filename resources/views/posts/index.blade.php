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
        <div class="col-md-12">
            <table class="table table-dark">
                <thead class="thead-dark">
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created at</th>
                    <th>Options</th>
                </thead>
                
                <tbody>
                    
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ substr($post->body,0 , 3) }}{{ strlen($post->body)>3 ? "..." : ""}}</td>
                            <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post->id )}} " class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('posts.edit', $post->id )}}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop