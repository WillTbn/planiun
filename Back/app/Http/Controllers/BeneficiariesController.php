<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaries;
use Illuminate\Http\Request;

class beneficiariesController extends Controller
{
    public function retornContract(Request $request, Beneficiaries $beneficiaries)
    {   
        return $beneficiaries->retorneBeneficiaries($request);
    }
    public function create(Request $request, Beneficiaries $beneficiaries)
    {
        return $beneficiaries->createBenef($request);
        //return $request->all();        
    }
}
