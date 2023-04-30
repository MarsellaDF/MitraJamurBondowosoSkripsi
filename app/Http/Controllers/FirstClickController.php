<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FirstClickModel;
use App\Models\MenuFirstClick;

class FirstClickController extends Controller
{
    public function save(Request $request)
    {
        $new = new FirstClickModel;
        $new->ip = $request->ip();
        $new->id_menu = $request->get('id_menu');
        $new->sumbu_x = $request->get('sumbu_x');
        $new->sumbu_y = $request->get('sumbu_y');
        $new->save();

        return response()->json(['succes' => 'berhasil menambahkan data']);
    }

    public function get()
    {
        $data = FirstClickModel::orderBy('created_at')->get();
        if (!isset($data)) {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'Data tidak ada',
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'Berhasil menambahkan data',
        ],200);
    }
}
