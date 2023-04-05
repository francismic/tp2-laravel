<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }} - @yield('title')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"  crossorigin="anonymous" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet" >
    </head>

    <body>
        <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
  {{-- session()->get('locale')--}}
   @php $lang = session()->get('locale') @endphp
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        @guest
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./">@lang('nav.text_login')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('etudiant.create')}}">@lang('nav.text_inscription')</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('blog.index')}}">@lang('nav.text_blog')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('documents.index')}}">@lang('nav.text_doc')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('etudiant.show', $etudiant->id) }}">@lang('nav.text_compte')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li>
        @endguest
        <a class="nav-link @if($lang=='fr') text-info @endif" href="{{route('lang', 'fr')}}">Français <i class="flag flag-french-guiana"></i></a>
        <a class="nav-link @if($lang=='en') text-info @endif" href="{{route('lang', 'en')}}">English <i class="flag flag-united-states"></i></a>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    @yield('content')
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"  crossorigin="anonymous"></script>

</html>