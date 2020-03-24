<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 15:56
 */

namespace App\Coin\Domain;

use App\shared\Domain\ValueObjects\FloatValueObject;

class CoinValue extends FloatValueObject
{
    private const FIVE_CENTS = 0.05;
    private const TEN_CENTS = 0.10;
    private const TWENTY_FIVE_CENTS = 0.25;
    private const ONE_EURO = 1;

    public function __construct(float $value)
    {
        parent::__construct($value);
        $this->validateCoin();
    }

    private function validateCoin(): void
    {
        if(!in_array(
            $this->value(),
            array(
                self::FIVE_CENTS,
                self::TEN_CENTS,
                self::TWENTY_FIVE_CENTS,
                self::ONE_EURO)
        ))
            throw new \DomainException('not valid coin value');
    }

}