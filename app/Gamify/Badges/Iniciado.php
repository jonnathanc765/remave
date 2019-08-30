<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class Iniciado extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Este vendedor tiene menos de 10 ventas concretadas';

    /**
     * Badge icon
     * 
     * @var string
     */
    protected $icon = 'iniciado';

    /**
     * Level of Badge
     */
    protected $level = 1;

    /**
     * Check is user qualifies for badge
     *
     * @param $user
     * @return bool
     */
    public function qualifier($user)
    {
        return true;
    }
}
