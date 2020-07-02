<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertanyaanController extends Controller
{
    public function index() {
        $pertanyaan = Pertanyaan::all();
        $no = 1;
        return view('pages.pertanyaan.index', compact('pertanyaan', 'no'));
    }

    public function create() {
        return view('pages.pertanyaan.create');
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try{
            Pertanyaan::create([
                'judul' => $request->judul,
                'isi' => $request->isi
            ]);
            DB::commit();
            return redirect(route('pertanyaan.index'));
        } catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
