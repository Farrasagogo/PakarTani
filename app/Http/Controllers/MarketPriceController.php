<?php
namespace App\Http\Controllers;

use App\Models\MarketPrice;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MarketPriceController extends Controller
{
    public function index()
    {
        try {
            $marketPrices = MarketPrice::all();
            return response()->json($marketPrices);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve market prices', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $marketPrice = MarketPrice::findOrFail($id);
            return response()->json($marketPrice);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Product not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve the product', 'error' => $e->getMessage()], 500);
        }
    }
}
