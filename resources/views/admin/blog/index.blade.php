@extends('admin.template.page')

@section('title')
<i class="fa fa-comments"></i> Zarządzanie postami
@stop 

@section('buttons')
<a class="btn btn-success pull-right btn-margin-bottom" href="{{ route('admin.blog.create') }}"><i class="fa fa-plus"></i> Dodaj nowy post</a>
@stop

@section('body')
    <div class="row">
        <div class="col-md-12">
            @if (isset($posts[0]))
                <div class="panel panel-default">

                    <div class="panel-body">
                        <table id="table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nazwa</th>
                                    <th>Tekst</th>
                                    <th>Data dodania</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post) 
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary btn-margin" href="{{ route('admin.blog.edit', $post->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj</a>
                                        <a data-href="{{ route('admin.blog.delete', $post->id) }}" class="btn btn-sm btn-danger btn-margin deletable"><i class="fa fa-trash-o"></i> Usuń</a>
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
                    <i class="icon fa fa-info-circle"></i>Brak dodanych postów
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
                { "orderable": false }
            ]
        });
    });
</script>
@stop

