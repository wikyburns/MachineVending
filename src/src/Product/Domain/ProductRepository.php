<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 12:41
 */
declare(strict_types = 1);

namespace App\Product\Domain;


interface ProductRepository
{
    public function save(Product $product): void;
    public function findByName(ProductName $name): ?Product;
}