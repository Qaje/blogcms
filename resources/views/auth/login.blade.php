@extends('main')

@section('title', '| Login')

@section('content')

    <div class="row justify-content-center">
        
        <div class="col-md-5 col-md-offset-3">
            {!! Form::open()!!}
                {{Form::label('email',"Email:")}}
                {{Form::email('email',null,['class'=>'form-control'])}}

                {{Form::label('password',"Password:")}}
                {{Form::password('password',['class'=>'form-control'])}}
                <br>
                {{Form::checkbox('remember')}}{{Form::label('remember','Remember me')}}
                <br>
                {{Form::submit('Login',['class'=>'btn btn-primary btn-block'])}}
            {!! Form::close()!!}
        
        </div>
    </div> 
@endsection

