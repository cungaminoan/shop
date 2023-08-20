<?php
namespace App\Slug\Facade;
use Illuminate\Support\Facades;

class SlugFacade extends Facades\Facade{
    protected static function getFacadeAccessor()
    {
        return "slug";
    }
}
