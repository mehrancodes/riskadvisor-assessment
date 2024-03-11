<?php

namespace App\Actions;

use App\Models\Consumer;
use Illuminate\Support\Arr;

/**
 * Update the existing consumer contact data or creates a new consumer.
 */
class UpdateOrCreateConsumer
{
    public function handle(?array $consumer = []): ?Consumer
    {
        if (empty($consumer)) {
            return null;
        }

        $allowedColumnsToUpdate = ['email', 'phone_number', 'contact_preference'];

        $existingConsumer = Consumer::query()
            ->where('email', $consumer['email'])
            ->orWhere('phone_number', $consumer['phone_number'])
            ->first();

        match (is_null($existingConsumer)) {
            true => $existingConsumer = Consumer::create($consumer),
            false => $existingConsumer->update(Arr::only($consumer, $allowedColumnsToUpdate))
        };

        return $existingConsumer->fresh();
    }
}
