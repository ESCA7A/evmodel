<?php

namespace Event\Model\Controllers;

use Bitrix\Main\Engine\Controller;

class EventModelController extends Controller
{
    public function firstAction()
    {
        dd(__METHOD__);
    }

    public function secondAction()
    {
        dd(__METHOD__);
    }

    protected function getDefaultPreFilters()
    {
        return [];
    }
}