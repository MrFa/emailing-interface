@extends('layouts.app')

@section('content')
<div class="bg-contact100">
    <div class="container-contact100">
        <div class="wrap-contact100">
            <div class="contact100-pic js-tilt" data-tilt>
                <img src="{{asset('images/VRFiMzM.png')}}" alt="IMG">
            </div>
            <form class="contact100-form validate-form" action="{{route('send_email')}}" method='post' enctype='multipart/form-data'> 
                @csrf
                <span class="contact100-form-title">
                Interface d'envoi d'e-mails
                </span>
                <div class="wrap-input100 validate-input" data-validate="Votre Nom est requis">
                    <input class="input100" type="text" name="name" placeholder="Votre Nom" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Objet d'email requis">
                    <input class="input100" type="text" name="subject" placeholder="Objet d'email" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Une adresse électronique valide est requise: ex@abc.xyz">
                    <input class="input100" type="email" name="email" placeholder="Votre Addresse mail" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Message est requis">
                    <textarea class="input100" name="message" placeholder="Message" required></textarea>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input type='file' name="document" id='document' placeholder="Document" hidden/>
                    <label for="document" class='contact100-form-btn'>Choisir fichier</label>
                    <span class="focus-input100"></span>
                </div>
                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                     Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection