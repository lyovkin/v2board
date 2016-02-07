<?php

namespace App\Http\Controllers\AdminControllers;


use App\Models\Payment;
use ZaWeb\Core\Controllers\AbstractAdminController;

/**
 * Class TransactionController
 * @package App\Http\Controllers\AdminControllers
 */
class TransactionController extends AbstractAdminController {

    /**
     * @return \Illuminate\View\View
     */
    public function showAllTransaction()
    {
        $transactions = Payment::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.transactions.index', compact('transactions'));
    }
}