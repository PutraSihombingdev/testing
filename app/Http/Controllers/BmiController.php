<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiController extends Controller
{
    // Tampilkan halaman form input BMI
    public function index()
    {
        return view('bmi');
    }

    // Proses perhitungan BMI dari input user
    public function calculate(Request $request)
    {
        // Validasi input: berat dan tinggi harus angka dan minimal 1
        $request->validate([
            'weight' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
        ]);

        // Ambil data input
        $weight = $request->input('weight'); // berat dalam kg
        $height = $request->input('height'); // tinggi dalam cm

        // Hitung BMI: berat / (tinggi dalam meter)^2
        $heightInMeters = $height / 100;
        $bmi = $weight / ($heightInMeters * $heightInMeters);
        $bmi = round($bmi, 1); // pembulatan 1 angka desimal

        // Tentukan kategori BMI
        if ($bmi < 18.5) {
            $category = "Kurus";
        } elseif ($bmi < 24.9) {
            $category = "Normal";
        } elseif ($bmi < 29.9) {
            $category = "Overweight";
        } else {
            $category = "Obesitas";
        }

        // Kirim data ke view untuk ditampilkan
        return view('bmi', compact('weight', 'height', 'bmi', 'category'));
    }
}
