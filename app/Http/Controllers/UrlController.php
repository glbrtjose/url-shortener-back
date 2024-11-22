<?php
namespace App\Http\Controllers\API;
namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index()
    {
        $items = Url::all();
        return response()->json($items);
    }

    public function show($id)
    {
        $item = Url::find($id);
        return response()->json($item);
    }
}
