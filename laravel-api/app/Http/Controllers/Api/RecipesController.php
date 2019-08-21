<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RecipesController extends Controller
{
    public function recipesList()
    {
        $recipes = DB::table('recipes')->get()->toArray();
        $recipes = response()->json($recipes, 200, [], JSON_UNESCAPED_UNICODE);
//        $array = json_encode(new ArrayValueController($recipes), JSON_PRETTY_PRINT);
        return ($recipes);
    }

    public function getRecipesByType($id)
    {
        $recipeQuery = DB::table('recipes');
        $typeIds = DB::table('recipes')->get('type')->toArray();
        $newArray = [];
        foreach ($typeIds as $ids) {
            $newArray[] = $ids->type;
        }
        if (in_array($id, $newArray)) {
            $recipeQuery = $recipeQuery->where('type', '=', $id)->get()->toArray();
        } else {
            $recipeQuery = $recipeQuery->where('id', '=', $id)->get()->toArray();
        }
        return response()->json($recipeQuery, 200, [], JSON_UNESCAPED_UNICODE);

    }
}
