<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 13:40
 */

namespace App\Coin\Domain;


final class CoinFactory
{
    public function create(string $coin)
    {
        $coinType = new CoinTypes($coin);

        if($coinType->isFiveCentsCoin()) return new FiveCentsCoin();
        if($coinType->isTenCentsCoin()) return new TenCentsCoin();
        if($coinType->isTwentyFiveCentsCoin()) return new TwentyFiveCentsCoin();
        if($coinType->isOneEuroCoin()) return new OneEuroCoin();

        return new NotValidCoinException($coin);
    }
}