  <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BLOG</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="framework/12bool.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" charset="utf-8"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <header>
      <ul>
   <li>
     <a href="">Blog</a>
  </li>
 </ul>
   
 <ul>
  <li>
    <a href="">Home</a>
  </li>
 </ul>

  <ul>
   <li>    
        <a href="">Contact</a>
      
    </li>
   </ul>

    </header>
 Hello to

      <b>
      @auth
        {{ Auth::user() -> name }}
      @else
        GUEST
      @endauth
      </b>

      <br>

      @auth
        <form action="{{ route('logout') }}" method="post">
          @csrf
          @method('POST')
          <input type="submit" name="" value="LOGOUT">
        </form>
        <a href="{{ route('post.create') }}">CREATE NEW POST</a>
      @else
        <a href="{{ route('login') }}">LOGIN</a>
      @endauth

      <br>

      @auth
        <form action="{{ route('user.image.set') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <input type="file" name="image"><br>
          <input type="submit" name="" value="SAVE IMAGE">
        </form>

      @endauth

      @auth

        @if(Auth::user() -> image)

          <img class="picture_profile" src="{{ asset('images/' . Auth::user() -> image) }}">

        @endif

      @endauth

      @auth

        <p>Token: {{ Auth::user() -> api_token  }}</p>

      @endauth

      @yield('content')

    <footer>
       <ul>
     <li><a href=""><i class="fab fa-instagram ico"></i></a></li>
     <li><a href=""><i class="fab fa-twitter ico"></i></a></li>
     <li><a href=""><i class="fab fa-youtube ico"></i></a></li>
     <li><a href=""><i class="fab fa-linkedin"></i></a></li>
 </ul>
  
       <ul >
        <li><a href="">Terms & Conditions</a></li>
       </ul>
    
    </footer>
  </body>
</html>
