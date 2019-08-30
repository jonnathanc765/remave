<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class Gold extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Este vendedor ha concretado 50 ventas';

    /**
     * Badge icon
     * 
     * @var string
     */
    protected $icon = 'gold';

    /**
     * Level of Badge
     */
    protected $level = 3;
    /**
     * Check is user qualifies for badge
     *
     * @param $user
     * @return bool
     */
    public function qualifier($user)
    {
        return $user->getPoints() >= 50;
    }
}
