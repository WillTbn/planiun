<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaries extends Model
{
    use BeneficiariesTrait;
    public $timestamps = false;
    protected $fillable = ['code_id', 'quant_benef', 'data_benef', 'price_total'];

    public function retorneBeneficiaries($request)
    {
        $plans = (int)$request->plans;
        $name = $request->nome;
        $ages = $request->anos;
        // tonando as informação recebidos em um array
        if($this->getNameIdade($name, $ages)){
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
                $beneficiaries = [
                   'code_id' => $plans,
                   'quant_benef' => count($dataArray['nome']),
                   'data_benef' => $data_benef,
                   'price_total' => $soma,
                ];
                $this->setJson(count($dataArray['nome']), $plans,$dataArray);
                
                return response()->json(array('succes' => true,'data'=>$beneficiaries,'url'=> 'http://127.0.0.1:8000/beneficiarios.json'),200);
                
            }
            return response()->json(array('error'=>'Plano Selecionado inexistente'),500);
        }else{
            return response()->json(array('error'=>'Verifique os campos enviados'),500);
        }
        //return 'Plano Selecionado inexistente';        
    }
    public function createBenef($request){
        
        $beneficiaries = $this->create([
            'code_id' => $request->code_id,
            'quant_benef' => $request->quant_benef,
            'data_benef' => json_encode($request->data_benef),
            'price_total' => $request->price_total
        ]);
        if($beneficiaries)
        {
            $this->setJsonProposta($request);
            return response()->json(array('succes' => true,'data'=>$beneficiaries, 'urlProposta'=> 'http://127.0.0.1:8000/proposta.json'),200);
        }else{
            return response()->json(array('error'=>'Verifique os campos enviados'),500);
        }
    }
    public function plans()
    {
        return $this->hasMany(Plans::class);
    }
}
