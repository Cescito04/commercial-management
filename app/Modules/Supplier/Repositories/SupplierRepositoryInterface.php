<?php

namespace App\Modules\Supplier\Repositories;

use Illuminate\Database\Eloquent\Model;

interface SupplierRepositoryInterface
{
    public function find($id);
    public function delete($id);
}
