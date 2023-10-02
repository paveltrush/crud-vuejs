<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Vitorccs\LaravelCsv\Concerns\Exportable;
use Vitorccs\LaravelCsv\Concerns\FromQuery;
use Vitorccs\LaravelCsv\Concerns\WithHeadings;

class ProductsExport implements FromQuery, WithHeadings
{
    use Exportable;
    public function query(): Builder
    {
        return Product::query()->select(['title', 'price', 'description']);
    }

    public function headings(): array
    {
        return ['Title', 'Price', 'Description'];
    }
}
