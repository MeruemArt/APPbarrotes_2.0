@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Inv Producto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($invProducto, ['route' => ['invProductos.update', $invProducto->id], 'method' => 'patch']) !!}

                        @include('inv_productos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection