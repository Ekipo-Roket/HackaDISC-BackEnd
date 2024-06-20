<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
    public function getAreaManagers()
    {
        $areaManagers = User::where('role', 'Jefe')->get();
        return response()->json([$areaManagers]);
    }
    public function getBusinessManagers()
    {
        $businessManagers = User::where('role', 'Gerente')->get();
        return response()->json([$businessManagers]);
    }
}
