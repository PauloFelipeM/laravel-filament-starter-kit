<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', config('app.name'));
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.site_logo');
        $this->migrator->add('general.site_dark_logo');
        $this->migrator->add('general.enable_registration', true);
        $this->migrator->add('general.enable_social_login', true);
    }
};
