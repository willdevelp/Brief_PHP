<?php
    require 'header.php';
    require 'footer.php';
    require '../models/mod_con.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" class="border-blue-300 border-2 h-auto w-96  px-7 py-6 space-y-5 mx-auto mt-32 rounded-md">
        <div class="space-x-14">
            <label for="">nom</label>
            <input type="text" name="nom" id="" class="border-slate-400 border-1 h-8 w-54 rounded-md">
        </div>
        <div class="">
            <label for="">Mot de passe</label>
            <input type="text" name="password" id="" class="border-slate-400 border-1 h-8 w-54 rounded-md">
        </div>
        <button type="submit" name="submit" class="border-green-400 border-1 rounded-md w-full hover:bg-gray-400 text-center py-2">Envoyer</button>
    </form>
</body>
</html>
</body>
</html>

