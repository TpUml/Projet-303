<?php

namespace AeroGest\VolBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AeroGestVolBundle extends Bundle
{
    public function getParent() {
        return "FOSUserBundle";
    }
}
