<?php

namespace App\Http\Controllers;
use App\Models\Data;


use Illuminate\Http\Request;

class DashboardController extends Controller
{



public function index()
{
    $dataEntries = Data::all();
    return view('data.index', compact('dataEntries'));
}


public function create()
{
    return view('data.register');
}


public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    Data::create($validated);

    return redirect()->route('dashboard.index')->with('success', 'データが登録されました');
}


public function edit($id)
{
    $dataEntry = Data::findOrFail($id);
    return view('data.edit', compact('dataEntry'));
}



public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $entry = Data::findOrFail($id);
    $entry->update($validated);

 
    return redirect()->route('dashboard.index');
}



public function destroy($id)
{
    $entry = Data::findOrFail($id);
    $entry->delete();

    return redirect()->route('dashboard.index');
}

}
