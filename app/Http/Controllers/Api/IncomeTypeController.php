<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Income;

class IncomeTypeController extends Controller
{
    public function index(Request $request)
    {
        $data = Income::pluck('type', 'type')
                        ->prepend('Choose Option', '');

        return response()->json([
            'status' => 'ok',
            'message' => 'Get available income types',
            'data' => $data
        ]);
    }
}
