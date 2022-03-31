<?php

namespace Hubertnnn\LaravelNova\Fields\DynamicSelect\Http\Controllers;

use Hubertnnn\LaravelNova\Fields\DynamicSelect\DynamicSelect;
use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NovaRequest;

class UpdateController extends Controller
{
    public function updateField(NovaRequest $request, $resourceId)
    {
        $request->findModelOrFail($resourceId)->update([
            $request->get('attribute') => $request->get('value'),
        ]);

        return response()->json(['success' => true]);
    }
}
