<?php
namespace App\Services;

class ExchangeService{

    public function getRate(){
        $endpoint = 'live';
        $access_key = 'd246c336b1b3e5b25ee184cc9fdf9c51';

        $ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        curl_close($ch);

        $exchangeRates = json_decode($json, true);

        return $exchangeRates;
    }

    public function getUsdToJpyRate(){

        $Rates = $this->getRate();
        $jpyRate = $Rates['quotes']['USDJPY'];

        return $jpyRate;
    }

    public function getUsdToCadRate(){

        $Rates = $this->getRate();
        $cadRate = $Rates['quotes']['USDCAD'];

        return $cadRate;
    }

    public function getUsd($createUsd){

        if ($createUsd < 0) {
            return 0;
        }elseif (preg_match('/\d+(\.\d\d\d+)/', $createUsd)) {
            return 0;
        }

        return $createUsd;
    }

    public function convertUsdToJpy($jpyRate, $cadRate, $usd)
//    :array
    {
        $exchangeResult = $jpyRate * $usd;

        return $exchangeResult;
    }
}