<?php

namespace App\Models\Adapters;

use DB;
use App\Interfaces\DataFetcherInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Endpoint1Adapter implements DataFetcherInterface
{
    public string $_table = 'tasks';
    public string $suffix = 'store1';
    public string $endpoint = 'https://run.mocky.io/v3/27b47d79-f382-4dee-b4fe-a0976ceda9cd'; // Dinamik olabilirdi.
    public array $data;

    public function fetch(): Endpoint1Adapter
    {
        $response = Http::get(
            $this->endpoint
        );

        if (!$response->successful()) {
            $this->error("Unexpected error.");
            abort("Unexpected error.");
        }

        $this->data = $response->json() ?? [];
        return $this;
    }

    public function save(): bool
    {
        $bulkData = [];

        foreach ($this->data as $datum) {
            $bulkData[] = [
                'task_id' => $datum['id'] . '-' . $this->suffix,
                'difficulty' => $datum['zorluk'],
                'duration' => $datum['sure'],
            ];
        }

        try {
            $success = DB::table($this->_table)->insert($bulkData);
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e->getMessage());
        }

        return $success ?? 0;
    }
}