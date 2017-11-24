@component('mail::message')
# Adlatus-Projekt

Klicken Sie auf den Knopf, damit Sie ihr *Passwort zurücksetzen* können!

@component('mail::button', ['url' => 'localhost:8000/password/reset/{token}'])
Passwort zurücksetzen
@endcomponent

Danke, dass Sie unsere App verwenden<br>
Ihr Adlatus-Team!
@endcomponent
