<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 16:33
 */

namespace App\Coin\Domain;


use App\shared\Domain\DomainError;

final class CoinNotExist extends DomainError
{
    private $value;

    public function __construct(CoinValue $value)
    {
        $this->value = $value;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'coin_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The coin <%s> does not exist', $this->value->value());
    }

}