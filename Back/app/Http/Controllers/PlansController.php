<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function index(Plans $plan)
    {
        $plans = $plan->all();
        return $plans;
    }
}
