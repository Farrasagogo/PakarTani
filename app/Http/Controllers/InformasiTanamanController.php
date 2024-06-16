<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiTanaman;
use Exception;

class InformasiTanamanController extends Controller
{
    public function index()
    {
        try {
            $tanamans = InformasiTanaman::all();
            return response()->json($tanamans);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrieve plants information, please try again.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $tanaman = InformasiTanaman::find($id);

            if (!$tanaman) {
                return response()->json(['error' => 'Plant information not found'], 404);
            }

            return response()->json($tanaman);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrieve plant information, please try again.'], 500);
        }
    }
}
