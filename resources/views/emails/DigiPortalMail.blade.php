@component('mail::message')
# Le Titre du template

le template de l'email serra modifier comme vous le souhaiter.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

On peux mettre des buttons pour le rediriger ou effectuer des actions.

Merci,<br>
{{ config('app.name') }}
@endcomponent
