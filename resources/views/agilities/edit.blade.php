@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agility
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($agility, ['route' => ['agilities.update', $agility->id], 'method' => 'patch']) !!}

                        @include('agilities.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection