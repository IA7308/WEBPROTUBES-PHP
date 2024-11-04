<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $prods = Dashboard::all();
        $newProds = Dashboard::orderBy('created_at', 'desc')->take(6)->get();
        $totalProducts = Dashboard::count();
        $mostViewed = Dashboard::orderBy('views', 'desc')->first();
        $topCategory = Dashboard::select('category')
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
        $prod = new Dashboard;
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
        $data = Dashboard::findOrFail($id);
        $data->delete();
        return redirect('/Dashboard');
    }

    public function edit($id)
    {
        return view('Add-Carouse', [
            'title' => 'Edit',
            'method' => 'PUT',
            'action' => "/dashboard/$id/update",
            'data' => Dashboard::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $prod = Dashboard::find($id);
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
