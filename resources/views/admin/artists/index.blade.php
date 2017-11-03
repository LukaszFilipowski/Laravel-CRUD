@extends('admin.template.page')

@section('title')
<i class="fa fa-paint-brush"></i> Zarządzanie artystami
@stop 

@section('buttons')
<a class="btn btn-success pull-right btn-margin-bottom" href="{{ route('admin.artists.create') }}"><i class="fa fa-plus"></i> Dodaj nowego artystę</a>
@stop

@section('body')
    <div class="row">
        <div class="col-md-12">
            @if (isset($artists[0]))
                <div class="panel panel-default">

                    <div class="panel-body">
                        <table id="table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nazwa</th>
                                    <th>Kategoria</th>
                                    <th>Email kontaktowy</th>
                                    <th>Instagram</th>
                                    <th>Facebook</th>
                                    <th>Opis</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($artists as $artist) 
                                <tr>
                                    <td>{{ $artist->id }}</td>
                                    <td>{{ $artist->name }}</td>
                                    <td>{{ $artist->category }}</td>
                                    <td>{{ $artist->contact_mail }}</td>
                                    <td>{{ $artist->contact_instagram }}</td>
                                    <td>{{ $artist->contact_facebook }}</td>
                                    <td>{{ $artist->description }}</td>
                                    <td>
                                        @if($artist->accepted == 1) 
                                            <p style='color:green'><i class="fa fa-check"></i> Zaakceptowany</p>
                                        @else
                                            <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Zaakceptuj</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary btn-margin" href="{{ route('admin.artists.edit', $artist->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj</a>
                                        <a data-href="{{ route('admin.artists.delete', $artist->id) }}" class="btn btn-sm btn-danger btn-margin deletable"><i class="fa fa-trash-o"></i> Usuń</a>
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
                    <i class="icon fa fa-info-circle"></i>Brak dodanych artystów
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
                null,
                null,
                null,
                null,
                null,
                null,
                { "orderable": false }
            ]
        });
    });
</script>
@stop


