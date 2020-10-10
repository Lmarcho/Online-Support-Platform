@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Online Support Plateform Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div> <a href="support/create" class="btn btn-primary"> Open New Support Ticket </a>   </div>
                        <br>

                        <form class="form-inline" type="get" action="/support/show">
                            <input class="form-control mr-sm-2" name="query" type="search" placeholder="Reference Number" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                            {{-- use this for search --}}
                            <br>
                            @if(count($items)>0)
                                @foreach ($items as $item)
                                    <div class="card">
                                        <div class="card-body"><h3><a href="/support/{{$item->id}}"> {{$item->name}} </a></h3>	</div>
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
