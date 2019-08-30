<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class Plus extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Este vendedor ha concretado 10 ventas';

    /**
     * Badge icon
     * 
     * @var string
     */
    protected $icon = 'plus';
    
    /**
     * Level of Badge
     */
    protected $level = 2;

    /**
     * Check is user qualifies for badge
     *
     * @param $user
     * @return bool
     */
    public function qualifier($user)
    {
        return $user->getPoints() >= 10;
    }
}
