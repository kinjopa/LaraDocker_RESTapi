<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiUserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function getUsers()
    {
        $users = User::paginate(10);
        if(!empty($users)){
            return ApiUserResource::collection($users->all());
        }
        return response()->json(['message' => 'Пользователи не найдены'], 404);
    }
}
