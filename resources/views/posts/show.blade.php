@extends('main')

@section('title', '| View Post')

@section('content')

@section('stylesheet')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css')  !!}
	

	<!--add to show tags-->
@endsection 
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  
	<div class="row">
		<div class="col-md-8">

			<h1>{{ $post->title }}</h1>
	
			<p class="lead">{{ $post->body }}</p>

			<br>

			<div class="tags">
				@foreach ($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
					
				@endforeach
			</div>
			
	
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>
						Url :
						<label><a href="{{ route('blog.single', $post->slug) }}">{{route('blog.single', $post->slug)}}</a></label>
					</dt>
				</dl>

				<dl class="dl-horizontal">
					<dt>
						Category :
					<label><p>{{ $post->category->name }}</p></label>
					</dt>
				</dl>

				<dl class="dl-horizontal">
					<dt>Create At:</dt>
					<dd>{{ date('M j, Y h:i a',strtotime ($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:i a', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=> 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method'=>'DELETE'])!!}

						{!!Form::submit('Delete', ['class'=>'btn btn-danger btn-block'])!!}
						
						{!!Form::close()!!}
					</div>
				</div>
				<hr>	
				<div class="row">
					<div class="col-md-12">
						{!! Html::linkRoute('posts.index','<< See all Posts',array() ,['class'=> 'btn btn-info btn-block']) !!}
					</div>
				</div>
			</div>
			
		</div>
	</div>  
@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript" >
		$('.select2-multi').select2();
	</script>
@endsection 