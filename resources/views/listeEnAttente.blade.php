<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="https://estbm.ac.ma/etudiant/src/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/listeEnAttenteStyle.css') }}">
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
                            <li><a class="dropdown-item" href="{{ route('administration') }}">Liste des personnels</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('ajoutDePersonnel') }}">Ajout de personnels</a>
                            </li>

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
    {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
    <div class="row flex-lg-nowrap">
        <div class="col mb-3">
            <div class="e-panel card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="mb-4">Liste des demandes</h2>
                        <div class="form-group">
                            <label for="etat" class="form-label">Filtrer par état :</label>
                            <select class="form-control filter-select" id="etat">
                                <option value="all">Tous</option>
                                <option value="En_attente">En attente</option>
                                <option value="validé">Validé</option>
                                <option value="refusé">Refusé</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="e-table">
                        <div class="table-responsive table-lg mt-3">
                            <table id="table-personnels" class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-nowrap align-middle">Nom</th>
                                        <th class="text-nowrap align-middle">Prénom</th>
                                        <th class="text-nowrap align-middle">PPR</th>
                                        <th class="text-nowrap align-middle">Grade</th>
                                        <th class="text-nowrap align-middle">Date de recrutement ESTBM</th>
                                        <th class="text-nowrap align-middle">Date de recrutement Minister</th>
                                        <th class="text-nowrap align-middle" >Instance</th>
                                        <th class="text-nowrap align-middle">État</th>
                                        <th class="text-nowrap align-middle" >Validation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr class="{{ strtolower($data->etat) }}">
                                            <td class="align-middle">{{ $data->personnel->nom }}</td>
                                            <td class="align-middle">{{ $data->personnel->prenom }}</td>
                                            <td class="align-middle">{{ $data->personnel->ppr }}</td>
                                            <td class="align-middle">{{ $data->personnel->grade->libelle }}</td>
                                            <td class="align-middle">{{ $data->personnel->date_rec_estbm }}</td>
                                            <td class="align-middle">{{ $data->personnel->date_rec_minis }}</td>
                                            <td class="align-middle">{{ $data->instance->libelle_arb }}</td>
                                            <td class="align-middle">{{ $data->etat }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <form id="validationForm{{ $data->id }}"
                                                        action="{{ route('update-etat', $data->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="action" value="valider">
                                                        <button type="submit" class="btn btn-success">Accepter</button>
                                                    </form>
                                                    <form id="refusalForm{{ $data->id }}"
                                                        action="{{ route('update-etat', $data->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="action" value="refuser">
                                                        <button type="submit" class="btn btn-danger">Refuser</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $datas->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de succès pour la validation -->
    <div class="modal fade" id="successValidationModal" tabindex="-1" aria-labelledby="successValidationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successValidationModalLabel">Validation réussie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Votre validation a été effectuée avec succès.
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de succès pour le refus -->
    <div class="modal fade" id="successRefusalModal" tabindex="-1" aria-labelledby="successRefusalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successRefusalModalLabel">Refus réussi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Votre refus a été effectué avec succès.
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('etat').addEventListener('change', function() {
            var selectedValue = this.value.toLowerCase();
            var rows = document.querySelectorAll('#table-personnels tbody tr');
            rows.forEach(function(row) {
                if (selectedValue === 'all' || row.classList.contains(selectedValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

    <script>
        // JavaScript pour afficher le modal de succès de la validation
        document.getElementById('validationButton').addEventListener('click', function() {
            $('#successValidationModal').modal('show');
            $('#validationForm').submit(); // Soumettre le formulaire après avoir affiché le modal
        });

        // JavaScript pour afficher le modal de succès du refus
        document.getElementById('refusalButton').addEventListener('click', function() {
            $('#successRefusalModal').modal('show');
            $('#refusalForm').submit(); // Soumettre le formulaire après avoir affiché le modal
        });
    </script>
    <script>
        $(document).ready(function() {
            @if (session('successValidation'))
                $('#successValidationModal').modal('show');
            @elseif (session('successRefusal'))
                $('#successRefusalModal').modal('show');
            @endif
        });
    </script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
