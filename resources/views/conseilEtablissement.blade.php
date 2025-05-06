<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="icon" href="https://estbm.ac.ma/etudiant/src/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/conseilEtablissementStyle.css') }}">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="js/main.js"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"859839d56947338d","version":"2024.2.1","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @if (session('pers'))
        {{ session('pers')->attribut }}
    @endif
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
                            {{-- <li><a class="dropdown-item" href="#">p</a></li> --}}
                            <li><a class="dropdown-item" href="{{ route('conseilUniversite') }}">Conseil université</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('commissionScientifique') }}">comission
                                    scientifique</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('chefDepartement') }}">Chefs départements</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}"><i class="fas fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1>Conseil Etablissement</h1>
    @php
        $dureedansest = \Carbon\Carbon::parse($pers->date_rec_estbm);
        use Illuminate\Support\Facades\Date;
        $dateActuelle = Date::now();
        $dateFormatee = $dateActuelle->format('Y-m-d H:i:s');
    @endphp
    @if ($datas)
        @if ($datas->etat == '')
            @exit
        @elseif ($datas->etat == 'validé')
            <div class="wrap">
                <div class="modal js-modal">
                    <div class="modal-image" style=" box-shadow: 0 0 0 2px #48DB71;">
                        <svg viewBox="0 0 32 32" style="fill:#48DB71">
                            <path d="M1 14 L5 10 L13 18 L27 4 L31 8 L13 26 z"></path>
                        </svg>
                    </div>
                    <h1></h1>
                    <p>votre demande est validée</p>
                </div>
            </div>
            <?php
            exit();
            ?>
            <script>
                document.getElementById('validMessage').style.display = 'block';
                document.getElementById('downloadBtn').disabled = true;
            </script>
            <style>
                .content {}
            </style>
        @elseif($datas->etat == 'refusé')
            <div class="wrap">
                <div class="modal js-modal">
                    <div class="modal-image" style="box-shadow: 0 0 0 2px #e40404;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="#FF0000"
                                d="M17.3 5.71a.996.996 0 0 0-1.41 0L12 10.59 7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12 5.7 16.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.39-.39.39-1.03 0-1.42z" />
                        </svg>
                    </div>
                    <h1></h1>
                    <p>votre demande est refusée</p>
                </div>
            </div>
            <?php
            exit();
            ?>
        @elseif($datas->etat == 'En_attente')
        <div class="wrap">
            <div class="modal js-modal">
                <div class="modal-image" style="box-shadow: 0 0 0 2px #ffcc00;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="#ffcc00" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-2h-2v2zm0-4h2V7h-2v6z"/>
                    </svg>
                </div>
                <h1></h1>
                <p>Votre demande est en attente</p>
            </div>
        </div>
        @endif
    @endif
    @if (
        ($pers->status == 'prof' && $pers->grade->libelle == 'PA' && $dureedansest->diffInYears(now()) >= 2) ||
            ($pers->status == 'prof' && $pers->grade->libelle == 'PH' && $dureedansest->diffInYears(now()) >= 1) ||
            ($pers->status == 'prof' && $pers->grade->libelle == 'PES' && $dureedansest->diffInYears(now()) >= 1) ||
            ($pers->status == 'admin' && $dureedansest->diffInYears(now()) >= 1))
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <h3 class="heading mb-4">Bonjour, {{ $pers->prenom }} {{ $pers->nom }}</h3>
                                <p>Après avoir téléchargé le fichier PDF, assurez-vous de le remettre au secrétaire
                                    général de l'EST BM.</p>
                                <p><img src="https://preview.colorlib.com/theme/bootstrap/contact-form-16/images/undraw-contact.svg"
                                        alt="Image" class="img-fluid"></p>
                            </div>
                            <div class="col-md-6">
                                <form id="downloadForm" class="mb-5"
                                    action="{{ route('PdfConseilEtablissementController') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="nom" id="name"
                                                placeholder="Your name" value="{{ $pers->nom }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="prenom" id="email"
                                                placeholder="Email" value="{{ $pers->prenom }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="n_som" id="subject"
                                                placeholder="Subject" value="{{ $pers->ppr }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="grade" id="subject"
                                                placeholder="Subject" value="{{ $pers->grade->libelle }}">
                                            <input type="hidden" name="id_pers" value="{{ $pers->id }}">
                                            <input type="hidden" name="id_ins" value="1">
                                            <input type="hidden" name="etat" value="En_attente">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" id="downloadBtn"
                                                class="btn btn-primary rounded-0 py-2 px-4">Télécharger</button>
                                            <span class="submitting"></span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="successPopup" class="popup" style="display: none;">
            <div class="popup-content">
                <span class="close">&times;</span>
                <p><strong>Succès!</strong> Téléchargement réussi !
                </p>
                <i class='far fa-check-circle' style='font-size:36px'></i>
            </div>
        </div>




        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var form = document.getElementById('downloadForm');
                var successPopup = document.getElementById('successPopup');
                var closeBtn = document.querySelector('.close');

                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    var formData = new FormData(form);

                    fetch(form.action, {
                            method: form.method,
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                            }
                        })
                        .then(response => response.blob())
                        .then(blob => {
                            // Créer un lien pour le téléchargement du fichier
                            var url = window.URL.createObjectURL(blob);
                            var a = document.createElement('a');
                            a.href = url;
                            a.download =
                                "Candidature pour le Conseil d'Etablissement.pdf"; // Changez le nom du fichier si nécessaire
                            document.body.appendChild(a);
                            a.click();
                            a.remove();
                            window.URL.revokeObjectURL(url);

                            // Afficher la popup de succès
                            successPopup.style.display = 'flex';
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });

                closeBtn.addEventListener('click', function() {
                    successPopup.style.display = 'none';
                });

                window.addEventListener('click', function(event) {
                    if (event.target == successPopup) {
                        successPopup.style.display = 'none';
                    }
                });
            });
        </script>
    @else
        <div class="alert alert-info" role="alert">
            Votre candidature ne pourra pas être soumise car vous n'avez pas les conditions requises.
        </div>
    @endif

</body>

</html>
