<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 13:35
 */

namespace App\Coin\Domain;


final class TenCentsCoin implements ICoin
{
    public function value(): float
    {
        return CoinTypes::TEN_CENTS_COIN;
    }
}