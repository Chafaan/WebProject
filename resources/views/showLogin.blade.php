<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Espace Etudiant </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="script" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <style>
    </style>
    <link rel="stylesheet" href="{{ asset('css/loginStyle.css') }}">
</head>
<body class="bg-gray-800">
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row">
                            <img src="https://estbm.ac.ma/etudiant/src/img/logo.png" class="logo">
                        </div>
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                            <img src="{{ asset('images/election_icon1.png') }}" class="image">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3">
                            <h3>Espace Candidat</h3>
                        </div>
                        <div class="row px-3 mb-4">
                            <div class="line"></div>
                            {{-- <small class="or text-center">Or</small> --}}
                            <div class="line"></div>
                        </div>
                        <form method="POST" action="{{ route('login') }}">  
                            @csrf
                            <div class="row px-3">
                                <label for="cin" class="mb-1">
                                    <h6 class="mb-0 text-sm">Email</h6>
                                </label>
                                <input class="mb-4" required type="email" name="email" value="{{ old('email') }}"
                                    placeholder="Enter Email">
                            </div>
                            <div class="row px-3">
                                <label for="n_som" class="mb-1">
                                    <h6 class="mb-0 text-sm">Numéro de somme</h6>
                                </label>
                                <input required type="text" name="n_som" placeholder="Enter PPR"> 
                            </div>
                            <div class="row px-3 mb-4">
                                @error('email')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                                <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                            </div>
                            <div class="row mb-3 px-3">
                                <button type="submit" class="btn btn-blue text-center">Connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-4">
                <div class="row px-3">
                    <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2024 © ESTBM . All Rights Reserved <b>Développé par Ismail HAFIDI & Abdellatif EL HOBBI</b></small>
                    {{-- <div class="social-contact ml-4 ml-sm-auto">
                        <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span>
                        <span class="fa fa-linkedin mr-4 text-sm"></span>
                        <span class="fa fa-google-plus mr-4 text-sm"></span>
                        <span class="fa fa-facebook mr-4 text-sm"></span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
