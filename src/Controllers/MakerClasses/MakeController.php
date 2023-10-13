<?php
namespace Nasermekky\Quickadmin\Controllers\MakerClasses;

use Nasermekky\Quickadmin\Traits\PathsTrait;
use Nasermekky\Quickadmin\Traits\GlobalTrait;
use App\Http\Controllers\Factories\FactoryMaker;

class MakeController implements FactoryMaker
{
    use PathsTrait;
    use GlobalTrait;
    
    public function make($name)
    {
        //
    }
}
