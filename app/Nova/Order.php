<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Order extends Resource
{
    public static $model = \App\Models\Order::class;

    public static $title = 'id';

    public static $search = [
        'id'
    ];

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Book'),
            BelongsTo::make('Category'),
            Number::make('Quantity')->rules('required', 'integer'),
            Number::make('Total Price')->rules('required', 'numeric'),
        ];
    }
}
