<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
  public function index()
  {
    $data = RumahSakit::all();
    return view('rumahsakit.index', compact('data'));
  }

  public function store(Request $request)
  {
    RumahSakit::create($request->all());
    return redirect()->back()->with('success', 'Data berhasil ditambah');
  }

  public function destroy($id)
  {
    RumahSakit::destroy($id);
    return response()->json(['success' => true]);
  }
}
