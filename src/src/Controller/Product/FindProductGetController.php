<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 13:49
 */

namespace App\Controller\Product;


use App\Product\Application\Find\ProductFinder;
use App\Product\Domain\ProductName;
use App\Product\Infrastructure\Persistance\FileProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FindProductGetController
{
    public function __invoke(Request $request)
    {
        $name = $request->query->get('name');

        $useCase = new ProductFinder(new FileProductRepository());

        $product = $useCase->find(
            new ProductName((string) $name)
        );



        return new JsonResponse(
            array(
                'name' => $product->name()->value(),
                'price' => $product->price()->value(),
                'stock' => $product->stock()->value()
            )
        );
    }

}