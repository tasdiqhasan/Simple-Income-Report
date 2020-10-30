<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Income;

use App\Http\Requests\StoreIncomeRequest;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
        $data = Income::whereBetween('created_at', [
            now()->startOfYear(),
            now()->endOfYear(),
        ])->get();

        return response()->json([
            'status' => 'ok',
            'message' => 'Get all incomes this year',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        // validate request
        $validated = $request->validate([
            'type' => ['required'],
            'amount' => ['required'],
            'description' => ['nullable']
        ]);

        // save data
        $income = Income::create($validated);

        // return data
        return response()->json([
            'status' => 'ok',
            'message' => 'Successfully create income'
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $income = $this->findIncome($id);

        $validated = $request->validate([
            'type' => ['required'],
            'amount' => ['required'],
            'description' => ['nullable']
        ]);

        $income->type = $validated['type'];
        $income->description = $validated['description'];
        $income->amount = $validated['amount'];
        $income->save();

        return response()->json([
            'status' => 'ok',
            'message' => 'Successfully update income'
        ]);
    }
    
    public function delete(Request $request, $id)
    {
        $income = $this->findIncome($id);
        $income->delete();

        return response()->json([
            'status' => 'ok',
            'message' => 'Successfully delete income'
        ]);
    }

    protected function findIncome($id)
    {
        if(! $income = Income::find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ]);
        }

        return $income;
    }
}
