<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 11:54
 */

namespace App\Product\Application\Update;


use App\Product\Application\Find\ProductFinder;
use App\Product\Domain\ProductName;
use App\Product\Domain\ProductRepository;
use App\Product\Domain\ProductStock;

final class ProductUpdateStock
{
    private $repository;
    private $finder;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
        $this->finder = new ProductFinder($repository);
    }

    public function update(ProductName $name, ProductStock $stock): void
    {
        $product = $this->finder->find($name);

        $product->updateStock($stock);

        $this->repository->save($product);
    }

}