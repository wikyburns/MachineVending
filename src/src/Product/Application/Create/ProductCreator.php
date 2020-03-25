<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 12:55
 */
declare(strict_types = 1);

namespace App\Product\Application\Create;


use App\Product\Domain\Product;
use App\Product\Domain\ProductRepository;

final class ProductCreator
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(ProductCreatorRequest $request)
    {
        $product = Product::create($request->name(), $request->price(), $request->stock());

        $this->repository->save($product);

        // TODO: Publish event
    }

}