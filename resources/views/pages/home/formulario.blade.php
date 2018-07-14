<div class="container formulario" id="formulario">
	<h1 class="text-center mb-4">Formulário para Inscrição</h1>

	<p class="mb-4">Após a inscrição, você será redirecionado a página do <span>PAGSEGURO</span>, onde deve ser efetuado o pagamento.</p>

	<div class="row">
		<div class="col-12 col-lg-6">
			<h5>Valores até 10/08/2018:</h5>
			<ul class="mb-4">
				<li>Estudantes (Graduação e Pós-Graduação): R$250,00</li>
				<li>Profissionais e outros: R$300,00</li>
				<li>Profissionais sócios (ABENEPI, ABPp): R$250,00</li>
			</ul>			
		</div>

		<div class="col-12 col-lg-6">
			<h5>Valores até 10/09/2018:</h5>
			<ul class="mb-4">
				<li>Estudantes (Graduação e Pós-Graduação): R$300,00</li>
				<li>Profissionais e outros: R$350,00</li>
				<li>Profissionais sócios (ABENEPI, ABPp): R$300,00</li>
			</ul>			
		</div>

		<div class="col-12 col-lg-6">
			<h5>No local do evento:</h5>
			<ul class="mb-4">
				<li>Estudantes (Graduação e Pós-Graduação): R$350,00</li>
				<li>Profissionais e outros: R$400,00</li>
				<li>Profissionais sócios (ABENEPI, ABPp): R$350,00</li>
			</ul>			
		</div>

		<div class="col-12 col-lg-6">
			<h5>Inscrição para 1 dia de evento:</h5>
			<ul class="mb-4">
				<li>Estudantes (Graduação e Pós-Graduação): R$210,00</li>
				<li>Profissionais: R$245,00</li>
				<li>Profissionais sócios (ABENEPI, ABPp): R$210,00</li>
			</ul>			
		</div>
	</div>

	<p><span>Obs:</span> O Núcleo São Carlos da Abenepi reserva-se ao direito de aceitar somente as inscrições realizadas dentro do prazo e de encerrar as inscrições assim que todas as vagas forem preenchidas.</p>

	<form class="form-horizontal" action="{{url('/inscricao')}}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="compareceu" value="false">
		<input type="hidden" name="pagou" value="false">
		<input type="hidden" name="evento_id" value="1">

		@if ($errors->any())		
			<div id="erros" class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <ul>
	        @foreach ($errors->all() as $error)
	        	<li>{{ $error }}</li>
	        @endforeach
		    </ul>
			</div>
		@endif	
		
		<div class="alert alert-warning center-block text-center" role="alert">
		  <i class="glyphicon glyphicon-exclamation-sign"></i> 
		  <span aria-hidden="true">Todos os campos são obrigatórios (exceto Complemento)</span>		  
		</div>	
		    
		<div class="form-group">
			<div class="row">
				<div class="col-12 col-lg-3 mb-2">
					<label id="label_form" for="nome" class="control-label">Nome</label>
				  <input type="text" class="form-control" name="nome" value="{{ old('nome')}}">
				</div>

				<div class="col-12 col-lg-3 mb-2">
					<label id="label_form" for="cpf" class="control-label">CPF</label>	
					<input type="text" class="form-control" placeholder="99999999999" maxlength="11" name="cpf" value="{{ old('cpf') }}">
				</div>
		  		
		  	<div class="col-12 col-lg-3 mb-2">
					<label id="label_form" for="datanasc" class="control-label">Data de Nascimento</label>
					<input type="text" class="form-control" placeholder="dd/mm/yyyy" name="datanasc" value="{{ old('datanasc') }}">
		  	</div>

		  	<div class="col-12 col-lg-3 mb-2">
					<label id="label_form" for="profissao" class="control-label">Profissão</label>
					<input type="text" class="form-control" name="profissao" value="{{ old('profissao') }}">
		  	</div>

				<div class="col-12 mb-2">
					<label id="label_form" for="endereco" class="control-label">Endereço</label>
					<input type="text" class="form-control" name="endereco" value="{{ old('endereco') }}">				
				</div>

				<div class="col-12 col-lg-3 mb-2">
					<label id="label_form" for="bairro" class="control-label">Bairro</label>
					<input type="text" class="form-control" name="bairro" value="{{ old('bairro') }}">		  	
				</div>

				<div class="col-12 col-lg-3 mb-2">
					<label id="label_form" for="numero" class="control-label">Número</label>
					<input type="text" class="form-control" name="numero" value="{{ old('numero') }}">		  	
				</div>

				<div class="col-12 col-lg-3 mb-2">
					<label id="label_form" for="complemento" class="control-label">Complemento (opcional)</label>
					<input type="text" class="form-control" name="complemento" value="{{ old('complemento') }}" maxlength="20">
				</div>

				<div class="col-12 col-lg-3 mb-2">
					<label id="label_form" for="cep" class="control-label">CEP</label>
					<input type="text" class="form-control" maxlength="8" placeholder="99999999" name="cep" value="{{ old('cep') }}">
				</div>

				<div class="col-12 col-lg-6 mb-2">
					<label id="label_form" for="estado" class="control-label">Estado</label>
					<select class="form-control" id="state" name="state_id" value="{{ old('state_id') }}" onchange="stateonChange(this.value);">
						{{--@foreach ($estados as $estado)
							<option value="{{$estado->id}}" {{ (old("state_id") == $estado->id ? "selected":"") }}>{{$estado->name}}</option>
						@endforeach--}}
					</select>			 
				</div>

				<div class="col-12 col-lg-6 mb-2">
					<label id="label_form" for="cidade" class="control-label">Cidade</label>
					<select class="form-control" id="city" name="citie_id" value="{{ old('citie_id') }}">
						{{--@foreach ($cidades as $cidade)
							<option value="{{$cidade->id}}" {{ (old("citie_id") == $cidade->id ? "selected":"") }}>{{$cidade->name}}</option>
						@endforeach--}}
					</select>
				</div>	 
				
				<div class="col-12 mb-2">
					<label id="label_form" for="telefone" class="control-label">Telefone</label>
				  <input type="text" class="form-control" maxlength="14" placeholder="(14)91234-5678" name="telefone" value="{{ old('telefone') }}">
				</div>	

				<div class="col-12 col-lg-6 mb-2">
					<label id="label_form" for="inputEmail3" class="control-label">Email</label>
					<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="email@exemplo.com.br" value="{{ old('email') }}">
				</div>

				<div class="col-12 col-lg-6 mb-2">
					<label id="label_form" for="inputPassword3" class="control-label">Senha</label>
				  <input type="password" class="form-control" name="senha" id="inputsenha3" value="{{ old('senha') }}">
				</div>

				<div class="col-12 mt-4 mb-4">
					<h5>Selecione uma das opções abaixo:</h5>
				</div>

				<div class="col-12 col-lg-6 mb-2">
			    <input type="radio" id="valor1" name="valor" value="250" @if(old('valor') == 250) checked @endif>
			    <label for="valor1">Estudantes (Graduação e Pós-Graduação): R$250,00</label>
			  </div>

			  <div class="col-12 col-lg-6 mb-2">
			    <input type="radio" id="valor2" name="valor" value="250" @if(old('valor') == 300) checked @endif>
			    <label for="valor2">Profissionais e outros: R$300,00</label>
			  </div>

			  <div class="col-12 col-lg-6 mb-2">
			    <input type="radio" id="valor3" name="valor" value="250" @if(old('valor') == 250) checked @endif>
			    <label for="valor3">Profissionais sócios (ABENEPI, ABPp): R$250,00</label>
			  </div>
				{{--
				<div class="col-12 col-lg-6 mb-2">
				  <label id="label_form">
				  	<input type="radio" name="valor" value="250" @if(old('valor') == 250) checked @endif>
				  	Estudantes (Graduação e Pós-Graduação): R$250,00
				  </label>
				</div>

				<div class="col-12 col-lg-6 mb-2">
				  <label id="label_form">
				  	<input type="radio" name="valor" value="300" @if(old('valor') == 300) checked @endif>
				  	Profissionais e outros: R$300,00
				  </label>
				</div>

				<div class="col-12 col-lg-6 mb-2">
				  <label id="label_form">
				  	<input type="radio" name="valor" value="250" @if(old('valor') == 250) checked @endif>
				  	Profissionais sócios (ABENEPI, ABPp): R$250,00
				  </label>
				</div>--}}

				<div class="text-center col-12 mt-3 mb-5">
					<button type="submit" class="btn btn-default">Inscrever-se</button>
				</div>
			</div>{{-- End Row --}}
		</div>{{-- End Form-Group --}}
	</form>
</div>