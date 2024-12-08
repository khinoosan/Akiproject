<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function index()
    {
        $hotels = Hotel::all();
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view ('admin.hotels.create');
    }


    public function store(Request $request)
    {
        $request ->validate([
            'name'=> 'required|string|max:255',
            'location'=>'required|string|max:255',

        ]);

        Hotel::create($request->all());
        return redirect()-> route('admin.hotels.index')->with('success','Hotel add successfully');
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view ('admin.hotels.edit', compact('hotel'));
    }
    public function update(Request $request, $id){
        $request->validate([

            'name'=> 'required|string|max:255',
            'location' => 'required|string|max:255',

        ]);
        $hotel =Hotel::findOrFail($id);
        $hotel->update($request->all());
        return redirect()->route('admin.hotels.index')->with('success','Hotel update successfully');
    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->route('admin.hotels.index')->with('success','Hotel delete successfully');

    }
}
