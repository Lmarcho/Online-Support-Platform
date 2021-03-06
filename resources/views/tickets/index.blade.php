@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> New Tickets </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <br>
                                @if(count($items)>0)
                                    @foreach ($items as $item)
                                        <div class="card">
                                            <div class="card-body"><h3><a href="/tickets/{{$item->id}}"> {{$item->name}} </a></h3>	</div>
                                        </div>
                                    @endforeach
                                    {{$items->links()}}
                                @else
                                    <p> No items found </p>
                                @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
