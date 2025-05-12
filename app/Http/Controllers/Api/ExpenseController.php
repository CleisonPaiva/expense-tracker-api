<?php

namespace App\Http\Controllers\Api;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ExpenseResource;
use App\Http\Requests\ExpenseRequest\StoreExpenseRequest;
use App\Http\Requests\ExpenseRequest\UpdateExpenseRequest;

class ExpenseController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/expenses",
     *     summary="List expenses",
     *     tags={"Expenses"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="month", in="query", required=false, @OA\Schema(type="string"), description="Format YYYY-MM"),
     *     @OA\Parameter(name="category", in="query", required=false, @OA\Schema(type="string")),
     *     @OA\Response(response=200, description="List of expenses")
     * )
     */
    public function index(Request $request)
    {
        $query = Expense::where('user_id', Auth::id());

        if ($request->has('month')) {
            $query->whereMonth('expense_date', substr($request->month, 5, 2))
                ->whereYear('expense_date', substr($request->month, 0, 4));
        }

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        return $query->get();
    }

    
    /**
     * @OA\Post(
     *     path="/api/v1/expenses",
     *     summary="Create expense",
     *     tags={"Expenses"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "amount", "category", "expense_date"},
     *             @OA\Property(property="title", type="string", example="Supermercado"),
     *             @OA\Property(property="amount", type="number", example=250.75),
     *             @OA\Property(property="category", type="string", example="Alimentação"),
     *             @OA\Property(property="expense_date", type="string", format="date", example="2024-05-01")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Expense created")
     * )
     */
    public function store(StoreExpenseRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();

        $expense = Expense::create($data);

        return new ExpenseResource($expense);
    }

       /**
     * @OA\Get(
     *     path="/api/v1/expenses/{id}",
     *     summary="Show expense",
     *     tags={"Expenses"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Expense details")
     * )
     */
    public function show(Expense $expense)
    {
        $expense = $expense->with('user')->find($expense->id);

        return new ExpenseResource($expense);
    }

     /**
     * @OA\Put(
     *     path="/api/v1/expenses/{id}",
     *     summary="Update expense",
     *     tags={"Expenses"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="Padaria"),
     *             @OA\Property(property="amount", type="number", example=45.00),
     *             @OA\Property(property="category", type="string", example="Alimentação"),
     *             @OA\Property(property="expense_date", type="string", format="date", example="2024-05-05")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Expense updated")
     * )
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {

        $data = $request->validated();

        $expense->update($data);

        return new ExpenseResource($expense);
    }

      /**
     * @OA\Delete(
     *     path="/api/v1/expenses/{id}",
     *     summary="Delete expense",
     *     tags={"Expenses"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Expense deleted")
     * )
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
