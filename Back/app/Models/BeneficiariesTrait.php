<?php
namespace App\Models;
trait BeneficiariesTrait
{
    public function getNameIdade($name, $ages)
    {
        return [
            'nome' => explode(',',$name),
            'ages' => explode(',',$ages)
        ];
    }
    public function setPrice($ages, $minimum)
    {
        $price = [];
        foreach($ages as $item){
            if((int)$item <= 17){
                $price[] = $minimum->range1;
            }else if((int)$item >= 18 && (int)$item <= 40){
                $price[] = $minimum->range2;
            }else if((int)$item >= 41){
                $price[] =  $minimum->range3;
            }
        }
        return $price;
    }
    // Setando os beneficiarios do plano
    public function setDataBenef($dataArray)
    {
        $item=[];
        for($i=0;$i<count($dataArray['nome']);){
            $item[] =[
                'name'=> $dataArray['nome'][$i],
                'ages' => $dataArray['ages'][$i],
                'price' =>$dataArray['price'][$i]
            ];
            $i++;
        }
        return $item;
    }
}