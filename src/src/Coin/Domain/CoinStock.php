<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 16:22
 */

namespace App\Coin\Domain;


use App\shared\Domain\ValueObjects\IntValueObject;

class CoinStock extends IntValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);
        $this->isPositiveNumber();
    }

    private function isPositiveNumber(): void
    {
        if($this->value() < 0)
            throw new \DomainException('CoinStock has to be positive');
    }

}