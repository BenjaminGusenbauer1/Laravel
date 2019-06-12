<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::all()->first();

        $address1 = new App\Address;
        $address1->streetname="Gartenstraße";
        $address1->streetnumber="22";
        $address1->zip="4284";
        $address1->city="Tragwein";
        $address1->country="Austria";
        $address1->user()->associate($user);
        $address1->save();
    }
}
