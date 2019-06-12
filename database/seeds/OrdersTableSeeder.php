<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::all()->first();

        $order1 = new \App\Order;
        $order1->number= '56419815';
        $books = \App\Book::all()->pluck("id");
        $order1->books()->sync($books);
        $order1->user()->associate($user);
        $order1->save();

        $user2 = \App\User::all()->where('id', 2)->first();
        $order1 = new \App\Order;
        $order1->number= '56419816';
        //$book = \App\Book::all()->where('id', 2)->first()->pluck("id");
        $order1->books()->sync($books);
        $order1->user()->associate($user2);
        $order1->save();

        $user3 = \App\User::all()->where('id', 3)->first();
        $order1 = new \App\Order;
        $order1->number= '56419817';
        $book = \App\Book::all()->where('isbn', '=', '9780753557525')->first();
        $order1->books()->sync($book);
        $order1->user()->associate($user3);
        $order1->save();
    }
}
