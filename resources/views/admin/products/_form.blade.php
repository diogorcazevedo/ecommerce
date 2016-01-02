<div class="form-group">
    {!! Form::label('Category','Categoria:') !!}
    {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('colection','Coleções:') !!}
    {!! Form::select('colection_id',$colections,null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Name','Nome:') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Description','Descrição:') !!}
    {!! Form::textarea('description',null,['class'=>'form-control']) !!}
</div>



<div class="form-group">
    {!! Form::label('Price','Preço:') !!}
    {!! Form::text('price',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('store','Estoque:') !!}
    {!! Form::text('store',null,['class'=>'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('featured','Ativo:') !!}
    {!! Form::radio('featured', '1', ['class'=>'form-control','checked']) !!}

    {!! Form::label('featured','inativo:') !!}
    {!! Form::radio('featured', '0', ['class'=>'form-control']) !!}
</div>

