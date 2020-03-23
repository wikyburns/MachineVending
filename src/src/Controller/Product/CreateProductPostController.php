<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 13:05
 */
declare(strict_types = 1);

namespace App\Controller\Product;


use App\Product\Application\Create\ProductCreator;
use App\Product\Application\Create\ProductCreatorRequest;
use App\Product\Infrastructure\Persistance\FileProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CreateProductPostController
{

    public function __invoke(Request $request)
    {
        $name  = $request->request->get('product');
        $price = $request->request->get('price');
        $stock = $request->request->get('stock');

        $useCase = new ProductCreator(new FileProductRepository());
        $requestDTO = new ProductCreatorRequest($name, $price, $stock);

        $useCase->create(
            $requestDTO
        );

        return new JsonResponse('Product Created', 201);
    }
}