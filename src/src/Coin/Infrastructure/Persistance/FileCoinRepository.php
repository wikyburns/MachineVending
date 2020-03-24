<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 16:28
 */

namespace App\Coin\Infrastructure\Persistance;

use App\Coin\Domain\Coin;
use App\Coin\Domain\CoinRepository;
use App\Coin\Domain\CoinValue;

class FileCoinRepository implements CoinRepository
{
    private const FILE_PATH = __DIR__ . '/coin';

    public function findByValue(CoinValue $value): ?Coin
    {
        return file_exists($this->fileName($value->value()))
            ? unserialize(file_get_contents($this->fileName($value->value())))
            : null;
    }

    public function save(Coin $coin): void
    {
        file_put_contents($this->fileName($coin->value()->value()), serialize($coin));
    }

    private function fileName(string $name): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $name);
    }

}