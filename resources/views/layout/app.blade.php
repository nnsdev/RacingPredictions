<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Racing Predictions</title>
    <meta name="description" content="description here">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-black-alt font-sans leading-normal tracking-normal">
<div id="app">
	<nav id="header" class="bg-black fixed w-full z-10 pin-t shadow">
			<div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
				<div class="w-1/2 pl-2 md:pl-0">
					<a class="text-grey-lightest text-base xl:text-xl no-underline hover:no-underline font-bold"  href="/dashboard">
						<i class="fas fa-moon text-blue-light pr-3"></i> Racing Predictions
					</a>
							</div>
				<div class="w-1/2 pr-0">
					<div class="flex relative inline-block float-right">
						<div class="relative text-sm text-grey-lightest">
							<button id="userButton" class="flex items-center focus:outline-none mr-3">
							<img class="w-8 h-8 rounded-full mr-4" src="{{ Auth::user()->avatar }}" alt="Avatar of User"> <span class="hidden md:inline-block text-grey-lightest">{{ Auth::user()->name }}</span>
							<svg class="pl-2 h-2 fill-current text-grey-lightest" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/></g></svg>
							</button>
							<div id="userMenu" class="bg-black rounded shadow-md mt-2 absolute mt-12 pin-t pin-r min-w-full overflow-auto z-30 invisible">
								<ul class="list-reset">
								<li><a href="#" class="px-4 py-2 block text-grey-lightest hover:bg-grey-darkest no-underline hover:no-underline">My profile</a></li>
								<li><hr class="border-t mx-2 border-grey-light"></li>
								<li><a href="#" class="px-4 py-2 block text-grey-lightest hover:bg-grey-darkest no-underline hover:no-underline">Logout</a></li>
								</ul>
							</div>
						</div>


						<div class="block lg:hidden pr-4">
						<button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-grey border-grey-dark hover:text-grey-lightest hover:border-teal appearance-none focus:outline-none">
							<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
						</button>
					</div>
					</div>

				</div>


				<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-black z-20" id="nav-content">
					<ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
											@foreach([["dashboard", "Dashboard", "home"], ["leaderboard", "Leaderboard", "table"]] as $link)
						<li class="mr-6 my-2 md:my-0">
													<a href="{{ $link[0] }}" class="block py-1 md:py-3 pl-1 align-middle @if(Request::is($link[0])) text-blue-light hover:border-blue-light  border-b-2 border-blue-light @else text-grey hover:border-pink-light border-b-2 border-transparent hover:border-pink-light @endif no-underline hover:text-grey-lightest">
															<font-awesome-icon :icon="['fas', '{{ $link[2] }}']" class="fa-fw @if(Request::is($link[0])) text-blue-light @endif"></font-awesome-icon>
															<span class="pb-1 md:pb-0 text-sm">{{ $link[1] }}</span>
													</a>
											</li>
											@endforeach
					</ul>
				</div>
			</div>
		</nav>

			@yield('content')
    </div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>