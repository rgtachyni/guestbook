<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{

    public function index()
    {
        $data = Guest::all(); //mengambil semua data dari tabel guest
        return view('index', compact('data'));
    }

    public function admin(){
        return view('admin');
    }

    public function showForm()
    {
        return view('form'); //untuk tampilkan form
    }

    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'whatshapp' => 'required|string|max:13',
            'email' => 'required|string',
            'organization' => 'required|string',
            'purpose' => 'required|string',
            'ttd' => 'required|string',

        ]);

        //ubah Base64 string jdi gmbr dan smpn
        $signatureData = $request->input('ttd');
        // dd($signatureData);    
        $image = str_replace('data:image/png;base64,', '', $signatureData);
        $image = str_replace(' ', '+', $image);
        // dd($image);

        $decodedImage = base64_decode($image);
        // Periksa apakah hasil decoding berhasil
        if ($decodedImage === false) {
            return response()->json(['error' => 'Invalid base64 image data'], 400);
        }
        $imageName = 'signature_' . time() . '.png';
        // Storage::disk('public')->put('signatures/' . $imageName, $decodedImage);
        //simpan gmbr ke direktori storage/public/ttd
        Storage::disk('public')->put('signatures/' . $imageName,  base64_decode($image));

        // dd(Storage::url('signatures/' . $imageName));


        //simpan data ke database
        Guest::create([
            'name' => $request->name,
            'address' => $request->address,
            'whatshapp' => $request->whatshapp,
            'email' => $request->email,
            'organization' => $request->organization,
            'purpose' => $request->purpose,
            'ttd' => $imageName, // Simpan nama file ttd
        ]);

        //redirect
        return redirect('/')->with('success', 'Data berhasil ditambahkan!');
    }
}
