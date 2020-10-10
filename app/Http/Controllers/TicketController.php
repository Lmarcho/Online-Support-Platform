<?php

namespace App\Http\Controllers;

// use App\Ticket;
use App\Support;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $items = Support::orderBy('name','asc')->paginate(10);
        return view('tickets.index')->with('items',$items);
    }
    public function show($id)
    {
        $item = Support::find($id);
        return view('tickets.send')->with('item',$item);
    }

    public function update(Request $request, $id)
    {
        $item = Support::find($id);
        $item->reply = $request->input('reply');
        $item->save();

        return redirect('/tickets')->with('success','Reply sent');
    }
}
