
@extends('stylesContact.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">TUBORSOFT_MAILS</a>
    </nav>
    <div class="container py-4">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow-sm">
                 
                    <div class="card-body">
                     <p>Nom : {{ $contact['name'] }}</p><br>
                        <p>E-mail: {{ $contact['email'] }}</p>
                    <div><br>

                        <p>   Message {{ $contact['message'] }}</p>
                      
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
