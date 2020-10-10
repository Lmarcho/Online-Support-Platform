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
                   <div class="card">
                        Customer Name : {{$item->name}}
                   </div>
                   <div class="card">
                        Referance Number : {{$item->refno}}
                    </div>
                    <div class="card">
                        Description : {{$item->description}}
                    </div>
                    <div class="card">
                        Email : {{$item->email}}
                    </div>
                    <div class="card">
                        Contact Number : {{$item->tpnumber}}
                    </div>



                    <hr>
                    {!! Form::open(['action'=>['SupportController@destroy',$item->id],'method'=> 'POST','class'=> 'float-right']) !!}
                        {{ Form::hidden('_method','DELETE') }}
                        {{ Form::submit('Delete',['class'=> 'btn btn-danger']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

