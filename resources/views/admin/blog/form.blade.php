@extends('admin.template.page')

@section('title')
<i class="fa fa-connectdevelop"></i> {{isset($post) ? "Edycja posta" : "Dodawanie posta"}}
@stop 

@section('body')
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    {!! Form::open( [
                        'method' => isset($post) ? "put" : "post",
                        'route' => isset($post) ? ['admin.blog.update', $post->id] : ['admin.blog.store'],
                        'files' => true
                    ]) !!}
                    
                    <div class="form-group">
                        {!! Form::label('name', 'Nazwa') !!}
                        {!! Form::text(
                            'name',
                            Input::old('name') != null ? Input::old('name') : (isset($post) ? $post->name : null),
                            ['class' => 'form-control']) 
                        !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('content', 'Treść') !!}
                        {!! Form::textarea(
                            'content',
                            Input::old('content') != null ? Input::old('content') : (isset($post) ? $post->content : null),
                            ['class' => 'form-control']) 
                        !!}
                    </div>
                    
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Powrót</a>
                    {{ Form::button(isset($post) ? '<i class="fa fa-pencil-square-o"></i> Zapisz' : '<i class="fa fa-plus"></i> Dodaj', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop


