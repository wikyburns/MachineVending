<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 19/03/2020
 * Time: 12:43
 */
declare(strict_types = 1);

namespace App\Product\Infrastructure\Persistance;

use App\Product\Domain\Product;
use App\Product\Domain\ProductName;
use App\Product\Domain\ProductRepository;

final class FileProductRepository implements ProductRepository
{
    private const FILE_PATH = __DIR__ . '/products';

    public function findByName(ProductName $name): ?Product
    {
        return file_exists($this->fileName($name->value()))
            ? unserialize(file_get_contents($this->fileName($name->value())))
            : null;
    }

    public function save(Product $product): void
    {
        file_put_contents($this->fileName($product->name()->value()), serialize($product));
    }

    private function fileName(string $name): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $name);
    }

}