<?php

namespace App\Http\Controllers;

use App\Jawaban;
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

    public function show($id) {
        try{
            $pertanyaan = Pertanyaan::find($id);
            return view('pages.pertanyaan.show', compact('pertanyaan'));
        } catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id) {
        try{
            $pertanyaan = Pertanyaan::find($id);
            return view('pages.pertanyaan.edit', compact('pertanyaan'));
        } catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $pertanyaan = Pertanyaan::find($id);
            $pertanyaan->update([
                'judul' => $request->judul,
                'isi' => $request->isi
            ]);
            return redirect()->route('pertanyaan.index');
        } catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try {
            Jawaban::where('pertanyaan_id', $id)->delete();
            Pertanyaan::find($id)->delete();
            return redirect()->route('pertanyaan.index');
        } catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
