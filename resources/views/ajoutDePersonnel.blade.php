<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Candidat</title>
    <link rel="icon" href="https://estbm.ac.ma/etudiant/src/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/ajoutDePersonnelStyle.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="https://estbm.ac.ma/web/img/logo.png" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('administration') }}">Liste des Personnels</a>
                            </li>
                            <div class="notification">
                                <li><a class="dropdown-item" href="{{ route('listeEnAttente') }}">Liste des demandes en
                                        attente</a>
                                    <span class="badge">{{ $nombreDemandesEnAttente }}</span>
                            </div>
                            {{-- <li><a class="dropdown-item" href="#">comission scientifique</a></li>
                            <li><a class="dropdown-item" href="#">Chefs départements</a></li> --}}
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- create new user --}}
    <div class="container">
        <form class="form" method="POST" action="{{ route('store') }}" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nom</label>
                        <input class="form-control" type="text" name="nom" required>
                        @error('nom')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Prénom</label>
                        <input class="form-control" type="text" name="prenom">
                        @error('prenom')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nom Complet Arb</label>
                        <input class="form-control" type="text" name="nomComplet_arb">
                        @error('nomComplet_arb')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>ppr</label>
                        <input class="form-control" type="text" name="ppr">
                        @error('ppr')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id-grade">Grade</label>
                        <select name="grade" class="form-control">
                            <option value="1">PA</option>
                            <option value="2">PH</option>
                            <option value="3">PES</option>
                            <option value="4">Technicienne 3ème Grade</option>
                        </select>
                        @error('grade')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id-diplome">Diplôme</label>
                        <select name="diplome" class="form-control">
                            <option value="1">DTS</option>
                            <option value="2">Doctorat</option>
                            <option value="3">Master spécialisé</option>
                            <option value="4">Licence professionnelle</option>
                            <option value="5">Technicienne specialisé</option>
                        </select>
                        @error('diplome')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id-specialite">Spécialité</label>
                        <select name="specialite" class="form-control">
                            <option value="1">Developpement informatique</option>
                            <option value="2">Agro industrie</option>
                            <option value="3">Biotechnologie</option>
                            <option value="4">Informatique</option>
                            <option value="5">Gestion Informatisée des Entreprises</option>
                            <option value="6">Management des organisations</option>
                            <option value="7">Anglais</option>
                            <option value="8">Informatique de Gestion</option>
                            <option value="9">Génie Industriel</option>
                            <option value="10">Mécanique des fluides, Energétique et Environnement</option>
                        </select>
                        @error('specialite')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id-dep">Département</label>
                        <select name="dep" class="form-control">
                            <option value="1">Informatique et Tecgniques de Gestion</option>
                            <option value="2">Scolarité</option>
                            <option value="3">Tech-LABO</option>
                            <option value="4">Genie des procedes</option>
                            <option value="5">GESTION & LOGISTIQUE</option>
                            <option value="6">Partenariat</option>
                            <option value="7">Service Informatique</option>
                            <option value="8">Mécatronique</option>
                            <option value="9">Secretariat de la Direction </option>
                            <option value="10">Bibliothèque</option>
                            <option value="11">Service intendance</option>
                            <option value="12">Atelier</option>
                        </select>
                        @error('dep')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" name="email">
                        @error('email')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Statut</label>
                        <input class="form-control" type="text" name="status">
                        @error('status')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date de recrutement ministère</label>
                        <input class="form-control" type="date" name="date_rec_minis">
                        @error('date_rec_minis')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date de recrutement ESTBM</label>
                        <input class="form-control" type="date" name="date_rec_estbm">
                        @error('date_rec_estbm')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Profession</label>
                        <input class="form-control" type="text" name="profession">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id-grade">Sexe</label>
                        <select name="sexe" class="form-control">
                            <option value="M">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                        
                    </div>@error('sexe')
                <div>{{ $message }}</div>
            @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date de Naissance</label>
                        <input class="form-control" type="date" name="datenaisf">
                        @error('datenaisf')
                <div>{{ $message }}</div>
            @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex justify-content-start">
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
      <!-- Success Modal -->
      <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Succès</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Erreur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(session('error'))
                        <p>{{ session('error') }}</p>
                    @endif
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            @if (session('success'))
                $('#successModal').modal('show');
            @endif

            @if (session('error') || $errors->any())
                $('#errorModal').modal('show');
            @endif
        });
    </script>
</body>

