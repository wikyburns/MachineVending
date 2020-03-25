<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 25/03/2020
 * Time: 12:30
 */

namespace App\Product\Infrastructure\Persistance;


use App\Product\Domain\Product;
use App\Product\Domain\ProductName;
use App\Product\Domain\ProductRepository;

class InMemoryProductRepository implements ProductRepository
{
    /**
     * @var Product[]
     */
    private $products = array();

    public function findByName(ProductName $name): ?Product
    {
        $productFound = null;

        foreach ($this->products as $product) {
            if($product->name()->value() === $name->value()) {
                $productFound = $product;
                break;
            }
        }

        return $productFound;

    }

    public function save(Product $product): void
    {
        array_push($this->products, $product);
    }

}