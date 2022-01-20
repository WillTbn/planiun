<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaries extends Model
{
    use BeneficiariesTrait;
    public $timestamps = false;
    protected $fillable = ['code_id', 'quant_benef', 'data_benef', 'price_total'];

    public function createBeneficiaries($request)
    {
        $plans = (int)$request->plans;
        $name = $request->nome;
        $ages = $request->anos;
        // tonando as informação recebidos em um array
        $dataArray = [];
        $dataArray = array_merge($dataArray, $this->getNameIdade($name, $ages));
        $data_benef=[];
        
        //return $dataArray;
        $getPlans = Plans::find($plans);
        // verificando o plano selecionado
        if($getPlans){
            if($plans == 1){
                //contando a quantages de itens no array(benificiarios)
                if(count( $dataArray['nome']) < 4){
                    $minimum = Prices::where('code_id', $plans)->where('minimum_lives', 1)->first();
                    $dataArray['price'] = $this->setPrice($dataArray['ages'],$minimum);
                   
                    $data_benef = array_merge($this->setDataBenef($dataArray));
                    $soma = collect($data_benef)->sum('price');
                   
                }else{
                    $minimum = Prices::where('code_id', $plans)->where('minimum_lives', 4)->first();
                    $dataArray['price'] = $this->setPrice($dataArray['ages'],$minimum);
                   
                    $data_benef = array_merge($this->setDataBenef($dataArray));
                    $soma = collect($data_benef)->sum('price');
                    
                }
            }else if($plans == 6){
                if(count( $dataArray['nome']) < 2){
                    $minimum = Prices::where('code_id', $plans)->where('minimum_lives', 1)->first();
                    $dataArray['price'] = $this->setPrice($dataArray['ages'],$minimum);
                   
                    $data_benef = array_merge($this->setDataBenef($dataArray));
                    $soma = collect($data_benef)->sum('price');
                    
                }else{
                    $minimum = Prices::where('code_id', $plans)->where('minimum_lives', 2)->first();
                    $dataArray['price'] = $this->setPrice($dataArray['ages'],$minimum);
                   
                    $data_benef = array_merge($this->setDataBenef($dataArray));
                    $soma = collect($data_benef)->sum('price');
                }
            }else{
                $minimum = Prices::where('code_id', $plans)->where('minimum_lives', 1)->first();
                $dataArray['price'] = $this->setPrice($dataArray['ages'],$minimum);
                   
                $data_benef = array_merge($this->setDataBenef($dataArray));
                $soma = collect($data_benef)->sum('price');
                
            }
            //return dd(count($dataArray['nome']));
            $beneficiaries = $this->create([
               'code_id' => $plans,
               'quant_benef' => count($dataArray['nome']),
               'data_benef' => json_encode($data_benef),
               'price_total' => $soma
           ]);
           //$beneficiaries->save();
           return response()->json(array('succes' => true,'data'=>$beneficiaries),200);
           //return $beneficiaries; 
        }
        return response()->json(array('error'=>'Plano Selecionado inexistente'),500);
        //return 'Plano Selecionado inexistente';
        
        
    }
    public function plans()
    {
        return $this->hasMany(Plans::class);
    }
}
