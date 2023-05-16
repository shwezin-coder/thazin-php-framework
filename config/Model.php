<?php 
namespace Thazin\Core;

use Thazin\Core\DB\Entity;

abstract class Model extends Entity{
    abstract public function getDisplayName();
}