<?php

namespace App\Models\Adapters;

use DB;
use App\Interfaces\DataFetcherInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Endpoint2Adapter implements DataFetcherInterface
{
    public string $_table = 'tasks';
    public string $suffix = 'store2';
    public string $endpoint = 'https://run.mocky.io/v3/7b0ff222-7a9c-4c54-9396-0df58e289143'; // Harcoded olarak bırakmayı pek tercih etmem ama bu case'in amacı için yeterli olduğunu düşündüm.
    public array $data;

    public function fetch(): Endpoint2Adapter
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
                'difficulty' => $datum['value'],
                'duration' => $datum['estimated_duration'],
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