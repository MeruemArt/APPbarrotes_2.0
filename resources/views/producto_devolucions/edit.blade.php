@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Producto Devolucion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productoDevolucion, ['route' => ['productoDevolucions.update', $productoDevolucion->id], 'method' => 'patch']) !!}

                        @include('producto_devolucions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection