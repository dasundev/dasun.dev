<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\Documentation;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class DocumentationRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $parts = explode('/', $request->path());

        $package = $parts[1];

        if (count($parts) === 2) {
            $documentation = app(Documentation::class);

            $page = $documentation->getFirstPage($package);

            return redirect()->route('docs', ['slug' => $page->slug]);
        }

        $request = $request->merge(['package' => $package]);

        return $next($request);
    }
}
