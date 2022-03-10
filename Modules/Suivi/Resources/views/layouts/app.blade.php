<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MolenGeek - dashboard</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">



            <!-- Page Content -->
            <main>
                <div class="flex">
                    <!-- component -->
                    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-200 text-white"> 
                        <div class="fixed flex flex-col top-0 left-0 w-70 bg-gray-800 h-full border-purple-400" style="height: 100vh; width:15%">
                                <img src="/img/MG_LOGO_fav.png" alt="logo MG" style="width: 20%" class="mx-auto mt-4">

                            <h4 class="text-center my-2 text-lg">{{ Auth::user()->nom }} </h4>
                            <a href=""
                            class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-50 text-white hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Retour vers le site</span>
                        </a>

                            <div class="overflow-y-auto overflow-x-hidden flex-grow">
                                <ul class="flex flex-col py-4">
                                    <li>
                                        <a href="{{route('back')}}"
                                            class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-50 text-white hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                                            <span class="inline-flex justify-center items-center ml-4">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{route('etudiant.index')}}"
                                            class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-50 text-white hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                                            <span class="inline-flex justify-center items-center ml-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                                </svg>
                                            </span>
                                            <span class="ml-2 text-sm tracking-wide truncate">Etudiants</span>
                                        </a>
                                    </li>

                                    <li class="px-5">
                                        <div class="flex flex-row items-center h-8">
                                            <div class="text-sm font-light tracking-wide text-gray-500">Evenements</div>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="{{route('seance.index')}}"
                                            class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-50 text-white hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                                            <span class="inline-flex justify-center items-center ml-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                                </svg>
                                            </span>
                                            <span class="ml-2 text-sm tracking-wide truncate">Programmation</span>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href=""
                                            class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-50 text-white hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                                            <span class="inline-flex justify-center items-center ml-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                                </svg>
                                            </span>
                                            <span class="ml-2 text-sm tracking-wide truncate">Classe</span>
                                        </a>
                                    </li>
                                    <form action="{{route('logout')}}" method="post" class="relative flex flex-row items-center h-8 focus:outline-none hover:bg-gray-50 text-white hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                                        @csrf
                                        <button type='submit'
                                        class="inline-flex justify-center items-center">
                                            <span class="inline-flex justify-center items-center ml-4">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="ml-2 text-sm tracking-wide truncate">Se déconnecter</span>
                                        </button>
                                    </form>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full dash_space h-screen">
                        <div class=" flex flex-col justify-center items-center h-screen">
                            <div class="bg-white overflow-hidden shadow-lg rounded-2xl height_size " style="overflow-y: scroll; max-height:90vh; margin:10vw; height:70vh; width:60vw">                                
                                @yield('slot')
                            </div>
                        </div>
                    </div>
                    
                </div>
            
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>
</html>
