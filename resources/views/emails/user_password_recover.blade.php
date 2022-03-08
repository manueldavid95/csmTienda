@extends('emails.master')

@section('content')
    <p>
        Hola: <strong>{{ $name }}</strong>
    </p>
    <p>
        Este es un correo electrónico que le ayudara a reestablecer la contraseña de su cuenta en nuestra plataforma.
    </p>
    <p>
        Para continuar haga click en el siguiente botón e ingrese el siguiente código: <h2>{{ $code }}</h2>
    </p>

    {{-- boton --}}
    <p><a href="{{ url('/reset?email='.$email) }}" style="display: inline-block; background-color: orange; color:#fff; padding: 12px; border-radius: 4px; text-decoration: none;">Resetear Mi Contraseña</a></p>

    {{-- URL --}}
    <p><strong>Si el botón anterior no le funciono, copie y pege la siquiente url en su navegador:</strong></p>
    <p>
        {{ url('/reset?email='.$email) }}
    </p>
@stop