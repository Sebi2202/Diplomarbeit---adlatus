@component('mail::message')
# Adlatus-Projekt

Klicken Sie auf den Knopf, damit Sie ihr *Passwort zurücksetzen* können!

@component('mail::button', ['url' => 'http://127.0.0.1:8000/password/reset/{token}'])
Passwort zurücksetzen
@endcomponent

Danke, dass Sie unsere App verwenden<br>
Ihr Adlatus-Team!
@endcomponent
