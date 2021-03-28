<?php
namespace core\repositories;

use core\entities\Favorite;

class FavoriteRepository
{
    public function save(Favorite $favorite) : void
    {
        if (!$favorite->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }
}