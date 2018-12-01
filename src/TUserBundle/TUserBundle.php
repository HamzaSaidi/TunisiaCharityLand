<?php

namespace TUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
