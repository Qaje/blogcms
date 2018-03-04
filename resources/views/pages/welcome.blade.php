            <!-- Bootstrap navbar default-->
         
<!-- end Bootstrap navbar default-->
@extends('main')

@section('title','| Homepage')

@section('content')        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                      <h1 class="display-4">Bienvenido a Blog!</h1>
                      <p class="lead">Muchas gracias por visitar .este web site develop con Laravel </p>
                      <hr class="my-4">
                      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                      <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" role="button">Populares Post</a>
                      </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="post">
                        <h3>Post Title</h3>
                        <p>
                             Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                        </p>
                            <a href="#" class="btn btn-primary"> Leer Mas</a>
                        
                    </div>
                    <hr>
                    <div class="post">
                        <h3>Post Title</h3>
                        <p>
                             Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                        </p> 
                        <a href="#" class="btn btn-primary"> Leer Mas</a>
                    </div>
                    <hr>
                    <div class="post">
                        <h3>Post Title</h3>
                        <p>
                             Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                        </p>
                        <a href="#" class="btn btn-primary"> Leer Mas</a>
                    </div>
                    <hr>
                </div>
                <div class="col-md-3 col-md-offset-1" >
                    <h2>Sidebar</h2>
                </div>
            </div>

        </div>
@endsection


  </body>
</html>