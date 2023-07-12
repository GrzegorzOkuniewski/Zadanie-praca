

window.addEventListener('DOMContentLoaded', (event) => {
  
    const notesList = document.getElementById('notes-list');
    const savedNotes = JSON.parse(localStorage.getItem('notes')) || [];
  
    savedNotes.forEach((note) => {
      const noteElement = createNoteElement(note);
      notesList.appendChild(noteElement);
    });
  
    const saveButton = document.getElementById('save-button');
    saveButton.addEventListener('click', () => {
      const noteTitleInput = document.getElementById('note-title');
      const noteContentInput = document.getElementById('note-content');
      const noteTitle = noteTitleInput.value;
      const noteContent = noteContentInput.value;
  
      if (noteTitle && noteContent) {
        const newNote = { title: noteTitle, content: noteContent };
        const noteElement = createNoteElement(newNote);
        notesList.appendChild(noteElement);
        savedNotes.push(newNote);
        localStorage.setItem('notes', JSON.stringify(savedNotes));
  
        noteTitleInput.value = '';
        noteContentInput.value = '';
      }
    });
  
    function createNoteElement(note) {
      const noteElement = document.createElement('div');
      noteElement.classList.add('note');
  
      const titleElement = document.createElement('h2');
      titleElement.textContent = note.title;
  
      const contentElement = document.createElement('p');
      contentElement.textContent = note.content;
  
      noteElement.appendChild(titleElement);
      noteElement.appendChild(contentElement);
  
      return noteElement;
    }
  });
  