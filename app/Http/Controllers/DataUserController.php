<?php

namespace App\Http\Controllers;

use App\Imports\DataUsersImport;
use App\Models\DataUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;

class DataUserController extends Controller
{
    public function index(){
        $data = DataUser::all();
        $nops = DataUser::uniqueNops()->get();

        return view('home', compact('data', 'nops'));

    }
    // public function generatepdf(){
    //     $data = User::all();
    //     $pdf = Pdf::loadView('pages.user', ['data'=>$data]);

    //     return view('pages.user', ['data'=>$data]);
    // }
    public function import(Request $request){
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);



        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file

        $path = $file->storeAs('public/excel/',$nama_file);

        $import = Excel::import(new DataUsersImport, storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('home')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('home')->with(['error' => 'Data Gagal Diimport!']);
        }
    }

    public function getDataByNop(Request $request)
    {
        $nop = $request->input('nop');

        // Ambil data berdasarkan NOP yang dipilih
        $data = DataUser::where('nop', $nop)->get();

        // Kembalikan data dalam bentuk JSON
        return response()->json($data);
    }
}
