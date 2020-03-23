<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 13:37
 */

namespace App\Coin\Domain;


class OneEuroCoin implements ICoin
{
    public function value(): float
    {
        return CoinTypes::ONE_EURO_COIN;
    }
}