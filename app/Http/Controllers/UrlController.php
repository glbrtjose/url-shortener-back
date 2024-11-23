<?php

namespace App\Http\Controllers\API;

namespace App\Http\Controllers;

use App\Models\Url;
use Hidehalo\Nanoid\Client;

class UrlController extends Controller
{
    public function index()
    {
        $entities = Url::orderBy('created_at', 'desc')->get();
        return response()->json($entities);
    }

    public function create()
    {
        $client = new Client();
        $id = $client->generateId($size = 4);
        $url = request('url');
        $item = new Url;
        $item->url = $url;
        $item->short_url = 'n.t/'.$id;
        $item->save();
        return response()->json($item);
    }

    public function remove()
    {
        $id = request('id');
        $item = Url::find($id);
        $item->delete();
        return response()->json($item);
    }

    public function show($id)
    {
        $item = Url::find($id);
        return response()->json($item);
    }
}
