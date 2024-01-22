<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Userspagesrepo;
Use App\IRepository\UserspagesInterface;
use App\Repository\Adminpagesrepo;
Use App\IRepository\Adminpagesinterface;
use App\Repository\Cartrepo;
Use App\IRepository\Cartinterfaec;
use App\Repository\Livewirenewrequestrepo;
Use App\IRepository\Livewirenewrequestinnterface;
class repoService extends ServiceProvider
{
    
    public function register(): void
    {
        $this->app->bind(
            UserspagesInterface::class,
            Userspagesrepo::class
        );
        $this->app->bind(
            Adminpagesinterface::class,
            Adminpagesrepo::class
        );
        $this->app->bind(
            Cartinterfaec::class,
            Cartrepo::class
        );

        $this->app->bind(
            Livewirenewrequestinnterface::class,
            Livewirenewrequestrepo::class
        );
    }

 
}
