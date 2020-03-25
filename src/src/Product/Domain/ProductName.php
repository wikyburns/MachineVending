<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 11:49
 */
declare(strict_types = 1);

namespace App\Product\Domain;


use App\shared\Domain\ValueObjects\StringValueObject;
use DomainException;

final class ProductName extends StringValueObject
{
    private const WATER = 'water';
    private const SODA = 'soda';
    private const JUICE = 'juice';

    public function __construct(string $value)
    {
        parent::__construct(strtolower($value));
        $this->greatherThanTwoCharacters();
        $this->isValidName();
    }

    private function greatherThanTwoCharacters()
    {
        if(strlen($this->value()) < 3)
            throw new DomainException('ProductName must be greather than 2 characters');
    }

    private function isValidName()
    {
       if(!in_array($this->value(), array(self::WATER, self::SODA, self::JUICE)))
           throw new DomainException('ProductName not valid, expected(juice, water, soda)');

    }
}