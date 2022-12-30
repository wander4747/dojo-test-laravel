<?php

namespace App\Presenters;

trait PresenterJson
{
    public function toJson()
    {
        return collect($this->object)
            ->mapWithKeys(function ($value, $key) {
                $key = trim(strtolower(preg_replace('/[A-Z]/', '_$0', $key )));

                return [
                    $key => $value
                ];
            });
    }
}
