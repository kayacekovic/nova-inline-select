<?php

namespace KirschbaumDevelopment\Nova\Http\Controllers;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Nova;

class UpdateController extends Controller
{
    public function updateField(NovaRequest $request, $resourceName, $resourceId)
    {
        $model = Nova::modelInstanceForKey($resourceName)
            ->newQueryWithoutScopes()
            ->findOrFail($resourceId);

        $model->{$request->get('attribute')} = $request->get('value');
        $model->save();

        return response()->json(['success' => true]);
    }
}
