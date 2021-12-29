<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Waynestate\Nova\CKEditor;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class Article extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Article::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'description'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),


            Text::make(__('Titolo'), 'title'), 

            Textarea::make(__('Descrizione'), 'description')->alwaysShow()->showOnIndex(),

            // Textarea::make(__('Corpo'), 'body'),


            
            CKEditor::make(__('Corpo'), 'body')->options([
                'height' => 250,
                'toolbar' => [
                    ['Source', 'Format', 'FontSize'],
                    ['Bold', 'Italic', 'Strike', 'Subscript', 'Superscript'],
                    ['NumberedList', 'BulletedList', 'Outdent', 'Indent'],
                    ['JustifyLeft', 'JustifyCenter', 'JustifyRight'],
                    ['Cut','Copy','Paste', 'PasteText', 'PasteFromWord', 'RemoveFormat', 'HorizontalRule'],
                ],
            ])
                    ->alwaysShow()
                    ->hideFromIndex(),

            Boolean::make(__('Pubblicato'), 'published'),


            BelongsTo::make(
                __('Autore'), 
                'createdByUser', 
                User::class
            )
            
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new DownloadExcel)
            ->withHeadings()  //qui posso scegliere come chiamare le intestazioni della tabella da scaricare, iserisco un array.
            ->allFields()
        ];
    }
}
