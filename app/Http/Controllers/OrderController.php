<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

use App\Order;
use App\Status;
use App\Book;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::with(['books', 'statuses', 'user'])
            ->orderBy('user_id')->orderBy('updated_at','DESC')->get();
        return $orders;
    }

    public function getOrderByID(int $id) {
        $order = Order::where('id', $id)
            //->with(['id'])
            ->first();
        return $order;
    }

    public function getAllOrdersOfUser(int $user_id)
    {
        $orders = Order::where('user_id', $user_id)
            ->with(['books', 'statuses', 'user'])
            ->orderBy('updated_at', 'DESC')
            ->get();
        return $orders;
    }

    public function saveOrder (Request $request) : JsonResponse {

        $request = $this->parseRequest($request);
        DB::beginTransaction();
        try {
            $order = Order::create($request->all());
            if ($request['books'] && is_array($request['books'])) {
                foreach ($request['books'] as $oneBook) {
                    $book = Book::firstOrNew(['isbn'=>$oneBook['isbn']]);
                    //$amount = $oneBook['amount'];
                    //$order->books()->attach([$book['id'] => ['amount' => $amount]]);
                }
            }


            DB::commit();
            return response()->json($order, 201);
        }

        catch (\Exception $e) {
            DB::rollBack();
            return response()->json('Saving Order failed ' .$e->getMessage(), 420);
        }
    }

    public function submitStatus (Request $request) : JsonResponse {

        $request = $this->parseRequest($request);
        DB::beginTransaction();
        try {
            $status = Status::create($request->all());
            DB::commit();
            return response()->json($status, 201);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json('Saving Status failed ' .$e->getMessage(), 420);
        }
    }

    private function parseRequest(Request $request) : Request {
        $date = new \DateTime($request->published);
        $request['published'] = $date;
        return $request;
    }
}
