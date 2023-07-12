<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notatnik PWA</title>
  <link rel="manifest" href="/manifest.json">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <header>
    <h1>Notatnik PWA</h1>
  </header>
  <main>
    <div id="notes-list">
    </div>
    <div id="note-form">
      <input type="text" id="note-title" placeholder="Tytuł notatki">
      <textarea id="note-content" placeholder="Treść notatki"></textarea>
      <button id="save-button">Zapisz</button>
    </div>
  </main>
  <script src="app.js"></script>
</body>
</html>