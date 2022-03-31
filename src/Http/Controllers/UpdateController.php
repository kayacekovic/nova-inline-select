<?php

namespace KirschbaumDevelopment\Nova\Http\Controllers;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Nova;

class UpdateController extends Controller
{
    public function updateField(NovaRequest $request, $resourceName, $resourceId)
    {
        Nova::modelInstanceForKey($resourceName)
            ->newQueryWithoutScopes()
            ->where('id', $resourceId)
            ->update([
                $request->get('attribute') => $request->get('value'),
            ]);

        return response()->json(['success' => true]);
    }
}
