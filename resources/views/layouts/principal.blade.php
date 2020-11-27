<!doctype html>
<html>
	<head>
		<title>@yield('title')</title> 
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body>
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Nome do projeto</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">Etapas de desenvolvimento</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#" >Sobre os desenvolvedores</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
    <hr>
	<section>
			@yield('content')
    </section>
    <hr>
	<footer>
		Todos os direitos reservados
    </footer>
        
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\jquery.mask.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\jquery.maskMoney.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
	</body>
</html>