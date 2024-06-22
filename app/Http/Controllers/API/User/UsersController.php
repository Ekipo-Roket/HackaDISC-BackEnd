<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Area;
use App\Models\Stat;
use App\Models\Multicompany;

class UsersController extends Controller
{
    public function getAdmins()
    {
        try {
            $admins = User::where('role', 'administrador')->get();
            return response()->json([$admins]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

    }

    public function role($id){
        try{
            $role = Role::find($id);
            return response()->json([$role],200);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getArea($id){
        try{
            $area = Area::find($id);
            return response()->json([$area]);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function getStats(){
        try{
            $stats = Stat::get();
            return response()->json([$stats]);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function getAreaManagers($id)
    {
        $role = Role::where('name_rol', 'Jefe')->first();
        $areaManagers = User::where('role_id', $role->id)->where('company_id', $id)->get();

        foreach($areaManagers as $areaManager){
            $areaManager->area = Area::find($areaManager->area_id)->area_name;
            $areaManager->company_name = Multicompany::find($areaManager->company_id)->main_company_name;
            $areaManager->sub_company_name = Multicompany::find($areaManager->company_id)->sub_company_name;

        }
        return response()->json($areaManagers);
    }
    public function getBusinessManagers()
    {
        $businessManagers = User::where('role', 'Gerente')->get();
        return response()->json($businessManagers);
    }


}
