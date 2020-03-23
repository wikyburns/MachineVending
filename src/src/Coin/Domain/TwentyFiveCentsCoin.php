<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 13:36
 */

namespace App\Coin\Domain;


final class TwentyFiveCentsCoin implements ICoin
{
    public function value(): float
    {
        return CoinTypes::TWENTY_FIVE_CENTS_COIN;
    }
}