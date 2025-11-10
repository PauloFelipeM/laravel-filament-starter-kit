<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public bool $site_active;
    public string|null $site_logo;
    public string|null $site_dark_logo;
    public bool $enable_registration;
    public string|null $enable_social_login;

    public static function group(): string
    {
        return 'general';
    }
}
