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

final class CreateProductPostController
{

    public function __invoke(Request $request)
    {
        $name  = $request->request->get('product');
        $price = $request->request->get('price');
        $stock = $request->request->get('stock');

        // TODO: Check what's happening with the variables types(Working fine in CoinPostController)

        $requestDTO = new ProductCreatorRequest($name, (float) $price, (int) $stock);

        $useCase = new ProductCreator(new FileProductRepository());


        $useCase->create(
            $requestDTO
        );

        return new JsonResponse('Product Created', 201);
    }
}