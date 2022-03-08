@extends('emails.master')

@section('content')
    <p>
        Hola: <strong>{{ $name }}</strong>
    </p>
    <p>
        Esta es la nueva contraseña para tu cuenta en nuestra plataforma
    </p>
    <p>
        <h2>{{ $password }}</h2>
    </p>
    <p>
        para iniciar sesión haga clic en el siguiente botón:
    </p>

    {{-- boton --}}
    <p><a href="{{ url('/login') }}" style="display: inline-block; background-color: orange; color:#fff; padding: 12px; border-radius: 4px; text-decoration: none;">Resetear Mi Contraseña</a></p>

    {{-- URL --}}
    <p><strong>Si el botón anterior no le funciono, copie y pege la siquiente url en su navegador:</strong></p>
    <p>
        {{ url('/login') }}
    </p>
@stop