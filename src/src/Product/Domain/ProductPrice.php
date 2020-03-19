<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 11:47
 */
declare(strict_types = 1);

namespace App\Product\Domain;

use App\shared\Domain\ValueObjects\FloatValueObject;
use DomainException;

class ProductPrice extends FloatValueObject
{
    public function __construct(float $value)
    {
        parent::__construct($value);
        $this->isPositivePrice();
    }

    private function isPositivePrice(): void
    {
        if($this->value() < 0)
            throw new DomainException('ProductPrice has to be positive value'.$this->value());
    }
}