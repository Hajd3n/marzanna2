<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="book1.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka internetowa</title>
</head>
<body>
    <article>
    <header>
        <h1>BIBLIOTEKA INTERNETOWA</h1>
    </header>
    <div id="gorna">
            <form action="" method="POST">
                <label for="nazwisko">Wybierz autora</label>
                <select name="nazwisko">
                    <option value="Bonda">Bonda Katarzyna</option>
                    <option value="Coben">Coben Harlan</option>
                    <option value="Link">Link Charlotte</option>
                    <option value="Nesbo">Nesbo Jo</option>
                </select>
                <button type="submit" value="Zatwierdź">Zatwierdź
            </form>
        </div>
        <div id="dolna">
            <?php
                if(isset($_POST['nazwisko'])) {
                    $naz = $_POST['nazwisko'];
                    $conn = mysqli_connect('localhost', 'root', '', 'biblioteka');
                    $result = mysqli_query($conn, "SELECT Imie, Nazwisko, Tytul, Cena_za_wyp FROM
                     autorzy, ksiazki WHERE Nazwisko='$naz' AND autorzy.IDAutor = ksiazki.AutorID") or die("Błędne zapytanie");
                    $row = mysqli_fetch_array($result);
                    echo "<h3>Dostępne książki wybranego autora:". $row['Imie']. " ".$row['Nazwisko'] . "</h3>";
                    while($row = mysqli_fetch_array($result)) {
                        echo "<b>".$row['Tytul']."</b> - cena za wypozyczenie: ".$row['Cena_za_wyp'] . "zl"     . "</p>";
                    }
                    mysqli_close($conn);
                }
            ?>
        </div>
    </article>
</body>
</html> 
