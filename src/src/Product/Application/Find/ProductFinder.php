<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 13:48
 */

namespace App\Product\Application\Find;


use App\Product\Domain\Product;
use App\Product\Domain\ProductName;
use App\Product\Domain\ProductNotExist;
use App\Product\Domain\ProductRepository;

final class ProductFinder
{

    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function find(ProductName $name): ?Product
    {
        $product = $this->repository->findByName($name);

        if (null === $product) {
            throw new ProductNotExist($name);
        }

        return $product;
    }


}