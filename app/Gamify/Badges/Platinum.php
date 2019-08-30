<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class Platinum extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Este vendedor ha concretado 100 ventas';

    /**
     * Badge icon
     * 
     * @var string
     */
    protected $icon = 'platinum';
    
    /**
     * Level of Badge
     */
    protected $level = 4;

    /**
     * Check is user qualifies for badge
     *
     * @param $user
     * @return bool
     */
    public function qualifier($user)
    {
        return $user->getPoints() >= 100;
    }
}
