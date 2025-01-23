<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Book extends Resource
{
    public static string $model = \App\Models\Book::class;

    public static $title = 'title';

    public static $search = [
        'id', 'title', 'author'
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Title')->sortable()->rules('required', 'max:255'),
            Text::make('Author')->sortable()->rules('required', 'max:255'),
            Textarea::make('Description')->nullable(),
            Number::make('Price')->rules('required', 'numeric'),
            Number::make('Stock')->rules('required', 'integer'),
            Date::make('Published At')->nullable(),
            BelongsToMany::make('Categories'),
        ];
    }
}
