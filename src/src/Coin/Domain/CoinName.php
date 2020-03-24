<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 15:56
 */

namespace App\Coin\Domain;

use App\shared\Domain\ValueObjects\StringValueObject;

class CoinName extends StringValueObject
{
    private const FIVE_CENTS = 'five_cents';
    private const TEN_CENTS = 'ten_cents';
    private const TWENTY_FIVE_CENTS = 'twenty_five_cents';
    private const ONE_EURO = 'one_euro';

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->validateName();
    }

    private function validateName(): void
    {
        if(!in_array(
            $this->value(),
            array(
                self::FIVE_CENTS,
                self::TEN_CENTS,
                self::TWENTY_FIVE_CENTS,
                self::ONE_EURO
            )
        ))
            throw new \DomainException('not valid coin name');
    }



}