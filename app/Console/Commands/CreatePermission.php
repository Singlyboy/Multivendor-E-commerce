<?php

namespace App\Console\Commands;

use App\Models\Permission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class CreatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:Permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'that are the Permition command for web.php';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $routes =Route::getRoutes();
        foreach($routes as $route)
        {

        if($route->getPrefix()=='/admin')

        {

            Permission::updateorCreate(
                [
    'name'=>str_replace("."," ",$route->getName()),

                ]);
        }

        }

        echo"all permession store successfully.";
    }
}
