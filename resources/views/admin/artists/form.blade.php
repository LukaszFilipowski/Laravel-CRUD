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
                    
                    <h3>Osiągnięcia</h3>
                    
                    @if(isset($artist)) 
                        @foreach($artist->achievements as $achievement)
                            <div class="form-group">
                                {!! Form::label('achievement_name'.$loop->index, 'Nazwa osiągnięcia') !!}
                                {!! Form::text(
                                    'achievement_name'.$loop->index,
                                    Input::old('achievement_name'.$loop->index) != null ? Input::old('achievement_name'.$loop->index) : $achievement->name,
                                    ['class' => 'form-control']) 
                                !!}
                                {!! Form::hidden('achievement_id'.$loop->index, 
                                    $achievement->id,
                                    array())
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('achievement_content'.$loop->index, 'Opis osiągnięcia') !!}
                                {!! Form::textarea(
                                    'achievement_content'.$loop->index,
                                    Input::old('achievement_content'.$loop->index) != null ? Input::old('achevement_content'.$loop->index) : $achievement->content,
                                    ['class' => 'form-control']) 
                                !!}
                            </div>
                            @php $i = $loop->index; $i++; @endphp
                        @endforeach
                    
                    @else
                        <div class="form-group">
                            {!! Form::label('achievement_name0', 'Nazwa osiągnięcia') !!}
                            {!! Form::text(
                                'achievement_name0',
                                Input::old('achievement_name0') != null ? Input::old('achievement_name0') : null,
                                ['class' => 'form-control']) 
                            !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('achievement_content0', 'Opis osiągnięcia') !!}
                            {!! Form::textarea(
                                'achievement_content0',
                                Input::old('achievement_content0') != null ? Input::old('achievement_content0') : null,
                                ['class' => 'form-control']) 
                            !!}
                        </div>
                        @php $i = 1 @endphp
                    @endif
                    
                    <div id="achievements"></div>
                    
                    <a data-index="{{ $i }}" class="addNewAchievement btn btn-info">Dodaj kolejne osiągnięcie</a>
                    
                    @php $i = 0 @endphp
                    <h3>Portfolio</h3>
                    
                    @if(isset($artist)) 
                        @foreach($artist->portfolioItems as $item)
                            <div class="form-group">
                                {!! Form::label('item_name'.$loop->index, 'Nazwa elementu portfolio') !!}
                                {!! Form::text(
                                    'item_name'.$loop->index,
                                    Input::old('item_name'.$loop->index) != null ? Input::old('item_name'.$loop->index) : $item->name,
                                    ['class' => 'form-control']) 
                                !!}
                                {!! Form::hidden('item_id'.$loop->index, 
                                    $item->id,
                                    array())
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('item_content_type'.$loop->index, 'Typ elementu portfolio') !!}
                                {!! Form::select(
                                    'item_content_type'.$loop->index,
                                    [0 => 'Zdjęcie', 1 => 'Link'],
                                    $item->content_type,
                                    ['class' => 'form-control changeContentType']) 
                                !!}
                            </div>
                            @if($item->content_type == 0) 
                                <div class="form-group">
                                    {!! Form::label('item_content'.$loop->index, 'Element') !!}
                                    {!! Form::file(
                                        'item_content'.$loop->index,
                                        ['class' => 'form-control']) 
                                    !!}
                                </div>
                            @else 
                                <div class="form-group">
                                    {!! Form::label('item_content'.$loop->index, 'Element') !!}
                                    {!! Form::text(
                                        'item_content'.$loop->index,
                                        Input::old('item_content'.$loop->index) != null ? Input::old('item_content'.$loop->index) : $item->content,
                                        ['class' => 'form-control']) 
                                    !!}
                                </div>
                            @endif
                            @php $i = $loop->index; $i++; @endphp
                        @endforeach
                    
                    @else
                        <div class="form-group">
                            {!! Form::label('item_name0', 'Nazwa elementu portfolio') !!}
                            {!! Form::text(
                                'item_name0',
                                Input::old('item_name0') != null ? Input::old('item_name0') : null,
                                ['class' => 'form-control']) 
                            !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('item_content_type0', 'Typ elementu portfolio') !!}
                            {!! Form::select(
                                'item_content_type0',
                                [0 => 'Zdjęcie', 1 => 'Link'],
                                Input::old('item_content_type0') != null ? Input::old('item_content_type0') : null,
                                ['class' => 'form-control changeContentType']) 
                            !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('item_content0', 'Element') !!}
                            {!! Form::file(
                                'item_content0',
                                Input::old('item_content0') != null ? Input::old('item_content0') : null,
                                ['class' => 'form-control']) 
                            !!}
                        </div>
                        @php $i = 1 @endphp
                    @endif
                    
                    <div id="portfolioItems"></div>
                    
                    <a data-index="{{ $i }}" class="addNewPortfolioItem btn btn-info">Dodaj kolejny element portfolio</a>
                    
                    
                    <a href="{{ route('admin.artists.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Powrót</a>
                    {{ Form::button(isset($artist) ? '<i class="fa fa-pencil-square-o"></i> Zapisz' : '<i class="fa fa-plus"></i> Dodaj', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
<script>
$( document ).on('change', '.changeContentType', function(e){ 
    var val = $(this).val();
    var id = $(this).attr('name');
    id = id.charAt(id.length - 1);
    
    if (val == 1) {
        $('input[name=item_content'+id+']').attr('type', 'text');
    } else {
        $('input[name=item_content'+id+']').attr('type', 'file');
    }
});

$( document ).on('click', '.addNewAchievement', function(e){ 
    var index = $(this).data('index');
    
    var formGroup = document.createElement('div');
    formGroup.className = 'form-group';
    
    var label = document.createElement('label');
    label.for = 'achievement_name' + index;
    label.innerHTML = 'Nazwa osiągnięcia ' + parseInt(index + 1);
    formGroup.appendChild(label);
    
    var input = document.createElement('input');
    input.name = 'achievement_name' + index;
    input.className = 'form-control';
    formGroup.appendChild(input);
    
    var label = document.createElement('label');
    label.for = 'achievement_content' + index;
    label.innerHTML = 'Opis osiągnięcia ' + parseInt(index + 1);
    formGroup.appendChild(label);
    
    var input = document.createElement('textarea');
    input.name = 'achievement_content' + index;
    input.className = 'form-control';
    formGroup.appendChild(input);
    
    var achievements = document.getElementById('achievements');
    achievements.appendChild(formGroup);
    
    index = parseInt(index);
    index++;
    
    $(this).data('index', index);
});

$( document ).on('click', '.addNewPortfolioItem', function(e){ 
    var index = $(this).data('index');
    
    var formGroup = document.createElement('div');
    formGroup.className = 'form-group';
    
    var label = document.createElement('label');
    label.for = 'item_name' + index;
    label.innerHTML = 'Nazwa elementu portfolio ' + parseInt(index + 1);
    formGroup.appendChild(label);
    
    var input = document.createElement('input');
    input.name = 'item_name' + index;
    input.className = 'form-control';
    formGroup.appendChild(input);
    
    var label = document.createElement('label');
    label.for = 'item_content_type' + index;
    label.innerHTML = 'Typ elementu portfolio ' + parseInt(index + 1);
    formGroup.appendChild(label);
    
    var select = document.createElement('select');
    select.name = 'item_content_type' + index;
    select.className = 'form-control changeContentType';
    
    var option = document.createElement('option');
    option.value = 0;
    option.innerHTML = 'Zdjęcie';
    select.appendChild(option);
    
    var option = document.createElement('option');
    option.value = 1;
    option.innerHTML = 'Link';
    select.appendChild(option);
    formGroup.appendChild(select);
    
    var label = document.createElement('label');
    label.for = 'item_content' + index;
    label.innerHTML = 'Element ' + parseInt(index + 1);
    formGroup.appendChild(label);
    
    var input = document.createElement('input');
    input.type = 'file';
    input.className = 'form-control';
    input.name = 'item_content' + index;
    formGroup.appendChild(input);
    
    var portfolioItem = document.getElementById('portfolioItems');
    portfolioItems.appendChild(formGroup);
    
    index = parseInt(index);
    index++;
    
    $(this).data('index', index);
});
</script>
@stop




