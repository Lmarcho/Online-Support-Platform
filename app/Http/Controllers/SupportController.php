<?php

namespace App\Http\Controllers;

use App\Support;
use App\Mail\SupportTicket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function index()
    {
        $items = Support::orderBy('name','asc')->paginate(10);
        return view('support.index')->with('items',$items);
    }

    public function create()
    {
        return view('support.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'email' => 'required|email',
            'tpnumber' => 'required|numeric:10',
        ]);

        $item = new Support;
        $item->refno = Str::random(10);
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->email = $request->input('email');
        $item->tpnumber = $request->input('tpnumber');
        $item->save();

        // dd($item->email);

        Mail::to($request->email)->send(new SupportTicket($item));

        return redirect('/support')->with('success','Message Sent Successfully');


    }

    // public function search(Request $request){

    //     $search_text = $request->get('search');
    //     $support = Support::where('name', 'LIKE', '%'.$search_text.'%')->get();
    //     return view('support.show',compact('support'));


    // }


// use this for search
    public function show($id)
    {
        $item = Support::find($id);
        return view('support.show')->with('item',$item);
    }

    public function destroy($id)
    {
        $item =Support::find($id);
        $item ->delete();
        return redirect('/support')->with('success','Ticket is Removed');
    }
}
