<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Magup</title>

        <link rel="stylesheet" href="{{ asset('/assets/css/tailwind.css') }}" />
        <link rel="stylesheet" href="{{ asset('/assets/css/iziModal.min.css') }}" />
        <link href="{{ asset('/assets/css/fonts.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/assets/welcome/style.css') }}" />
    </head>
    <body class="overflow-x-hidden bg-auto lg:bg-cover">
        <!-- top section -->
        <div style="background-image: url('{{ asset('/img/slider.png') }}');" class="relative bg-image">
            <div class="h-2"></div>
            <nav id="navbar" class="w-full p-10 flex items-center justify-between flex-wrap">
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ asset('/') }}" class="inline nav-logo uppercase">MAGUP</a>
                </div>
                <div class="hidden w-full block flex-grow lg:flex lg:items-center lg:w-auto ml-10">
                    <div class="text-sm lg:flex-grow">
                        <span class="relative">
                            <a href="{{ asset('/') }}" class="mx-3 nav-item">
                                <i class="fas fa-home"></i>
                                Accueil
                            </a>
                        </span>
                        <span class="relative">
                            <a href="{{ asset('/') }}" class="mx-3 nav-item">
                                <i class="fas fa-eye"></i>
                                Démonstration
                            </a>
                        </span>
                        <span class="relative">
                            <a href="{{ asset('/') }}" class="mx-3 nav-item">
                                <i class="fas fa-pen"></i>
                                Contact
                            </a>
                        </span>
                    </div>
                </div>
                <div class="hidden lg:inline">
                    <a @if(!Auth::check())data-izimodal-open="#auth-modal" href="#" @else href="{{ route('dashboard') }}" @endif class="transition px-5 ease-in-out duration-300 text-gray-100 border-solid border rounded p-2 text-sm focus:text-indigo-700 uppercase border-gray-400 hover:text-indigo-700 font-bold fill-up">Espace utilisateur</a>
                </div>
                <div class="lg:hidden inline-block">
                    <a href="javascript:void(0)" id="OpenSideNav" class="bg-tab p-3 rounded-full">
                        <i class="ty-0-5 fas fa-bars text-2xl text-white"></i>
                    </a>
                </div>
            </nav>
            <div class="text-center mt-24 masked ">
                <a class="text-gray-400 text-sm uppercase font-bold">Créer votre boutique dès maintenant</a>
                <h1 class="uppercase text-gray-100 font-bold text-4xl">COMMENCER</h1>
                <div class="flex justify-center">
                    <a class="p-4 my-4 bg-white rounded-l-25 text-gray-500"><i class="mt-1 fas fa-globe text-2xl"></i></a>
                    <input type="text" class="p-4 lg:w-1/3 md:w-2/4 w-3/5 my-4 focus:outline-none main-gs" placeholder="Choisissez le nom de votre boutique">
                    <span class="p-4 my-4 bg-white rounded-r-25">
                        <span class="inline-block search-btn">
                            <a href="#" class="rounded-full bg-search p-3">
                                <i class="mt-1 text-white fas fa-search text-xl"></i>
                            </a>
                        </span>
                    </span>
                </div>
            </div>
            <h1 class="floating absolute floating-right-responsive hidden" style="top:30vh;"><img class="w-40" src="{{ asset('/img/bag2.svg') }}"></h1>
            <h1 class="floating absolute" style="top:450px;left:5%;z-index:899;"><img class="w-40" src="{{ asset('/img/bag1.svg') }}"></h1>
        </div>
        <!-- second section -->
        <div class="lg:flex bg-section">
            <div class="flex-1 text-gray-700 text-center px-4 py-2 m-2">
                <a class="font-bold text-gray-500 text-sm uppercase">faites découvrir votre boutique</a>
                <h1 class="font-bold text-2xl">Présentez vos produits <span class="text-gradient">en ligne !</span></h1>
                <p class="my-5 max-w-md m-auto text-center">
                    Gagnez en clientele en s'implifiant à vos clients de trouver les produits dont ils ont besoins.
                </p>
            </div>
            <div class="flex-1 text-gray-700 text-center px-4 py-2 m-2">
              <img class="lg:transform m-auto lg:m-0 lg:translate-x-20 p-5 lg:-translate-y-20" src="{{ asset('/img/flat1.png') }}" alt="">
            </div>
        </div>
        <!-- modals -->
        <div id="auth-modal">
                <header>
                    <a href="" id="signin">Se connecter</a>
                    <a href="" class="active">S'inscrire</a>
                </header>
                <section id="login-section" class="hide text-center">
                    <p id="login_error" class="text-red-500 text-sm bg-red-200 inline-block font-bold px-5 py-3 mb-3 rounded-full error-notactive">Une erreur est survenue</p>
                    <p id="login_success" class="text-green-500 text-sm bg-green-200 inline-block font-bold px-5 py-3 mb-3 rounded-full success-notactive">Connexion reussie. Redirection en cours...</p>
                    <input id="login_email" type="text" class="mb-4 modal-input" placeholder="Adresse email">
                    <input id="login_password" type="password" class="mb-1 modal-input" placeholder="Mot de passe">
                    <div class="relative h-5">
                        <a href="#" class="absolute right-0 text-sm text-gray-600 underline" data-izimodal-open="#reset-modal">Mot de passe oublié ?</a>
                    </div>
                    <div class="form-group">
                        <input id="login_remember" value="false" type="checkbox">
                        <label class="text-gray-600 text-sm" for="login_remember">Ne pas me déconnecter.</label>
                    </div>
                    <footer class="flex">
                        <button data-iziModal-close class="flex-1 modal-button undo">Annuler</button>
                        <button id="login_submit" class="flex-1 modal-button submit relative">Se connecter<div style="top:10px;right:5px;opacity:0;" class="absolute loader-5 center"><span></span></div></button>
                    </footer>
                </section>
                <section id="register-section" class="text-center">
                    <p id="register_error" class="text-red-500 text-sm bg-red-200 inline-block font-bold px-5 py-3 mb-3 rounded-full error-notactive">Une erreur est survenue</p>
                    <p id="register_success" class="text-green-500 text-sm bg-green-200 inline-block font-bold px-5 py-3 mb-3 rounded-full success-notactive">Vous vous étes inscrit avec succés. Redirection en cours...</p>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <input id="register_firstname" class="modal-input mb-5" type="text" placeholder="Nom">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <input id="register_lastname" class="modal-input mb-5" type="text" placeholder="Nom de famille">
                        </div>
                      </div>
                    <input id="register_email" class="modal-input mb-5" type="text" placeholder="Adresse email">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <input id="register_password" class="modal-input mb-5" type="password" placeholder="Mot de passe (minimum 5 lettre)">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <input id="register_password_confirmation" class="modal-input mb-5" type="password" placeholder="Confirmer le mot de passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" value="false" id="register_cgu">
                        <label class="text-gray-600 text-sm" for="register_cgu">J'accepte les <a href="#"><u>Conditions Générales D’utilisation</u></a>.</label>
                    </div>
                    <footer class="flex">
                        <button data-iziModal-close class="flex-1 modal-button undo">Annuler</button>
                        <button id="register_submit" class="flex-1 modal-button relative">S'inscrire<div style="top:10px;right:5px;opacity:0;" class="absolute loader-5 center"><span></span></div></button>
                    </footer>
                </section>
        </div>
        <div id="reset-modal">
            <div class="p-5 bg-gray-300">
                <img src="{{ asset('/img/email_flat.svg') }}" class="w-20 m-auto my-3" alt="">
                <h1 class="text-center text-2xl text-gray-600">Rénitialisez votre mot de passe</h1>
                <p class="text-gray-600 text-center text-sm">Un email de confirmation vous sera envoyé</p>
            </div>
            <section class="p-6 text-center">
                <p id="reset_error" class="text-red-500 text-sm bg-red-200 inline-block font-bold px-5 py-3 mb-3 rounded-full error-notactive">Une erreur est survenue</p>
                <input id="reset_email" type="text" class="modal-input mb-5" placeholder="Saisissez votre adresse email">
                <section class="flex">
                    <button href="#" data-izimodal-open="#auth-modal" class="flex-1 modal-button undo">Annuler</button>
                    <button href="#" id="reset_submit" class="flex-1 modal-button relative">Envoyer<div style="top:10px;right:5px;opacity:0;" class="absolute loader-5 center"><span></span></div></button>
                </section>
            </section>
        </div>
        <div id="reset-success">
        </div>
        <!-- Mobile nav -->
        <div id="Sidenav" class="sidenav px-5">
            <a href="javascript:void(0)" id="CloseSideNav" class="closebtn bg-tab px-3 text-white rounded-full">
                &times;
            </a>
            <a href="#"><i class="fas fa-home"></i> Accueil</a>
            <a href="#"><i class="fas fa-eye"></i> Démonstration</a>
            <a href="#"><i class="fas fa-pen"></i> Contact</a>
            <a @if(!Auth::check())data-izimodal-open="#auth-modal" href="#" @else href="{{ route('dashboard') }}" @endif class="mx-6 my-10 transition px-5 ease-in-out duration-300 text-gray-100 border-solid border rounded p-2 text-sm focus:text-indigo-700 uppercase border-gray-400 hover:text-indigo-700 font-bold">Espace utilisateur</a>
        </div>

        <!-- javascript -->
        <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js" integrity="sha256-+Q/z/qVOexByW1Wpv81lTLvntnZQVYppIL1lBdhtIq0=" crossorigin="anonymous"></script>
        <script src="{{ asset('/assets/js/iziModal.min.js') }}"></script>
        <script src="{{ asset('/assets/welcome/script.js') }}"></script>
    </body>
</html>
