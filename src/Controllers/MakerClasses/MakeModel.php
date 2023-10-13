<?php
namespace Nasermekky\Quickadmin\Controllers\MakerClasses;

use Nasermekky\Quickadmin\Traits\PathsTrait;
use Nasermekky\Quickadmin\Traits\GlobalTrait;
use Nasermekky\Quickadmin\Controllers\Factories\FactoryMaker;

class MakeModel implements FactoryMaker
{
    use PathsTrait;
    use GlobalTrait;
    
    public function make($name)
    {
        if($this->isReservedName($name)){
            return 'The name ' . $name. ' is reserved by PHP.';
        }
        
        $name = $this->qualifyClass($this->getNameInput());

        $path = $this->getPath($name);
        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($name)));


    }
}
