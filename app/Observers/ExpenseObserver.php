<?php

namespace App\Observers;

use App\Models\Expense;
use Illuminate\Support\Str;

class ExpenseObserver
{
    /**
     * Handle the Expense "created" event.
     */
    public function creating(Expense $expense): void
    {
        $expense->uuid = (string) Str::uuid();
    }

    /**
     * Handle the Expense "updated" event.
     */
    public function updated(Expense $expense): void
    {
        //
    }

    /**
     * Handle the Expense "deleted" event.
     */
    public function deleted(Expense $expense): void
    {
        //
    }

    /**
     * Handle the Expense "restored" event.
     */
    public function restored(Expense $expense): void
    {
        //
    }

    /**
     * Handle the Expense "force deleted" event.
     */
    public function forceDeleted(Expense $expense): void
    {
        //
    }
}
