<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 13:33
 */
declare(strict_types = 1);

namespace App\Product\Application\Create;


use App\Product\Domain\ProductName;
use App\Product\Domain\ProductPrice;
use App\Product\Domain\ProductStock;

class ProductCreatorRequest
{
    private $name;
    private $price;
    private $stock;

    public function __construct(string $name, string $price, string $stock)
    {
        $this->name = new ProductName($name);
        $this->price = new ProductPrice((float) $price);
        $this->stock = new ProductStock((int) $stock);
    }

    public function name(): ProductName
    {
        return $this->name;
    }

    public function price(): ProductPrice
    {
        return $this->price;
    }

    public function stock(): ProductStock
    {
        return $this->stock;
    }

}