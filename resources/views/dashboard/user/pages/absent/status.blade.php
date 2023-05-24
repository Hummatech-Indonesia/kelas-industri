<!DOCTYPE html>
<html>
<head>
    <title>Absen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    @if ($status === 'success')
    <div class="md:w-1/2 lg:w-1/3 w-full bg-white p-8 shadow-lg">
        <h1 class="text-4xl font-bold mb-6 text-green-600">Berhasil</h1>
        <p class="text-lg text-green-400">Berhasil Melakukan Absen Absen</p>
    </div>
    @elseif ($status === 'closed')
        <div class="md:w-1/2 lg:w-1/3 w-full bg-white p-8 shadow-lg">
            <h1 class="text-4xl font-bold mb-6 text-red-600">Gagal!</h1>
            <p class="text-lg text-red-400">Absen Sudah Kadaluarsa!</p>
        </div>
    @elseif ($status === 'have_done')
        <div class="md:w-1/2 lg:w-1/3 w-full bg-white p-8 shadow-lg">
            <h1 class="text-4xl font-bold mb-6 text-yellow-600">Gagal!</h1>
            <p class="text-lg text-yellow-400">Kamu Sudah Absen!</p>
        </div>
    @else
        <h1>Status: Unknown</h1>
        <p>Status tidak dikenali.</p>
    @endif
</body>
</html>
