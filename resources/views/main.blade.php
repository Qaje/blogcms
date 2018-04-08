<!DOCTYPE html>
<html lang="en">
      
    <head>

      @include('partials._head')
    
    </head>

  <body>

    @include('partials._nav')

        <!-- end Bootstrap navbar default-->
            
    <div class="container">
      @include('partials._messages')

        {{ Auth::check() ? "Logged In":"Loged Out" }}
        @yield('content')    

        @include('partials._footer')

      
    </div><!-- end of cotainer-->

    @include('partials._javascript')
  
    @yield('scripts')
  </body>
</html>