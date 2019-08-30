<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class BlackPremium extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Este vendedor ha concretado 1000 ventas';

    /**
     * Badge icon
     * 
     * @var string
     */
    protected $icon = 'black-premium';
    
    /**
     * Level of Badge
     */
    protected $level = 6;

    /**
     * Check is user qualifies for badge
     *
     * @param $user
     * @return bool
     */
    public function qualifier($user)
    {
        return $user->getPoints() >= 1000;
    }
}
