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

final class ProductCreatorRequest
{
    private $name;
    private $price;
    private $stock;

    public function __construct(string $name, float $price, int $stock)
    {
        $this->name = new ProductName($name);
        $this->price = new ProductPrice($price);
        $this->stock = new ProductStock($stock);
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