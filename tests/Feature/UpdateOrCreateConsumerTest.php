<?php

use App\Actions\UpdateOrCreateConsumer;
use App\Models\Consumer;

test('it can create or update a consumer contact information', function ($actual, $expected) {
    $consumers = Consumer::factory($actual['count'])->make($actual['attributes'])->toArray();

    $updateOrCreateConsumer = app(UpdateOrCreateConsumer::class);

    foreach ($consumers as $consumer) {
        $updateOrCreateConsumer->handle($consumer);

        $this->assertDatabaseHas('consumers', $expected);
    }
})->with([
    [
        'actual' => [
            'count' => 0,
            'attributes' => []
        ],
        'expected' => null,
    ],
    [
        'actual' => [
            'count' => 1,
            'attributes' => [
                'email' => 'contact@mehranrasulian.com',
            ],
        ],
        'expected' => [
            'email' => 'contact@mehranrasulian.com',
        ],
    ],
    [
        'actual' => [
            'count' => 3,
            'attributes' => [
                'phone_number' => '+1551231234',
            ],
        ],
        'expected' => [
            'phone_number' => '+1551231234',
        ],
    ],
]);
