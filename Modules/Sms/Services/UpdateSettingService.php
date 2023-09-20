<?php

namespace Modules\Sms\Services;

use Modules\Sms\Dto\SettingDto;
use Modules\Sms\Entities\Setting;

class UpdateSettingService
{

    public function handle(SettingDto $dto)
    {
        setting()->update([
            'username' => $dto->getUsername(),
            'password' => $dto->getPassword(),
            'sender' => $dto->getSender(),
            'default' => $dto->getDefault(),
        ]);
        return redirect()->route('sms::get.setting');
    }
}
