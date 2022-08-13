<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $favicon;
    public string $github_url;
    public string $portfolio_avatar;
    public string $portfolio_work;
    public string $portfolio_name;
    public string $portfolio_email;
    public string $portfolio_about;


    public static function group(): string
    {
        return 'general';
    }
}
