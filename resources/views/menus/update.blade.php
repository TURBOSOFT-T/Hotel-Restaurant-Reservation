<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://source.unsplash.com/1600x900/?food');
            background-size: cover;
            background-position: center;
            height: 100vh;
            overflow: hidden;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(3px);
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(3px);
            border: none;
        }

        .form-control:focus {
            border: none;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #c62828;
            border-color: #c62828;
        }

        .btn-primary:hover {
            background-color: #b71c1c;
            border-color: #b71c1c;
        }
    </style>
</head>
<body>
    <img src="https://example.com/images/menu.png" class="menu-image img-fluid">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-header bg-transparent">
                        <h2 class="text-center"><i class="bi bi-list"></i> Update Menu</h2>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ url('menus/' . $menu->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="libelle" class="form-label">Libelle</label>
                                <input type="text" name="libelle" id="libelle" placeholder="Libelle" value="{{ $menu->libelle }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" id="description" placeholder="Description" value="{{ $menu->description }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="prix" class="form-label">Prix</label>
                                <input type="number" name="prix" id="prix" placeholder="Prix" value="{{ $menu->prix }}"class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

