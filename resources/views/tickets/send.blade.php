@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$item->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/support" class="btn btn-primary "> Go Back </a>
                   <div class="card-body">
                        Customer Name : {{$item->name}}
                   </div>
                   <div class="card-body">
                        Referance Number : {{$item->refno}}
                    </div>
                    <div class="card-body">
                        Description : {{$item->description}}
                    </div>
                    <div class="card-body">
                        Email : {{$item->email}}
                    </div>
                    <div class="card-body">
                        Contact Number : {{$item->tpnumber}}
                    </div>

                    <hr>
                    {!! Form::open(['action'=>['TicketController@update',$item->id],'method'=> 'POST','class'=> 'card-body']) !!}
                    <div class="form-group">
                        {{ Form::label('reply','Reply Message') }}
                        {{ Form::text('reply',$item->reply,['class'=> 'form-control','placeholder'=>'Reply']) }}
                    </div>
                    <div class="form-group">
                        {{Form::hidden('_method','PUT')}}
                        {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

