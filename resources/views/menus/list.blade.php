<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> </title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .fade-in {
            animation: fadeIn 0.5s;
        }
        .fade-out {
            animation: fadeOut 0.5s;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }
    </style>
</head>
<body class="antialiased">
    <div class="container-fluid">
        <!-- main app container -->
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Menus</h3>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block my-3">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <a class="btn btn-primary" href="{{url('menus/create')}}">Add New</a>
                            </div>
                            <div class="col-md-9">
                                <form id="searchform" name="searchform">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="libelle">Search by libelle</label>
                                                <input type="text" name="libelle" value="{{request()->get('libelle','')}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="description">Search by description</label>
                                                <input type="text" name="description" value="{{request()->get('description','')}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="prix">Search by prix</label>
                                                <input type="number" name="prix" value="{{request()->get('prix','')}}" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btnbtn-success">Search</button>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Libelle</th>
                                        <th>Description</th>
                                        <th>Prix</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($menus as $menu)
                                    <tr class="fade-in">
                                        <td>{{$menu->id}}</td>
                                        <td>{{$menu->libelle}}</td>
                                        <td>{{$menu->description}}</td>
                                        <td>{{$menu->prix}}</td>
                                        <td><img src="{{ asset('images/' . $menu->image) }}" width="70" /></td>
                                        <td>{{ $menu->User->name }}</td>
                                        <td>{{$menu->created_at}}</td>
                                        <td>
                                            <a href="{{route('menus.edit',$menu->id)}}" onclick="return confirm('Are you sure you want to update the menu?');" class="me-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('menus.destroy',$menu->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the menu?');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div id="pagination">
                                <div>
                                    {{ $menus->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- credits -->
    </div>
    <script>
        // Ajouter une classe fade-out lors de la suppression d'une ligne
        $('form').submit(function() {
            $(this).closest('tr').addClass('fade-out');
        });
    </script>
</body>
</html>