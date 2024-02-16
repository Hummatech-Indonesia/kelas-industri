<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class CertifyController extends Controller
{
    /**
     * certity
     *
     * @return void
     */
    public function certify(Request $request)
    {
        $img = ImageManager::gd()->read('Java Front.png');
        // use callback to define details
        $text = 'sertifikat'; // Original text
        $text = strtoupper($text);
        $spacedText = implode(' ', str_split($text));
        $img->text($spacedText, 1010, 230, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(100);
            $font->align('center');
            $font->valign('top');
        });

        $text = 'kelas industri'; // Original text
        $text = strtoupper($text);
        $spacedText = implode(' ', str_split($text));
        $img->text($spacedText, 1005, 340, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(38);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('No .', 680, 420, function ($font) {
            $font->file('fonts/merriweather/Merriweather-Regular.ttf');
            $font->size(42);
            $font->align('center');
            $font->valign('top');
        });
        $text = '12202401080001';
        $spacedText = implode('  ', str_split($text));
        $img->text($spacedText, 1045, 415, function ($font) {
            $font->file('fonts/poppins/Poppins-Regular.ttf');
            $font->size(42);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('diberikan kepada :', 995, 495, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Italic.ttf');
            $font->size(40);
            $font->color('77838D');
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Mohammad Arif', 975, 550, function ($font) {
            $font->file('fonts/Pinyon_Script/PinyonScript-Regular.ttf');
            $font->size(140);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Dari SMKN 1 Kepanjen', 1000, 720, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(34);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Atas Kelulusan dalam Pembelajaran Di Kelas Industri', 1020, 797, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Regular.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Pemrograman Fundamental dengan Flutter', 1020, 855, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Malang, 208 Februari 2024', 1020, 915, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Regular.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Verifikasi Sertifikat', 1505, 1195, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(30);
            $font->align('center');
        });
        $img->text('class.hummatech.com/sertifikat/example', 1360, 1250, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Regular.ttf');
            $font->size(30);
            $font->align('center');
        });

        $qrcode = ImageManager::gd()->read('qr.jpg')->resize(130, 130);
        $img->place($qrcode, 'bottom-right', 200, 170);

        // Simpan gambar
        $imgPath = storage_path('app/public/sertifikat/sertifikat.png');
        $img->save($imgPath);

// Return response download
        return response()->download($imgPath, 'sertifikat.png');
    }
}
