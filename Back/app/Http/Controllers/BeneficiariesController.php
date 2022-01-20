<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaries;
use Illuminate\Http\Request;

class beneficiariesController extends Controller
{
    public function create(Request $request, Beneficiaries $beneficiaries)
    {   

        return $beneficiaries->createBeneficiaries($request);
        
        
    }
}
