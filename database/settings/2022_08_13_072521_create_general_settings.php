<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Folio');
        $this->migrator->add('general.favicon', 'favicon.png');
        $this->migrator->add('general.github_url', 'nsavchin');
        $this->migrator->add('general.portfolio_avatar', 'avatar.jpg');
        $this->migrator->add('general.portfolio_work', 'PHP Developer');
        $this->migrator->add('general.portfolio_name', 'Nikolai Savchin');
        $this->migrator->add('general.portfolio_email', 'nsavchin@proton.me');
        $this->migrator->add('general.portfolio_about', 'Hello! My name is Nikolai. I have been developing sites in the PHP programming language for over a year, and I also work with the Laravel framework for it.');
    }
}
