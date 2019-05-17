@extends('layouts.app_admin')

@section('content')
    <div id="content">
        <div class="card">
            <div class="card-header">
                <h4 style="position: absolute;"><strong>Reportes Generados</strong></h4>
                <div class="float-right">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalCreate">Generar Reporte</button>
                </div>
            </div>

            <div class="card-body">
                @if(!($reportes->isEmpty()))
                    <table class="table table-striped">
                        <tr>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Tamaño</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach ($reportes as $reporte)
                            <tr>
                                <td>{{ $reporte->nombre }}</td>
                                <td>
                                    @if($reporte->categoria == null)
                                        Reporte General
                                    @else
                                        {{ $reporte->categoria()->first()['name'] }}</td>
                                    @endif
                                <td>el tamaño</td>
                                <td>
                                    @csrf
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-warning" type="button" title="Visualizar">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <form action="{{ url('/adminpanel/reportes/'.$reporte->id) }}" method="POST">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger" type="submit" title="Borrar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="alert alert-warning" role="alert">
                        No hay Reportes para mostrar.
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Nuevo Reporte</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <form action="/adminpanel/reportes/generar" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre del reporte</label>
                            <input type="text" class="form-control" name="file_name">
                        </div>
                        <div class="form-group">
                            <p><label for="categoria">
                                <select class="form-control" name="category_id">
                                    <option value="">Sin asignar</option>
                                    <option value="99">Todas las Categorias</option>
                                    @foreach($categorias as $categoria)
                                        <option value = "{{$categoria->id}}">
                                            {{ $categoria->name }}
                                        </option>
                                    @endforeach
                                </select>
                                        {!! $errors->first('categoria', '<span class=error>:message</span>') !!}
                            </label></p>
                        </div>
                        @include('commons.errors')
                </div>
    
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection