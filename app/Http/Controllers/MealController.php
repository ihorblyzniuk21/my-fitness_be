<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealResource;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MealController extends Controller
{
    public function index(Request $request)
    {
        try {
            $meals = $request->user()->meals()->get();

            return response()->json($meals);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Could not get products.',
                'exception' => $ex->getMessage()
            ], 500);
        }

    }

    public function store(Request $request)
    {
        try {
            return $request->user()->meals()->create($request->all());
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Could not set products.',
                'exception' => $ex->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
//            $meal = Meal::find($id);
//            dd($meal);
//            $meal->delete();
            return Meal::destroy($id);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Could not delete product.',
                'exception' => $ex->getMessage()
            ], 500);
        }
    }
}
