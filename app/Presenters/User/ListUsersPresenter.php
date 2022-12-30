<?php

namespace App\Presenters\User;

class ListUsersPresenter
{
    public function json($object)
    {
        $data = (array)$object;

        $users = array_map(function($obj){
            unset($obj['email_verified_at'], $obj['updated_at'], $obj['deleted_at']);
            return $obj;
        }, $data['items']);

        unset($data['items']);
        $data['data'] = $users;

        ksort($data);
        return $data;
    }
}
