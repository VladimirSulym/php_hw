<?php


class whiteList
{
    public $whiteList =
        [
            'maincontroller' => ['actionindex', 'actioninfo'],
            'secondcontroller' => ['actiontopindex', 'actionmenu'],
            'errorcontroller' => ['action404']
        ];

    public function getWhiteList(): array
    {
        return $this->whiteList;
    }
}