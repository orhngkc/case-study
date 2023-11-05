<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FetchTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-tasks {--store_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and store task lists from an external source into the database.';

    /**
     * Optional endpoint name.
     *
     * @var string
     */
    private $endpoint;

    /**
     * Data stores
     * Case mantığına pek etki etmediği için hardcoded kullandım.
     */

    const STORES = [
        1 => 'Endpoint1Adapter',
        2 => 'Endpoint2Adapter'
    ];

    const ADAPTER_PATH = '\App\Models\Adapters\\';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            foreach (self::STORES as $storeId => $store) {
                $adapterName = self::ADAPTER_PATH . $store;
                $adapter = new $adapterName();

                $success = $adapter
                    ->fetch()
                    ->save();

                if (!$success) {
                    $this->error($storeId . ' -> An error occurred while saving..');
                    continue;
                }

                $this->info($storeId . ' -> Data fetched and stored successfully.');
            }

            return 1;
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return 0;
        }
    }
}
