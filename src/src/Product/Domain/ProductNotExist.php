<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 11:46
 */

namespace App\Product\Domain;


use App\shared\Domain\DomainError;

class ProductNotExist extends DomainError
{
    private $name;

    public function __construct(ProductName $name)
    {
        $this->name = $name;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'product_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The product <%s> does not exist', $this->name->value());
    }
}