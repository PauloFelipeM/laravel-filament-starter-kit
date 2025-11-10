<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class ManageGeneralSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = GeneralSettings::class;

    public function getHeading(): string|Htmlable
    {
        return __('General');
    }

    public static function getNavigationLabel(): string
    {
        return __('General');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Settings');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Grid::make(1)
                                    ->columnSpan(1)
                                    ->schema([
                                        FileUpload::make('site_logo')
                                            ->label(__('Site logo'))
                                            ->image()
                                            ->columnSpan(1)
                                            ->disk(config('filesystems.default'))
                                            ->visibility('public')
                                            ->maxSize(config('system.max_file_size')),

                                        FileUpload::make('site_dark_logo')
                                            ->label(__('Site dark logo'))
                                            ->image()
                                            ->columnSpan(1)
                                            ->disk(config('filesystems.default'))
                                            ->visibility('public')
                                            ->maxSize(config('system.max_file_size')),
                                    ]),

                                Grid::make(1)
                                    ->columnSpan(2)
                                    ->schema([
                                        TextInput::make('site_name')
                                            ->label(__('Site name'))
                                            ->helperText(__('This is the platform name'))
                                            ->default(fn() => config('app.name'))
                                            ->required(),

                                        Toggle::make('site_active')
                                            ->label(__('Enable site?'))
                                            ->helperText(__('If enabled, the site will be visible to the public.')),

                                        Toggle::make('enable_registration')
                                            ->label(__('Enable registration?'))
                                            ->helperText(__('If enabled, any user can create an account in this platform.')),

                                        Toggle::make('enable_social_login')
                                            ->label(__('Enable social login?'))
                                            ->helperText(__('If enabled, configured users can login via their social accounts.')),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
