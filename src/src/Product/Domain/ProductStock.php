<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 11:50
 */
declare(strict_types = 1);

namespace App\Product\Domain;

use App\shared\Domain\ValueObjects\IntValueObject;
use DomainException;

class ProductStock extends IntValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);
        $this->isPositiveNumber();
    }

    private function isPositiveNumber(): void
    {
        if($this->value() < 0)
            throw new DomainException('ProductStock has to be positive');
    }

}