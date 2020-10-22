@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Estado Producto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estadoProducto, ['route' => ['estadoProductos.update', $estadoProducto->id], 'method' => 'patch']) !!}

                        @include('estado_productos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection