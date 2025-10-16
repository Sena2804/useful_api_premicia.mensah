<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    public function index(){
        return Module::all();
    }

    public function activeModule($id){
        try {
            $modules = DB::select('SELECT * FROM user_modules WHERE module_id = ?', [$id]);
            if($modules){
                DB::update('UPDATE user_modules SET active = ? WHERE module_id = ?', [true, $id]);
                return response()->json([
                    'message' => 'Module activated'
                ], 200);
            } else {
                return response()->json([], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

    }

    public function desactivateModule($id){
        try {
            $modules = DB::select('SELECT * FROM user_modules WHERE module_id = ?', [$id]);
            if($modules){
                DB::update('UPDATE user_modules SET active = ? WHERE module_id = ?', [false, $id]);
                return response()->json([
                    'message' => 'Module deactivated'
                ], 200);
            } else {
                return response()->json([], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getOneModule($id){
        try {
            $modules = DB::select('SELECT * FROM user_modules WHERE module_id = ?', [$id])[0];
            if($modules){
                $module = Module::findOrFail($id);
                return response()->json([
                    'module' => $module,
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

    }
}
