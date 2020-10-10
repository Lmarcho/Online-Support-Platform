@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Open New Support Ticket</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div > <a href="/support" class="btn btn-primary "> Go Back </a></div>
                        {{ Form::open(['action' => 'SupportController@store','method' => 'POST'] ) }}
                        @csrf
                        <div class="form-group">
                            {{ Form::label('name','Customer Name') }}
                            {{ Form::text('name','',['class'=> 'form-control','placeholder'=>'Name']) }}
                        </div>
                        <div class="form-group" >
                            {{ Form::label('description','Problem Description') }}
                            {{ Form::text('description','',['class'=> 'form-control','placeholder'=>'Description']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email','Email Address') }}
                            {{ Form::text('email','',['class'=> 'form-control','placeholder'=>'Email']) }}
                        </div>
                        <div class="form-group" id="quan_field">
                            {{ Form::label('tpnumber','Contact Number') }}
                            {{ Form::text('tpnumber','',['class'=> 'form-control','placeholder'=>'Telephone Number']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
