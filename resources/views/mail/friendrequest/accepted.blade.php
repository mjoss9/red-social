@component('mail::message')
# Solicitud de amistad aceptada

**Tu solicitud de amistada ha sido aceptada por: **

**Name:** {{ $user->name }}

**Username:** {{ $user->username }}

@component('mail::button', ['url' => route('profiles.show', $user->username)])
Visita su perfil
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
