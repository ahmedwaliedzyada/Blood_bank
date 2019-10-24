<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Laracasts\Flash\Flash;

class ClientController extends Controller
{
    public function client()
    {
        $records = Client::all();
         //dd($records);
        return view('client',compact('records'));
    }

    public function active($id){
        $record = Client::findOrFail($id);
        $record->is_active =0;
        $record->save();
        return back();
    }

    public function disactive($id){
        $record = Client::findOrFail($id);
        $record->is_active =1;
        $record->save();
        return back();
    }

    public function destroy($id)
    {
        $record = Client::findOrFail($id);
        $record->delete();
        Flash::Message('Deleted');
        return back();
    }

}



