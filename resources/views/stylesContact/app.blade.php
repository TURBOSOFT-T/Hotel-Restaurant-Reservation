<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <!-- ... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+J4hXn2mFFsMxtl4ZCWNUtu+U0W+aGh" crossorigin="anonymous"> <!-- Font Awesome Icons --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-8GtSraLZJ0Mn5LzJ3gqN6NkL8cGKqzh8gKjv+4kqZg6y/8dKQr4gj5jXN7rY4Iq1YtC/J4aKdZzjZM6b+LzV7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">  <!-- ... -->
    <style>
    /* Ajouter un fond d'écran avec une image importée depuis le web */
    body {
        background-image: url('https://example.com/chemin_vers_votre_image.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    /* Positionner l'image à gauche du formulaire */
    .contact-form {
        display: flex;
    }

    .contact-form .form-image {
        flex: 1;
        margin-right: 20px; /* Ajustez cet espacement selon vos besoins */
        /* Ajoutez d'autres styles CSS personnalisés pour l'image si nécessaire */
    }

    .contact-form .form-content {
        flex: 2;
        /* Ajoutez d'autres styles CSS personnalisés pour le formulaire si nécessaire */
    }

    /* Ajouter un effet spécial sur les inputs */
    input[type="text"], input[type="email"], textarea {
        border: 2px solid red; /* Remplacez "red" par la couleur de bordure souhaitée */
        border-radius: 10px; /* Ajoutez une valeur de bordure arrondie si désiré */
        padding: 5px 10px; /* Ajoutez un espacement intérieur aux inputs */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Ajoutez une ombre si désiré */
        /* Ajoutez d'autres styles CSS personnalisés selon vos besoins */
    }

    .contact-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 50px auto; /* Ajustez la marge selon vos besoins */
        max-width: 400px; /* Ajustez la largeur maximale du cadre selon vos besoins */
        padding: 20px; /* Espacement intérieur du cadre */
        border-radius: 10px; /* Ajoutez une valeur de bordure arrondie si désiré */
    }

    /* Style de base du bouton */
    .contact-form button {
        background-color: #2ecc71;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Effet de survol du bouton */
    .contact-form button:hover {
        background-color: #27ae60;
    }

    /* Style du formulaire */
    .contact-form {
        background-image: url("https://example.com/path/to/your/image.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        padding: 20px;
    }

    /* Style de l'image */
    .contact-image {
        position: absolute;
        left: -20px;
        top: 0;
    }
</style>
</head>
<body>
    <!-- ... -->
    @yield('content')
    <!-- ... -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
integrity="sha384-EV9n1Efc4Pp0cJgziKJXz5Jz1bWxRQgKo/9HXoJ3VgL9JdWvJ2+rkXBS9vSg/9qy"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+J4hXn2mFFsMxtl4ZCWNUtu+U0W+aGh"
crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- ... -->
</body>
</html>