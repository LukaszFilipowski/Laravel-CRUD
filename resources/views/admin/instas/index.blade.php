@extends('admin.template.page')

@section('title')
<i class="fa fa-rocket"></i> Konta insta
@stop 

@section('buttons')
<a class="btn btn-success pull-right btn-margin-bottom" href="{{ route('admin.instas.create') }}"><i class="fa fa-plus"></i> Dodaj nowe konto insta</a>
@stop

@section('body')
    <div class="row">
        <div class="col-md-12">
            @if (isset($instas[0]))
                <div class="panel panel-default">

                    <div class="panel-body">
                        <table id="table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nazwa</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instas as $insta) 
                                <tr>
                                    <td>{{ $insta->id }}</td>
                                    <td>{{ $insta->name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary btn-margin" href="{{ route('admin.instas.edit', $insta->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj</a>
                                        <a data-href="{{ route('admin.instas.delete', $insta->id) }}" class="btn btn-sm btn-danger btn-margin deletable"><i class="fa fa-trash-o"></i> Usuń</a>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            @else 
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-info-circle"></i>Brak dodanych kont insta
                </div>
            @endif
        </div>
    </div>
@stop

@section('scripts')
<script>
    $(document).ready(function() {
        $('#table').DataTable( {  
            "bDestroy": true,
            'columns': [
                null, 
                null,
                { "orderable": false }
            ]
        });
    });
</script>
@stop

