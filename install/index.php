<?php

class event_model extends CModule
{
    public function __construct()
    {
        $this->MODULE_ID            = 'event.model';
        $this->MODULE_NAME          = 'Событийная модель Bitrix';
        $this->MODULE_DESCRIPTION   = 'Работа с событийной моделью в общеобразовательных целях';
        $this->MODULE_GROUP_RIGHTS  = 'N';
        $this->PARTNER_NAME         = 'p.tankov';
        $this->PARTNER_URI          = 'https://gitlab.com/pasha.esca1a';
    }

    public function doInstall(): void
    {
        RegisterModule($this->MODULE_ID);
    }

    public function doUninstall(): void
    {
        UnRegisterModule($this->MODULE_ID);
    }
}