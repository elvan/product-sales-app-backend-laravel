<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Resources\TransactionCollection;
use App\Http\Resources\TransactionResource;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all transactions
        $transactions = Transaction::query()
            ->paginate(20);

        // Return a collection of $transactions with pagination
        return new TransactionCollection($transactions);
    }

    /**
     * Create a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateTransactionRequest $request)
    {
        // Validate the request
        $fields = $request->validated();

        $transaction = new Transaction();

        // Create a new transaction
        DB::transaction(function () use ($fields, $transaction) {
            $totalPrice = 0;

            $transaction->customer_name = $fields['customer_name'];
            $transaction->added_at = $fields['added_at'];
            $transaction->save();

            foreach ($fields['items'] as $item) {
                // Find a product by id
                $product = Product::find($item['product_id']);


                // Create a new transaction item
                $transactionItem = new TransactionItem([
                    'transaction_id' => $transaction->id,
                    'line_number' => $item['line_number'],
                    'product_id' => $item['product_id'],
                    'product_name' => $product->name,
                    'unit_price' => $product->price,
                    'quantity' => $item['quantity'],
                ]);

                // Calculate the total price
                $totalPrice += $product->price * $item['quantity'];

                // Save the transaction item
                $transaction->items()->save($transactionItem);

                // Update the product quantity_in_stock
                $product->quantity_in_stock -= $item['quantity'];

                // Save the product
                $product->save();

                // Set the total price
                $transaction->total_price = $totalPrice;

                // Save the transaction
                $transaction->save();
            }

            $transaction->save();
        });

        // Return a single transaction
        return new TransactionResource($transaction);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        // Return a single transaction
        return new TransactionResource($transaction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
