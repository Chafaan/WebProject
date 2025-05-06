<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://estbm.ac.ma/etudiant/src/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/administrationStyle.css') }}">
    <style>
        .hidden {
            display: none;
        }
        #professionFilter {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            cursor: pointer;
            width: 200px;
        }

        #professionFilter:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
    </style>
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
                            <li><a class="dropdown-item" href="{{ route('ajoutDePersonnel') }}">Ajout des Personnels</a>
                            </li>
                            <div class="notification">
                                <li><a class="dropdown-item" href="{{ route('listeEnAttente') }}">Liste des demandes en
                                        attente</a>
                                    <span class="badge">{{ $nombreDemandesEnAttente }}</span>
                            </div>
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
    <div class="container">
        <div class="col">
            <div class="e-tabs mb-5 px-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#">Users</a></li>
                </ul>
            </div>
            <div class="row flex-lg-nowrap">
                <div class="col mb-3">
                    <div class="e-panel card">
                        <div class="card-body">
                            <div class="card-title">
                                <h2 class="mb-4">Liste de Personnels</h2>
                                <div class="row">
                                    <label for="professionFilter">Filtrer par profession :</label>
                                    <select id="professionFilter" onchange="filterTable()">
                                        <option value="">Tous</option>
                                        <option value="Professeur">Professeur</option>
                                        <option value="Administrateur">Administrateur</option>
                                        <option value="Secrétaire général">Secrétaire Général</option>
                                    </select>
                                    {{-- <div class="col-md-6 mb-3">
                                        <label for="departement" class="form-label">Status</label>
                                        <select class="form-select filter-select" data-filter-type="9">
                                            <option value="all">Tous les status</option>
                                            <option value="Mecatronique">Mecatronique</option>
                                            <option value="Gestion">Gestion</option>
                                        </select>
                                    </div> --}}
                                    {{-- <div class="col-md-6 mb-3">
                                        <label for="diplome" class="form-label">Le dérnier delai des élections</label>
                                        <input class="form-select filter-select" data-filter-type="10" type="text">
                                        <select class="form-select filter-select" data-filter-type="10">
                                            <option value="all">Tous les diplômes</option>
                                            <option value="Doctorat">Doctorat</option>
                                            <option value="DTS">DTS</option>
                                        </select>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="e-table">
                                <div class="table-responsive mt-4">
                                    <table id="dataTable" class="table table-striped table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-nowrap align-middle">Nom</th>
                                                <th class="text-nowrap align-middle">Prénom</th>
                                                <th class="text-nowrap align-middle">Nom Complet Arb</th>
                                                <th class="text-nowrap align-middle">PPR</th>
                                                <th class="text-nowrap align-middle">Sexe</th>
                                                <th class="text-nowrap align-middle">Date de Naissance</th>
                                                <th class="text-nowrap align-middle">Email</th>
                                                <th class="text-nowrap align-middle">Date de recrutement ESTBM</th>
                                                <th class="text-nowrap align-middle">Grade</th>
                                                <th class="text-nowrap align-middle">Date de recrutement Minister</th>
                                                <th class="text-nowrap align-middle">Département</th>
                                                <th class="text-nowrap align-middle">Diplôme</th>
                                                <th class="text-nowrap align-middle">Spécialité</th>
                                                <th class="text-nowrap align-middle">Profession</th>
                                                <th class="text-nowrap align-middle">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datas as $data)
                                                <tr>
                                                    <td class="align-middle">{{ $data->nom }}</td>
                                                    <td class="align-middle">{{ $data->prenom }}</td>
                                                    <td class="align-middle">{{ $data->nomComplet_arb }}</td>
                                                    <td class="align-middle">{{ $data->ppr }}</td>
                                                    <td class="align-middle">{{ $data->sexe }}</td>
                                                    <td class="align-middle">{{ $data->datenaisf }}</td>
                                                    <td class="align-middle">{{ $data->email }}</td>
                                                    <td class="align-middle">{{ $data->date_rec_estbm }}</td>
                                                    <td class="align-middle">{{ $data->grade->libelle }}</td>
                                                    <td class="align-middle">{{ $data->date_rec_minis }}</td>
                                                    <td class="align-middle">{{ $data->dep->libelle }}</td>
                                                    <td class="align-middle">{{ $data->diplome->libelle }}</td>
                                                    <td class="align-middle">{{ $data->specialite->libelle }}</td>
                                                    <td class="align-middle profession">{{ $data->profession }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-primary editBtn"
                                                            data-id="{{ $data->id }}">Editer</button>
                                                        <div class="modal fade" id="editModal" tabindex="-1"
                                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editModalLabel">
                                                                            Edit User</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form id="editForm" action=""
                                                                        method="POST">
                                                                        @csrf
                                                                        {{-- @method('PUT') --}}
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="user_id"
                                                                                id="user_id" value="">
                                                                            <div class="form-group">
                                                                                <label for="nom">Nom</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="nom" name="nom">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="prenom">Prénom</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="prenom" name="prenom">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="prenom">Nom Complet
                                                                                    Arb</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="nomComplet_arb"
                                                                                    name="nomComplet_arb">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="ppr">PPR</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="ppr" name="ppr">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="sexe">Sexe</label>
                                                                                <select class="form-select"
                                                                                    id="sexe" name="sexe">
                                                                                    <option value="M">Masculin
                                                                                    </option>
                                                                                    <option value="F">Féminin
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="date_naissance">Date
                                                                                    Naissance</label>
                                                                                <input type="date"
                                                                                    class="form-control"
                                                                                    id="date_naissance"
                                                                                    name="date_naissance">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="email">Email</label>
                                                                                <input type="email"
                                                                                    class="form-control"
                                                                                    id="email" name="email">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="date_recrutement_estbm">Date
                                                                                    de recrutement ESTBM</label>
                                                                                <input type="date"
                                                                                    class="form-control"
                                                                                    id="date_recrutement_estbm"
                                                                                    name="date_recrutement_estbm">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="grade">Grade</label>
                                                                                <select class="form-select"
                                                                                    id="grade" name="grade">
                                                                                    <option value="1">PA</option>
                                                                                    <option value="2">PH</option>
                                                                                    <option value="3">PES</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="date_recrutement_minister">Date
                                                                                    de recrutement Minister</label>
                                                                                <input type="date"
                                                                                    class="form-control"
                                                                                    id="date_recrutement_minister"
                                                                                    name="date_recrutement_minister">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="departement">Département</label>
                                                                                <select id="departement"
                                                                                    name="departement"
                                                                                    class="form-control">
                                                                                    <option value="1">Informatique
                                                                                    </option>
                                                                                    <option value="2">Procédés
                                                                                    </option>
                                                                                    <option value="3">Gestion
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="diplome">Diplôme</label>
                                                                                <select id="diplome" name="diplome"
                                                                                    class="form-control">
                                                                                    <option value="1">Doctorat
                                                                                    </option>
                                                                                    <option value="2">DTS</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="specialite">Spécialité</label>
                                                                                <select id="specialite"
                                                                                    name="specialite"
                                                                                    class="form-control">
                                                                                    <option value="1">Informatique
                                                                                    </option>
                                                                                    <option value="2">Gestion
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                        <input type="hidden" id="deleteUserId"
                                                                            name="deleteUserId">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button onclick="showDeletePopup('{{ $data->id }}')"
                                                            class="btn btn-danger">Supprimer</button>
                                                        <div class="popup" id="popup">
                                                            <div class="popup-content">
                                                                <div class="icon-container">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="30" height="30"
                                                                        fill="currentColor" class="bi bi-trash"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                                        <path
                                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                                    </svg>
                                                                </div>
                                                                <h2>Delete Item?</h2>
                                                                <p>Are you sure you want to delete this item?</p>
                                                                <div class="button-container">
                                                                    <button onclick="cancelDelete()">Cancel</button>
                                                                    <button class="btn btn-primary" type="button"
                                                                        onclick="deleteUser()">Supprimer</button>
                                                                </div>
                                                            </div>
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
        </div>
    </div>

    {{-- filtrer --}}
    <script>
        function filterTable() {
            // Récupérer la valeur du filtre sélectionné
            const filter = document.getElementById('professionFilter').value;

            // Récupérer toutes les lignes de la table
            const rows = document.querySelectorAll('#dataTable tbody tr');

            rows.forEach(row => {
                // Récupérer la cellule de la profession
                const professionCell = row.querySelector('.profession');
                const profession = professionCell.textContent.trim();

                // Afficher ou masquer la ligne en fonction de la profession
                if (filter === "" || profession === filter) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        }
    </script>

    <!-- Edit Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.editBtn').on('click', function() {
                var userId = $(this).data('id'); // Get the user ID from the button's data-id attribute
                var row = $(this).closest('tr');
                var nom = row.find('td:eq(0)').text().trim();
                var prenom = row.find('td:eq(1)').text().trim();
                var nomComplet_arb = row.find('td:eq(2)').text().trim();
                var ppr = row.find('td:eq(3)').text().trim();
                var sexe = row.find('td:eq(4)').text().trim();
                var dateNaissance = row.find('td:eq(5)').text().trim();
                var email = row.find('td:eq(6)').text().trim();
                var dateRecEstbm = row.find('td:eq(7)').text().trim();
                var grade = row.find('td:eq(8)').text().trim();
                var dateRecMinister = row.find('td:eq(9)').text().trim();
                var departement = row.find('td:eq(10)').text().trim();
                var diplome = row.find('td:eq(11)').text().trim();
                var specialite = row.find('td:eq(12)').text().trim();

                // Set the values of the form fields
                $('#user_id').val(userId);
                $('#nom').val(nom);
                $('#prenom').val(prenom);
                $('#nomComplet_arb').val(nomComplet_arb);
                $('#ppr').val(ppr);
                $('#sexe').val(sexe);
                $('#date_naissance').val(dateNaissance);
                $('#email').val(email);
                $('#date_recrutement_estbm').val(dateRecEstbm);

                // Set the selected value for grade
                $('#grade option').each(function() {
                    if ($(this).text().trim() === grade) {
                        $(this).prop('selected', true);
                    }
                });

                $('#date_recrutement_minister').val(dateRecMinister);

                // Set the selected value for departement
                $('#departement option').each(function() {
                    if ($(this).text().trim() === departement) {
                        $(this).prop('selected', true);
                    }
                });

                // Set the selected value for diplome
                $('#diplome option').each(function() {
                    if ($(this).text().trim() === diplome) {
                        $(this).prop('selected', true);
                    }
                });

                // Set the selected value for specialite
                $('#specialite option').each(function() {
                    if ($(this).text().trim() === specialite) {
                        $(this).prop('selected', true);
                    }
                });

                // Update the form action URL dynamically
                var actionUrl = "{{ url('/update') }}/" + userId;
                $('#editForm').attr('action', actionUrl);

                // Show the corresponding modal
                $('#editModal').modal('show');
            });
        });
    </script>
    <script>
        function showDeletePopup(userId) {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('deleteUserId').value = userId; // Set the user ID in a hidden input field
        }

        function cancelDelete() {
            document.getElementById('popup').style.display = 'none';
        }

        function deleteUser() {
            var userId = document.getElementById('deleteUserId').value;
            window.location.href = '{{ url('delete') }}/' + userId; // Use url() to generate the correct URL
        }
    </script>
</body>

</html>
