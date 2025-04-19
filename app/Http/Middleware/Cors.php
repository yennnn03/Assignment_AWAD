// app/Http/Middleware/Cors.php
public function handle($request, Closure $next)
{
    $response = $next($request);
    
    $response->headers->set('Access-Control-Allow-Origin', '*');
    $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
    $response->headers->set('Content-Type', 'application/json');

    return $response;
}