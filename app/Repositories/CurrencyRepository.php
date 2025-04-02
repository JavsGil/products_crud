<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Repositories\Interfaces\CurrencyRepositoryInterface;

class CurrencyRepository implements CurrencyRepositoryInterface {

    public function create(array $data) {
        return Currency::create($data);
    }
    
    public function getAll() {
        return Currency::all();
    }

    public function getById(int $id) {
        return Currency::findOrFail($id);
    }
}
