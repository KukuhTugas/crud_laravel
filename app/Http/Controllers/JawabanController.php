<?php

namespace App\Http\Controllers;

use App\Jawaban;
use App\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JawabanController extends Controller
{
    public function index($id) {
        $pertanyaan = Pertanyaan::find($id);
        $jawaban = Jawaban::where('pertanyaan_id', $id)->get();
        return view('pages.jawaban.index', compact('jawaban', 'pertanyaan'));
    }

    public function create($id) {
        $pertanyaan = Pertanyaan::find($id);
        return view('pages.jawaban.create', compact('pertanyaan'));
    }

    public function store(Request $request, $id) {
        DB::beginTransaction();
        try{
            Jawaban::create([
                'pertanyaan_id' => $id,
                'jawaban' => $request->jawaban
            ]);
            DB::commit();
            return redirect()->route('pertanyaan.index');
        } catch(\Exception $e){
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
