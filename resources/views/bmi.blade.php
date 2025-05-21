<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hitung BMI</title>
</head>
<body>
    <h1>Hitung BMI</h1>

    <form method="POST" action="{{ route('bmi.calculate') }}">
        @csrf

        <label for="weight">Berat Badan (kg):</label><br>
        <input type="number" step="0.1" name="weight" id="weight" value="{{ old('weight', $weight ?? '') }}" required><br><br>

        <label for="height">Tinggi Badan (cm):</label><br>
        <input type="number" step="0.1" name="height" id="height" value="{{ old('height', $height ?? '') }}" required><br><br>

        <button type="submit">Hitung BMI</button>
    </form>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div style="color: red; margin-top: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tampilkan hasil BMI dan kategori kalau ada --}}
    @isset($bmi)
        <h2>Hasil BMI</h2>
        <p>BMI Anda: <strong>{{ $bmi }}</strong></p>
        <p>Kategori: <strong>{{ $category }}</strong></p>
    @endisset

</body>
</html>
