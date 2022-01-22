<?php
namespace App\Models;
trait BeneficiariesTrait
{
    public function getNameIdade($name, $ages)
    {
        $arrayName = explode(',',$name);
        $arrayAges = explode(',',$ages);
        if(count($arrayName) == count($arrayAges)) {
            return [
                'nome' => $arrayName,
                'ages' => $arrayAges
            ];
        }else{
            return false;
        }
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
            $item[$i] =[
                'name'=> $dataArray['nome'][$i],
                'ages' => $dataArray['ages'][$i],
                'price' =>$dataArray['price'][$i]
            ];
            $i++;
        }
        return $item;
    }
    public function setJson($quantidade, $registro, $dataArray)
    {   
        $dadosJson = [
            'quantidade' => count($dataArray['nome']),
            'idade' => $dataArray['ages'],
            'nome' =>  $dataArray['nome'],
            'registro' => $registro,
        ];
        file_put_contents('beneficiarios.json', json_encode($dadosJson));
    }
    public function setJsonProposta($dados)
    {
        $json = [
            'registro' => $dados->code_id,
            'quantidade' => $dados->quant_benef,
            'dados' => $dados->data_benef,
            'preco_total' => $dados->price_total
        ];
        file_put_contents('proposta.json', json_encode($json));
    }
}