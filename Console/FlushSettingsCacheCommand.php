<?php

namespace Modules\Settings\Console;

use Illuminate\Console\Command;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Modules\Settings\Entities\Setting;

class FlushSettingsCacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:flush';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush settings cache';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle(): void
    {
        $config = '';
        Setting::all()
            ->each(function ($item) use (&$config) {
                $config .= ' "' . $item->key . '" => "' . $item->value . '",' . "\n";
            })
            ->toArray();

        File::put(
            config_path('custom.php'),
            '<?php return [' . "\n" . $config . '];'
        );

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        Cache::forget('settings');
    }

}
