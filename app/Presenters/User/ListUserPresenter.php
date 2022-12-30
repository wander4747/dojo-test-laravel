<?php

namespace App\Presenters\User;

use App\Presenters\PresenterJson;

class ListUserPresenter
{
    use PresenterJson;

    public function __construct(
        protected object $object
    )
    {
    }
}
