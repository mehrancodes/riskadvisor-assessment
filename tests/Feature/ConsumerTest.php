<?php

use App\Models\Consumer;
use App\Models\Product;
use App\Models\Submission;

test('consumers can have several submissions', function () {
    // Given we have 3 insurance products to provide
    $products = Product::factory(3)->create();

    // consumer can have several submissions
    $consumer = Consumer::factory()->make()->toArray();
    $submissions = Submission::factory(2)->make()->toArray();

    foreach ($submissions as $submission) {
        $payload = [
            'consumer' => $consumer,
            'submission' => array_merge(
                $submission,
                ['insurance_products' => $products->pluck('id')->toArray()]
            ),
        ];

        $response = $this->post(route('get-quote'), $payload);

        $response->assertStatus(302);

        $this->assertDatabaseHas('submissions', $submission);
    }

    $this->assertDatabaseHas('consumers', $consumer);
});

test('it validates the consumer personal information', function ($payload, $expected) {
    $payload = Consumer::factory()->make($payload)->toArray();

    $response = $this->postJson(route('get-quote'), $payload);

    $response->assertStatus(422)
        ->assertInvalid($expected);
})->with([
    [
        'actual' => [],
        'expected' => [
            'consumer.first_name',
            'consumer.last_name',
            'consumer.email',
            'consumer.phone_number',
            'consumer.contact_preference',
            'submission.city',
            'submission.state',
            'submission.zip_code',
        ],
    ],
    [
        'actual' => [
            'consumer.first_name',
            'consumer.last_name',
            'consumer.email',
            'consumer.phone_number',
            'consumer.contact_preference',
            'submission.city',
            'submission.state',
            'submission.zip_code',
        ],
        'expected' => [
            'consumer.phone_number',
        ],
    ],
]);
