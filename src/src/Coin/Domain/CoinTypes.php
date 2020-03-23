<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 13:32
 */

namespace App\Coin\Domain;


final class CoinTypes
{
    public const FIVE_CENTS_COIN = 0.05;
    public const TEN_CENTS_COIN = 0.10;
    public const TWENTY_FIVE_CENTS_COIN = 0.25;
    public const ONE_EURO_COIN = 1.00;

    private $coin;

    public function __construct(string $coin)
    {
        $this->coin = (float) $coin;
    }

    public function isFiveCentsCoin(): bool
    {
        return ($this->coin === self::FIVE_CENTS_COIN)? true : false;
    }

    public function isTenCentsCoin(): bool
    {
        return ($this->coin === self::TEN_CENTS_COIN)? true : false;
    }

    public function isTwentyFiveCentsCoin(): bool
    {
        return ($this->coin === self::TWENTY_FIVE_CENTS_COIN)? true : false;
    }

    public function isOneEuroCoin(): bool
    {
        return ($this->coin === self::ONE_EURO_COIN)? true : false;
    }


}