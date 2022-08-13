<?php

use App\Models\GeneralSettings;

function getSetting($key): string{
    return app(GeneralSettings::class)->$key;
}
