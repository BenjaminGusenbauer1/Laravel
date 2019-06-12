<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

          </head>
    <body>
       <ul>
           <?php foreach ($books as $book) {?>
           <li><?php echo $book->isbn;
                        echo $book->title;
               ?></li>
           <?php } ?>
       </ul>
    </body>
</html>
