<?php

namespace App\Http\Controllers;

use App\Models\TransactionItems;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Transaction;
use Yajra\DataTables\Facades\DataTables;

class MyTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Transactions::with(['user'])->where('user_id', Auth::user()->id);
            return DataTables::of($query)->addColumn('action', function($item){
                return '
                <a href = "'.route('dashboard.my-transaction.show', $item->id). '" class = "bg-pink-400 hover:bg-white hover:text-pink-500 text-white font-bold py-2 px-4 row shadow-lg rounded " >Show</a>
                ';
            })
            ->editColumn('total_price', function($item){
                return number_format($item->price);
            })->rawColumns(['action'])->make();
        }
        return view('pages.dashboard.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transactions $myTransaction)
    {
        if(request()->ajax()){
            $query = TransactionItems::with(['product'])->where('transaction_id', $myTransaction->id);
            return DataTables::of($query)
            ->editColumn('product.price', function($item){
                return number_format($item->product->price);
            })->make();
        }
        return view('pages.dashboard.transaction.show', [
            'transaction' => $myTransaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
