<?php

namespace App\Http\Controllers;

use App\Models\dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $prods = dashboard::all();
        $newProds = dashboard::orderBy('created_at', 'desc')->take(6)->get();
        $totalProducts = dashboard::count();
        $mostViewed = dashboard::orderBy('views', 'desc')->first();
        $topCategory = dashboard::select('category')
            ->groupBy('category')
            ->orderByRaw('COUNT(*) DESC')
            ->first();
        $testimonials = [];

        return view('dashboard', compact('prods', 'newProds', 'totalProducts', 'mostViewed', 'topCategory', 'testimonials'));
    }

    public function create()
    {
        return view('Add-Carouse', [
            'title' => 'Create',
            'method' => 'POST',
            'action' => '/storeDashboard'
        ]);
    }

    public function store(Request $request)
    {
        $prod = new dashboard;
        $prod->Judul = $request->Judul;
        if ($request->file('Image')) {
            $file = $request->file('Image');
            $filename = date('YmdHi') . $file->getClientOriginalExtension();
            $file->move(public_path('public/Image'), $filename);
            $prod->Image = $filename;
        }
        $prod->Deskripsi = $request->Deskripsi;
        $prod->save();
        return redirect('/Dashboard')->with('msg', 'Tambah berhasil');
    }

    public function destroy($id)
    {
        $data = dashboard::findOrFail($id);
        $data->delete();
        return redirect('/Dashboard');
    }

    public function edit($id)
    {
        return view('Add-Carouse', [
            'title' => 'Edit',
            'method' => 'PUT',
            'action' => "/dashboard/$id/update",
            'data' => dashboard::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $prod = dashboard::find($id);
        $prod->Judul = $request->Judul;
        if ($request->file('Image')) {
            $file = $request->file('Image');
            $filename = date('YmdHi') . $file->getClientOriginalExtension();
            $file->move(public_path('public/Image'), $filename);
            $prod->Image = $filename;
        }
        $prod->Deskripsi = $request->Deskripsi;
        $prod->save();
        return redirect('/Dashboard')->with('msg', 'Update berhasil');
    }
}
