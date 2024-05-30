<?php

namespace App\Contracts\Interfaces\Eloquent;

/**
 * Class LatestQueryInterface
 *
 * @package App\Contracts\Interfaces\Eloquent
 */
interface LatestQueryInterface
{
    /**
     * @return mixed
     */
    public function latest(int $limit = 10 , array $args = []);
}
