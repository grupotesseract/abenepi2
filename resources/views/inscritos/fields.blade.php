<!-- Cpf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cpf', 'Cpf:') !!}
    {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Profissao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profissao', 'Profissao:') !!}
    {!! Form::text('profissao', null, ['class' => 'form-control']) !!}
</div>

<!-- Endereco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endereco', 'Endereco:') !!}
    {!! Form::text('endereco', null, ['class' => 'form-control']) !!}
</div>

<!-- Bairro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bairro', 'Bairro:') !!}
    {!! Form::text('bairro', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Complemento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('complemento', 'Complemento:') !!}
    {!! Form::text('complemento', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Senha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('senha', 'Senha:') !!}
    {!! Form::password('senha', ['class' => 'form-control']) !!}
</div>

<!-- Compareceu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compareceu', 'Compareceu:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('compareceu', false) !!}
        {!! Form::checkbox('compareceu', '1', null) !!} 1
    </label>
</div>

<!-- Pagou Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pagou', 'Pagou:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('pagou', false) !!}
        {!! Form::checkbox('pagou', '1', null) !!} 1
    </label>
</div>

<!-- Cidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cidade', 'Cidade:') !!}
    {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('inscritos.index') !!}" class="btn btn-default">Cancel</a>
</div>
