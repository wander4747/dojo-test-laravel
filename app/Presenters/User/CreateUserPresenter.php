<?php

namespace App\Presenters\User;

use App\Presenters\PresenterJson;

class CreateUserPresenter
{
    use PresenterJson;

    public function __construct(
        protected object $object
    )
    {
    }
}
