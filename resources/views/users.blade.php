<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row mt-4">
                <div class="col-12 mb-3">
                    <div>
                        <h1 class="float-left">Laravel Search</h1>
                        
                        {{-- Declaración de formulario de busqueda y filtrado --}}
                        
                        {!! Form::open(['route' => 'users.index', 'method' => 'GET', 'class' => 'form-inline float-right my-3']) !!}
                            <div class="form-group">

                                {{-- Recordar el valor del input a través de la variable request.
                                    
                                    Laravel recuerda esta info solo a través de redirecciones. Sin embargo, en este proyecto no se hace redirección tras enviar la consulta, por tanto nos valemos del mecanismo del request->get('variable_url') para recuperar y mostrar su valor. Pues al enviar el formulario, sus datos son enviados por GET, y quedan impresos en la URL. solo leémos su valor para rellenar nuevamente los campos
                                    
                                --}}
                                
                                {!! Form::text('name', request()->get('name'), ['class' => 'form-control form-control-sm mr-1', 'placeholder' => 'Nombre']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::text('email', request()->get('email'), ['class' => 'form-control form-control-sm mr-1', 'placeholder' => 'Email']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::text('bio', request()->get('bio'), ['class' => 'form-control form-control-sm mr-1', 'placeholder' => 'Biografía']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::button('Buscar', ['class' => 'btn btn-primary btn-sm', 'type' => 'submit']) !!}
                            </div>
                        {!! Form::close() !!}
                        <hr style="clear:both">
                    </div>
                </div>
                <div class="col-12">
                    <table class="table table-hover table-striped mb-4">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th width="200">Nombre</th>
                                <th>Email</th>
                                <th>Biografía</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->bio }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- 
                        Añadir la cadena de consulta a los resultados de la paginación
                        
                        El solo invocar a $users->render() generaría el paginador, pero al momento de moverse
                        por los resultados filtrados, estos automáticamente se resetearían; dato que cada
                        boton del paginador, envía una nueva petición al servidor con variable page?, omitiendo la cadena de consulta generada por el formulario.

                        En este sentido, anteponemos la cadena de consulta que tenemos escrita en la URL, a excepción de la variable page? (ya que nos interesa movernos a otra página diferente), la cual es añadida automáticamente por el paginador.

                        De esta forma podemos movernos por nuestros resultados filtrados, a través del paginador
                    --}}
                    {!! $users->appends(request()->except('page'))->render() !!}
                </div>
            </div>
        </div>
    </body>
</html>
