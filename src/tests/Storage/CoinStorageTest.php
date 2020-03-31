<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 25/03/2020
 * Time: 13:22
 */

namespace App\Tests\Storage;


use App\Coin\Application\Create\CoinCreator;
use App\Coin\Application\Create\CoinCreatorRequest;
use App\Coin\Domain\CoinValue;
use App\Coin\Infrastructure\Persistance\InMemoryCoinRepository;
use App\Storage\CoinStorage;
use PHPUnit\Framework\TestCase;

final class CoinStorageTest extends TestCase
{

    private $repository;

    protected function setUp()
    {
        $this->repository = new InMemoryCoinRepository();

        // Create the Coin to find in the tests
        $useCase = new CoinCreator($this->repository);
        $requestDTO = new CoinCreatorRequest('five_cents',0.05, 10);
        $useCase->create($requestDTO);

        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /** @test */
    public function addCoinsToStorage()
    {
        $storage = new CoinStorage($this->repository);

        $storage->addCoins(...array(new CoinValue(0.05)));

        $this->assertNull(NULL);

    }

    /** @test */
    public function addCoinsAndCalculateTotalValue()
    {
        $storage = new CoinStorage($this->repository);

        $storage->addCoins(...array(new CoinValue(0.05), new CoinValue(0.05)));

        $totalValue = $storage->totalValue();

        $this->assertEquals(0.10, $totalValue);
    }

    /** @test */
    public function toArrayCoins()
    {
        $storage = new CoinStorage($this->repository);
        $storage->addCoins(...array(new CoinValue(0.05), new CoinValue(0.05)));

        $coinsArray = $storage->toArrayCoins();

        $this->assertEquals(array(0.05, 0.05), $coinsArray);
    }

}