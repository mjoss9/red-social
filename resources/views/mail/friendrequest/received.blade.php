@component('mail::message')
# Recibiste una solicitud

**Acabas de recibir una solicitud de amistad de:**

**Name:** {{ $user->name }}

**Username:** {{ $user->username }}

@component('mail::button', ['url' => route('profiles.show', $user->username)])
Visita su perfil
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
