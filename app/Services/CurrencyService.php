<?php

namespace App\Services;

use App\Repositories\Interfaces\CurrencyRepositoryInterface;

class CurrencyService
{
    protected $currencyRepository;

    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function createCurrency(array $data)
    {
        return $this->currencyRepository->create($data);
    }

    public function getAllCurrencies()
    {
        return $this->currencyRepository->getAll();
    }

    public function getCurrencyById(int $id)
    {
        return $this->currencyRepository->getById($id);
    }
}
