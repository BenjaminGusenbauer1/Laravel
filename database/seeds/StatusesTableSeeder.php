<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order1 = App\Order::all()->first();
        $status1 = new Status;
        $status1->status = "Offen";
        $status1->order()->associate($order1);
        $status1->save();

        $status2 = new Status;
        $status2->status = "Bezahlt";
        $status2->order()->associate($order1);
        $status2->save();

        $order2 = App\Order::all()->get(2);
        $status3 = new Status;
        $status3->status = "Offen";
        $status3->order()->associate($order2);
        $status3->save();
    }
}
