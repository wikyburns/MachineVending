<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 13:34
 */

namespace App\Coin\Domain;


final class FiveCentsCoin implements ICoin
{

    public function value(): float
    {
        return CoinTypes::FIVE_CENTS_COIN;
    }
}