@extends('admin.template.page')

@section('title')
<i class="fa fa-paint-brush"></i> {{isset($artist) ? "Edycja artysty" : "Dodawanie artysty"}}
@stop 

@section('body')
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    {!! Form::open( [
                        'method' => isset($artist) ? "put" : "post",
                        'route' => isset($artist) ? ['admin.artists.update', $artist->id] : ['admin.artists.store'],
                        'files' => true
                    ]) !!}
                    
                    <div class="form-group">
                        {!! Form::label('name', 'Nazwa') !!}
                        {!! Form::text(
                            'name',
                            Input::old('name') != null ? Input::old('name') : (isset($artist) ? $artist->name : null),
                            ['class' => 'form-control']) 
                        !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('category', 'Kategoria') !!}
                        {!! Form::text(
                            'category',
                            Input::old('category') != null ? Input::old('category') : (isset($artist) ? $artist->category : null),
                            ['class' => 'form-control']) 
                        !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('contact_mail', 'Email kontaktowy') !!}
                        {!! Form::text(
                            'contact_mail',
                            Input::old('contact_mail') != null ? Input::old('contact_mail') : (isset($artist) ? $artist->contact_mail : null),
                            ['class' => 'form-control']) 
                        !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('contact_instagram', 'Instagram') !!}
                        {!! Form::text(
                            'contact_instagram',
                            Input::old('contact_instagram') != null ? Input::old('contact_instagram') : (isset($artist) ? $artist->contact_instagram : null),
                            ['class' => 'form-control']) 
                        !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('contact_facebook', 'Facebook') !!}
                        {!! Form::text(
                            'contact_facebook',
                            Input::old('contact_facebook') != null ? Input::old('contact_facebook') : (isset($artist) ? $artist->contact_facebook : null),
                            ['class' => 'form-control']) 
                        !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('description', 'Opis') !!}
                        {!! Form::textarea(
                            'description',
                            Input::old('description') != null ? Input::old('description') : (isset($artist) ? $artist->description : null),
                            ['class' => 'form-control']) 
                        !!}
                    </div>
                    
                    <a href="{{ route('admin.artists.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Powrót</a>
                    {{ Form::button(isset($artist) ? '<i class="fa fa-pencil-square-o"></i> Zapisz' : '<i class="fa fa-plus"></i> Dodaj', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop



