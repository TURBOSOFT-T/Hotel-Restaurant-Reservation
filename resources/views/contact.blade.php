


<!-- resources/views/contact.blade.php -->

@extends('stylesContact.app')

@section('content')
<div class="contact-form">

 


                <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
       
          <h3> <div class="card-header">{{ __('Contactez-nous') }}</div></h3>
        </div>
             <h3></h3>
        <div class="card-body">
          <!-- Rest of your content -->
       
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf

    <!-- Code HTML pour le formulaire de contact -->

                                    {{-- <img class="relative z-20 pt-6"
                                    src="{{ asset('assets/img/contact.jpg')}}" alt="" width="600"/>
                                  <div class="contact-form"> --}}
                                  <div>
        <img class="contact-image" src="{{ asset('assets/img/contact.jpg')}}" alt="" width="450" />
        <!-- Votre formulaire de contact ici -->
    {{-- </div> --}}
        
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                                <div class="col-md-6">
                                    <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" required>{{ old('message') }}</textarea>

                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Envoyer') }}
                                    </button>
                                </div>
                            </div>
                             </div>
      </div>
    </div>
  </div>
</div>
                        </form>
                    
{{-- <div class="contact-form">
    <div class="container mt-4"> --}}
        <h3>Retrouvez-nous sur les réseaux sociaux :</h3>
        <div class="social-icons">
            <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>

             <a href="https://api.whatsapp.com/send?phone=671178991" class="social-icon" target="_blank"><i class="fab fa-whatsapp"></i></a>
    <a href="mailto:yohivana237@gmail.com" class="social-icon" target="_blank"><i class="far fa-envelope"></i></a>
            <!-- Ajoutez d'autres icônes de réseaux sociaux selon vos besoins -->
        </div>
    </div>
  </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection