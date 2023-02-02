<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;

class EmployeeController extends Controller
{
    public function create()
    {
        return view('newEmployee');
    }

    public function createNewEmployee()
    {
        $inputs = Request::all();
        $inputs['api_token'] = hash('sha256', \Str::random(60));
        if (isset($inputs['user_name']) && isset($inputs['first_name']) && isset($inputs['last_name'])) {
            if (User::where('user_name', $inputs['user_name'])->first()) {
                return ['code' => 'error', 'msg' => 'User Name already exist'];
            }
            return ['code' => 'success', 'data' => User::create($inputs)];
        }
        return ['code' => 'error', 'msg' => 'All fields are Required!'];
    }
}
