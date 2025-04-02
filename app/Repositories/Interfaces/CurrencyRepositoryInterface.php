<?php

namespace App\Repositories\Interfaces;

use App\Models\Currency;

interface CurrencyRepositoryInterface {
    public function create(array $data);
    public function getAll();
    public function getById(int $id);
}
