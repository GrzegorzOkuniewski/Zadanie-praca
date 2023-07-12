<?php
// Please add your logic here

echo "<h1 class='starting-title'>Nice to see you! &#128075;</h1>";

// Wczytaj zawartość pliku users.json
$jsonData = file_get_contents('dataset/users.json');
$users = json_decode($jsonData, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deleteUser'])) {
        $userId = $_POST['deleteUser'];

        // Znajdź indeks użytkownika do usunięcia
        $userIndex = -1;
        foreach ($users as $index => $user) {
            if ($user['id'] == $userId) {
                $userIndex = $index;
                break;
            }
        }

        // Usuń użytkownika, jeśli został znaleziony
        if ($userIndex !== -1) {
            array_splice($users, $userIndex, 1);
            $jsonData = json_encode($users, JSON_PRETTY_PRINT);
            file_put_contents('dataset/users.json', $jsonData);
        }

        // Przeładuj stronę
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone'])) {
        // Pobierz dane z formularza
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Generuj nowe ID dla użytkownika
        $newUserId = count($users) + 1;

        // Utwórz nowego użytkownika
        $newUser = [
            'id' => $newUserId,
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'phone' => $phone
        ];

        // Dodaj nowego użytkownika do tablicy użytkowników
        $users[] = $newUser;

        // Zapisz tablicę użytkowników do pliku JSON
        $jsonData = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents('dataset/users.json', $jsonData);

        // Przeładuj stronę
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}

// Rozpocznij tworzenie tabeli
echo '<table>';
echo '<tr><th>ID</th><th>Nazwa</th><th>Nazwa użytkownika</th><th>E-mail</th><th>Adres</th><th>Telefon</th><th>Akcja</th></tr>';

// Iteruj przez użytkowników i dodawaj wiersze do tabeli
foreach ($users as $user) {
    $id = $user['id'];
    $name = $user['name'];
    $username = $user['username'];
    $email = $user['email'];
    $address = isset($user['address']) ? $user['address']['street'] . ', ' . $user['address']['suite'] . ', ' . $user['address']['city'] . ', ' . $user['address']['zipcode'] : '';
    $phone = $user['phone'];

    echo '<tr>';
    echo '<td>' . $id . '</td>';
    echo '<td>' . $name . '</td>';
    echo '<td>' . $username . '</td>';
    echo '<td>' . $email . '</td>';
    echo '<td>' . $address . '</td>';
    echo '<td>' . $phone . '</td>';
    echo '<td>';
    echo '<button type="button" onclick="deleteUser(' . $id . ')">Usuń</button>';
    echo '</td>';
    echo '</tr>';
}

// Zakończ tabelę
echo '</table>';
?>

<!-- Formularz dodawania nowego użytkownika -->
<form method="post">
    <label for="name">Nazwa:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="username">Nazwa użytkownika:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" required><br>

    <label for="phone">Telefon:</label>
    <input type="text" name="phone" id="phone" required><br>

    <button type="submit">Dodaj użytkownika</button>
</form>

<script>

</script>
