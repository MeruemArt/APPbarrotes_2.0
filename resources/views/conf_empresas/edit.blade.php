@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Conf Empresa
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($confEmpresa, ['route' => ['confEmpresas.update', $confEmpresa->id], 'method' => 'patch']) !!}

                        @include('conf_empresas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection