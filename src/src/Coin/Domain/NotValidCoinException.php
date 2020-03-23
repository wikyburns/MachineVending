<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 23/03/2020
 * Time: 13:43
 */

namespace App\Coin\Domain;


use App\shared\Domain\DomainError;

class NotValidCoinException extends DomainError
{
    private $coin;

    public function __construct(string $coin)
    {
        $this->coin = $coin;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'coin_not_valid';
    }

    protected function errorMessage(): string
    {
        return sprintf('Not valid coin <%s>', $this->coin);
    }
}