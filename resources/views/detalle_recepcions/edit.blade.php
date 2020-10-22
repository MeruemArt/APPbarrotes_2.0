@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detalle Recepcion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detalleRecepcion, ['route' => ['detalleRecepcions.update', $detalleRecepcion->id], 'method' => 'patch']) !!}

                        @include('detalle_recepcions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection