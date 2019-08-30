<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class Black extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Este vendedor ha concretado 300 ventas';

    /**
     * Badge icon
     * 
     * @var string
     */
    protected $icon = 'black';
    
    /**
     * Level of Badge
     */
    protected $level = 5;

    /**
     * Check is user qualifies for badge
     *
     * @param $user
     * @return bool
     */
    public function qualifier($user)
    {
        return $user->getPoints() >= 300;
    }
}
