<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Candidat</title>
    <link rel="icon" href="https://estbm.ac.ma/etudiant/src/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/profileStyle.css') }}">
</head>

<body>
    @if (session('pers'))
        {{ session('pers')->attribut }}
    @endif

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="https://estbm.ac.ma/web/img/logo.png" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Menu</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('conseilEtablissement') }}">Conseil établissement</a></li>
                            <li><a class="dropdown-item" href="{{ route('conseilUniversite') }}">Conseil université</a></li>
                            <li><a class="dropdown-item" href="{{ route('commissionScientifique') }}">Commission scientifique</a></li>
                            <li><a class="dropdown-item" href="{{ route('chefDepartement') }}">Chefs départements</a></li>
                            <li><a class="dropdown-item" href="{{ route('listeDesDemandes') }}">Liste des demandes</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Content -->
    <div class="container my-5 d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card profile-widget">
                <div class="row">
                    <div class="col-12">
                        <div class="image-container bg-cover bg2">
                            @if ($pers->sexe == 'M')
                                <img src="https://static.vecteezy.com/system/resources/previews/024/183/502/original/male-avatar-portrait-of-a-young-man-with-a-beard-illustration-of-male-character-in-modern-color-style-vector.jpg"
                                    class="avatar" alt="avatar">
                            @elseif ($pers->sexe == 'F')
                                <img src="https://www.svgrepo.com/show/382099/female-avatar-girl-face-woman-user-2.svg"
                                    class="avatar" alt="avatar">
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="details text-center">
                            <h4>{{ $pers->prenom }} {{ $pers->nom }} </h4>
                            <div><strong>Grade:</strong> {{ $pers->grade->libelle }}</div>
                            <div><strong>PPR:</strong> {{ $pers->ppr }}</div>
                            <div><strong>Email:</strong> {{ $pers->email }}</div>
                            <div><strong>Département:</strong> {{ $pers->dep->libelle }}, <strong>Spécialité:</strong> {{ $pers->specialite->libelle }}</div>
                            <div class="mt-3">
                                <strong>Date de Naissance:</strong> {{ $pers->datenaisf }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Content -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Espace Candidat</title>
    <link rel="icon" href="https://estbm.ac.ma/etudiant/src/img/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/profileStyle.css') }}">
</head>
<body>
    @php
        $dureedansest = \Carbon\Carbon::parse($pers->date_rec_estbm);
        use Illuminate\Support\Facades\Date;
        $dateActuelle = Date::now();
        $dateFormatee = $dateActuelle->format('Y-m-d H:i:s');
    @endphp
    <header class="px-4 py-2 shadow-sm border bg-gray-50">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a class="d-flex align-items-center text-decoration-none" href="#">
                        <img src="https://estbm.ac.ma/etudiant/src/img/logo.png" alt class="h-10 w-10">
                        <span class="ml-2 text-sm text-[#023972] font-bold hidden lg:block">Ecole
                            Supérieure De
                            Technologie
                            Béni Mellal </span>
                        <span class="ml-2 text-[#023972] font-bold text-xl lg:hidden">ESTBM
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    @if (($pers->id_grade == 1 && $dureedansest->diffInYears(now()) >= 2) || ($pers->grade == 'PH' && $dureedansest->diffInYears(now()) >= 1) || ($pers->grade == 'PES' && $dureedansest->diffInYears(now()) >= 1))
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                value="{{ $pers->nom }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom :</label>
                            <input type="text" class="form-control" id="prenom" name="prenom"
                                value="{{ $pers->prenom }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">PPR</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $pers->ppr }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Grade</label>
                            <input type="text" class="form-control" id="grade" name="grade"
                                value="{{ $pers->grade->libelle }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
                <div class="col mt-4">
                    <div id="displayData">
                        <p>Le professeur <span id="displayPrenom">{{ $pers->prenom }} </span> <span
                                id="displayNom">{{ $pers->nom }}</span>
                            a soumis une candidature pour la catégorie <span
                                id="displayGrade">{{ $pers->grade->libelle }}</span>
                            le {{ $dateFormatee }}</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info" role="alert">
            Votre candidature ne pourra pas être soumise car vous n'avez pas les conditions requises.
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-6 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25">
                                            <img src="https://img.icons8.com/bubbles/100/000000/user.png"
                                                class="img-radius" alt="User-Profile-Image">
                                        </div>
                                        <h6 class="f-w-600">{{ $pers->prenom }} {{ $pers->nom }}</h6>
                                        <p>{{ $pers->grade->libelle }}</p>
                                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400">{{ $pers->prenom }}.{{ $pers->nom }}@usms.ac.ma</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Phone</p>
                                                <h6 class="text-muted f-w-400">98979989898</h6>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Recent</p>
                                                <h6 class="text-muted f-w-400">Sam Disuja</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Most Viewed</p>
                                                <h6 class="text-muted f-w-400">Dinoter husainm</h6>
                                            </div>
                                        </div>
                                        <ul class="social-link list-unstyled m-t-40 m-b-10">
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom"
                                                    title="" data-original-title="facebook" data-abc="true"><i
                                                        class="mdi mdi-facebook feather icon-facebook facebook"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom"
                                                    title="" data-original-title="twitter" data-abc="true"><i
                                                        class="mdi mdi-twitter feather icon-twitter twitter"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom"
                                                    title="" data-original-title="instagram" data-abc="true"><i
                                                        class="mdi mdi-instagram feather icon-instagram instagram"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        function updateData(fieldId, displayId) {
            const field = document.getElementById(fieldId);
            const display = document.getElementById(displayId);
            field.addEventListener('input', function() {
                display.textContent = field.value;
            });
        }
        updateData('nom', 'displayNom');
        updateData('prenom', 'displayPrenom');
        updateData('email', 'displayEmail');
        updateData('grade', 'displayGrade');
    </script>
</body>
</html> --}}
