<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\DietType;
use App\Models\Diagnosis;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'diseases' => Disease::count(),
            'diets' => DietType::count(),
            'diagnoses' => Diagnosis::count(),
            'users' => User::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }
}
