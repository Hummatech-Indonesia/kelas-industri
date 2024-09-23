<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Material;
use App\Models\Assignment;
use App\Models\SubMaterial;
use Illuminate\Http\Request;
use App\Models\SubMaterialExam;
use App\Models\SubmitAssignment;
use App\Models\StudentSubmaterialExam;
use App\Helpers\CheckComplementionSubmaterial;

class CheckCompletionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $submaterial = $request->submaterial;
        $prevSubmaterial = SubMaterial::whereRelation('material', 'id', $submaterial->material->id)->where('order', '<', $submaterial->order)->first();

        // dd(CheckComplementionSubmaterial::checkComplemention(auth()->user(), $prevSubmaterial));
        if ($prevSubmaterial) {
            if (CheckComplementionSubmaterial::checkComplemention(auth()->user(), $prevSubmaterial)) return $next($request);
            return response()->view('errors.uncompleteSubmaterial');
        } else {
            return $next($request);
        }
    }
}
