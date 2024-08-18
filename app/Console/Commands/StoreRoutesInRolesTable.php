<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class StoreRoutesInRolesTable extends Command
{
    protected $signature = 'store:routes';

    protected $description = 'Store all parent routes in the roles table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $routes = [
            "home",
            "categories",
            "albums",
            "youtube-channel",
            "slider-banners",
            "blog",
            "social-media",
            "success-partners",
            "settings",
            "top-menu",
            "pages",
            "roles",
            "admins",
        ];

        foreach ($routes as $route) {
            // Check if the route has no parameters
            // Store the parent route in the roles table
            Role::updateOrCreate(
                ['name' => $route],
                ['guard_name' => 'web']
            );
        }

        $this->info('Parent routes have been stored in the roles table.');
    }

    private function hasParameters($route)
    {
        // Check if the route's URI contains '{' or '}', which indicates a parameter
        return preg_match('/\{.*?\}/', $route->uri());
    }
}
