<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 12:05
 */
declare(strict_types = 1);

namespace App\Product\Domain;


class Product
{

    private $name;
    private $price;
    private $stock;

    public function __construct(ProductName $name, ProductPrice $price, ProductStock $stock)
    {
        $this->name  = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public static function create(ProductName $name, ProductPrice $price, ProductStock $stock): self
    {
        $product = new self($name, $price, $stock);

        // TODO: Create domain event(Product created)

        return $product;
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