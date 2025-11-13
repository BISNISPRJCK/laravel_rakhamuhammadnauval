<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
  public function index(Request $request)
  {
    $rumahsakit = RumahSakit::all();
    $selected = $request->get('filter_rs');
    $data = Pasien::with('rumahSakit')
      ->when($selected, fn($q) => $q->where('rumah_sakit_id', $selected))
      ->get();

    if ($request->ajax()) {
      return view('pasien.table', compact('data'))->render();
    }

    return view('pasien.index', compact('data', 'rumahsakit', 'selected'));
  }

  public function store(Request $request)
  {
    Pasien::create($request->all());
    return redirect()->back()->with('success', 'Pasien ditambahkan');
  }

  public function destroy($id)
  {
    Pasien::destroy($id);
    return response()->json(['success' => true]);
  }
}
