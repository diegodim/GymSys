{{ Form::open(['method'=>'GET','url'=>isset($url)? $url : '#','class'=>'form form-inline']) }}
<div class="input-group">
    {{ Form::text('search', old('search', isset($search) ?  $search : ''), ['class'=>'form-control',  'placeholder'=>'Pesquisar']) }}
    <div class="input-group-btn">
        <button type="submit" class="btn btn-info">
            <i class="fas fa-search"></i> Buscar
        </button>
    </div>
</div>
{{ Form::close() }}
