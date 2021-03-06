@extends('main')

@section('title','| Forgot my Password')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Reset Password</div>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                    {!! Form::open(['url'=>'password/reset', 'method'=>'GET'])!!}

                    {{ Form::hidden('token',$token) }}

                    {{ Form::label('email','Email Address:')}}
                    {{ Form::email('email', $email , ['class'=>'form-control'])}}
                        
                    {{ Form::label('password','New Password:')}}
                    {{ Form::password('password',['class' => 'form-control'])}}

                    {{ Form::label('password_confirmation','Confirm new Password:')}}
                    {{ Form::password('password_confirmation',['class'=>'form-control'])}}
                    
                    {{ Form::submit('Reset Password',['class'=>'btn btn-primary'])}}

                    {!! Form::close()!!}
                    </div>
                </div>
            </div>     
    </div>   
    </div>
</div>
@endsection
