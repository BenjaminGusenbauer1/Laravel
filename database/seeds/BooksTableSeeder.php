<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::all()->first();

        $book = new Book;
        $book->title= 'Harry Potter';
        $book->subtitle= 'Und der Stein der Weisen';
        $book->isbn= '1234561235322';
        $book->rating='10';
        $book->description='Cool';
        $book->published= new DateTime();
        $book->price='10.11';
        //map existing user to book
        $book->user()->associate($user);
        $book->save();

        //add authors to $book
        $authors = App\Author::all()->pluck("id");
        $book->authors()->sync($authors);

        $orders = App\Order::all()->pluck("id");
        $book->orders()->sync($orders);

        $book->save();

        $book2 = new Book;
        $book2->title= 'Herr der Ringe';
        $book2->subtitle= 'Die Gefährten';
        $book2->isbn= '12345612360098765';
        $book2->rating='9';
        $book2->description='Cooler';
        $book2->published= new DateTime();
        $book->price='10.10';
        $book2->user()->associate($user);

        $book2->save();

        $image1 = new App\Image();
        $image1->title = "Cover 1";
        $image1->url = "https://images-na.ssl-images-amazon.com/images/I/51f5IUi1aRL._SX493_BO1,204,203,200_.jpg";
        $image1->book()->associate($book);
        $image1->save();

        $image2 = new App\Image();
        $image2->title = "Cover 2";
        $image2->url = "https://images-na.ssl-images-amazon.com/images/I/41jZtmlAiyL._SX332_BO1,204,203,200_.jpg";
        $image2->book()->associate($book);
        $image2->save();

        $book = new Book;
        $book->title= 'Buch mit Preis';
        $book->subtitle= 'Und ein Stein';
        $book->isbn= '12345612341';
        $book->rating='10';
        $book->description='Cool';
        $book->published= new DateTime();
        $book->price='10.10';
        //map existing user to book
        $book->user()->associate($user);

        $book->save();

        $book1 = new Book;
        $book1->title= 'Elon Musk';
        $book1->subtitle= 'How the Billionaire CEO of SpaceX and Tesla is Shaping our Future';
        $book1->isbn= '9780753557525';
        $book1->rating='9';
        $book1->description='South African born Elon Musk is the renowned entrepreneur and innovator behind PayPal, SpaceX, Tesla, and SolarCity. Musk wants to save our planet; he wants to send citizens into space, to form a colony on Mars; he wants to make money while doing these things; and he wants us all to know about it. He is the real-life inspiration for the Iron Man series of films starring Robert Downey Junior.';
        $book1->published= new DateTime();
        $book1->price='6.59';
        //map existing user to book
        $book1->user()->associate($user);
        $book1->save();

        $image1 = new App\Image();
        $image1->title = "Cover Elon Musk";
        $image1->url = "https://images-na.ssl-images-amazon.com/images/I/41qCNWh8GaL._SX308_BO1,204,203,200_.jpg";
        $image1->book()->associate($book1);
        $image1->save();

        //add authors to $book1
        //$authors = App\Author::where('firstname', 'Ashlee');
        //$book->authors()->sync($authors);



        $book2 = new Book;
        $book2->title= 'Steve Jobs';
        $book2->subtitle= 'The Exclusive Biography';
        $book2->isbn= '034914043';
        $book2->rating='7';
        $book2->description='Based on more than forty interviews with Steve Jobs conducted over two years - as well as interviews with more than a hundred family members, friends, adversaries, competitors, and colleagues - this is the acclaimed, internationally bestselling biography of the ultimate icon of inventiveness. Walter Isaacson tells the story of the rollercoaster life and searingly intense personality of creative entrepreneur whose passion for perfection and ferocious drive revolutionized six industries: personal computers, animated movies,music, phones, tablet computing, and digital publishing. Although Jobs cooperated with this book, he asked for no control over what was written, nor even the right to read it before it was published. He put nothing off limits. He encouraged the people he knew to speak honestly. And Jobs speaks candidly, sometimes brutally so, about the people he worked with and competed against. His friends, foes, and colleagues provide an unvarnished view of the passions, perfectionism, obsessions, artistry, devilry, and compulsion for control that shaped his approach to business and the innovative products that resulted.';
        $book2->published= new DateTime();
        $book2->price='11.19';
        //map existing user to book
        $book2->user()->associate($user);
        $book2->save();

        $image2 = new App\Image();
        $image2->title = "Cover Steve Jobs";
        $image2->url = "https://images-na.ssl-images-amazon.com/images/I/41qee4C4toL._SX317_BO1,204,203,200_.jpg";
        $image2->book()->associate($book2);
        $image2->save();




        $book3 = new Book;
        $book3->title= 'The Everything Store';
        $book3->subtitle= 'Jeff Bezos and the Age of Amazon';
        $book3->isbn= '0316377554';
        $book3->rating='9';
        $book3->description='good book';
        $book3->published= new DateTime();
        $book3->price='6.89';
        //map existing user to book
        $book3->user()->associate($user);
        $book3->save();

        $image3 = new App\Image();
        $image3->title = "Cover The Everything Store";
        $image3->url = "https://images-na.ssl-images-amazon.com/images/I/51VIK1EGg3L._SX306_BO1,204,203,200_.jpg";
        $image3->book()->associate($book3);
        $image3->save();

        /*
        DB::table('books')->insert([
           'title' => str_random(100),
           'isbn' => '123456789',
            'subtitle' => str_random(100),
            'rating' => 5,
            'description' => str_random(500),
            'published' => new DateTime(),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('books')->insert([
            'title' => str_random(100),
            'isbn' => '123456781',
            'subtitle' => str_random(100),
            'rating' => 5,
            'description' => str_random(500),
            'published' => new DateTime(),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        */
    }
}
