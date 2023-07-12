// Add your custom scripts here

console.log('Good luck 👌');

function deleteUser(userId) {
    if (confirm('Czy na pewno chcesz usunąć tego użytkownika?')) {
        // Tworzenie formularza
        var form = document.createElement('form');
        form.method = 'post';
        form.action = '<?php echo $_SERVER["PHP_SELF"]; ?>';

        // Dodawanie pola ukrytego z identyfikatorem użytkownika
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'deleteUser';
        input.value = userId;
        form.appendChild(input);

        // Dodawanie formularza do dokumentu i wysyłanie go
        document.body.appendChild(form);
        form.submit();
    }
}