<?php

namespace App\Http\Controllers;

use App\Actions\UpdateOrCreateConsumer;
use App\Http\Requests\StorePersonalInformationRequest;
use App\Models\Product;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class GetQuoteController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return Inertia::render('GetQuote/Index', compact('products'));
    }

    public function store(StorePersonalInformationRequest $request, UpdateOrCreateConsumer $updateOrCreateConsumer)
    {
        $consumerData = $request->validated('consumer');
        $submissionData = Arr::except($request->validated('submission'), 'insurance_products');
        $insuranceProducts = $request->validated('submission.insurance_products');

        $consumer = $updateOrCreateConsumer->handle($consumerData);

        $submission = $consumer->submissions()->create($submissionData);

        $submission->products()->attach($insuranceProducts);

        return redirect()->back();
    }
}
