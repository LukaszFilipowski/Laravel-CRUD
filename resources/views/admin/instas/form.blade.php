@extends('admin.template.page')

@section('title')
<i class="fa fa-connectdevelop"></i> {{isset($insta) ? "Edycja konta insta" : "Dodawanie konta insta"}}
@stop 

@section('body')
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    {!! Form::open( [
                        'method' => isset($insta) ? "put" : "post",
                        'route' => isset($insta) ? ['admin.instas.update', $insta->id] : ['admin.instas.store']
                    ]) !!}
                    
                    <div class="form-group">
                        {!! Form::label('name', 'Nazwa konta') !!}
                        {!! Form::text(
                            'name',
                            Input::old('name') != null ? Input::old('name') : (isset($insta) ? $insta->name : null),
                            ['class' => 'form-control']) 
                        !!}
                    </div>
                    
                    <a href="{{ route('admin.instas.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Powrót</a>
                    {{ Form::button(isset($insta) ? '<i class="fa fa-pencil-square-o"></i> Zapisz' : '<i class="fa fa-plus"></i> Dodaj', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop


