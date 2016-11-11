<?php
namespace App\Jobs\Middlewares;

use DB;

class DatabaseTransactionsMiddleware
{
    public function handle($command, $next)
    {
        return DB::transaction(function() use ($command, $next) {
            return $next($command);
        });
    }

}
