<?php


class whiteList
{
    public $whiteList =
        [
            'maincontroller' => ['actionindex', 'actioninfo'],
            'secondcontroller' => ['actiontopindex', 'actionmenu'],
            'errorcontroller' => ['action404'],
            'restcontroller' => ['actionget', 'actionview', 'actioncreate', 'actionupdate', 'actiondelete', 1, 3, 10]
        ];

    public function getWhiteList(): array
    {
        return $this->whiteList;
    }
}