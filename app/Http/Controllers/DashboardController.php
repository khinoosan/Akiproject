<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

use App\Http\Requests\StoreDataRequest;
use App\Http\Requests\UpdateDataRequest;

class DashboardController extends Controller
{
    public function index()
    {
     
        $dataEntries = Data::all(); 
    
       
        $user = Auth::user();
        $isAdmin = Auth::guard('admin')->check(); 
    

        return view('data.index', compact('dataEntries', 'isAdmin', 'user'));
      
    }
    
    public function create()
    {
        return view('data.register');
    }


    
    public function store(StoreDataRequest $request)
    {
       
        Data::create($request->validated());
    
        return redirect()->route('dashboard.index')->with('success');
    }
    
    public function update(UpdateDataRequest $request, $id)
    {
        $data = Data::findOrFail($id);
        $data->update($request->validated());
    
        return redirect()->route('dashboard.index')->with('success');
    }
    
    

    public function destroy($id)
    {
        $data = Data::findOrFail($id); 
    
        $data->delete(); 
    
        return redirect()->route('dashboard.index')->with('success');
    }
        
    public function show($id)
    {
        $data = Data::findOrFail($id); 
        return view('data.edit', compact('data')); 
    }
    
    

    public function exportCSV()
    {
        $dataEntries = Data::all();
        $fileName = 'data_export_' . now()->format('Ymd_His') . '.csv';
    
       
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];
    
    
        $callback = function () use ($dataEntries) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['タイトル', 'カテゴリ', '本文']); 
    
            foreach ($dataEntries as $entry) {
                fputcsv($handle, [
                    $entry->title,
                    $entry->category,
                    $entry->content,
                ]);
            }
    
            fclose($handle);
        };
    
       
        return Response::stream($callback, 200, $headers);
    }

    

}