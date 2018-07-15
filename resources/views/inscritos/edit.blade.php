@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Inscrito
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($inscrito, ['route' => ['inscritos.update', $inscrito->id], 'method' => 'patch']) !!}

                        @include('inscritos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
