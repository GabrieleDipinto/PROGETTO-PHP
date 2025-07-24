// Funzione per impostare il tema
function setTheme(darkMode) {
    if (darkMode) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('darkMode', 'true');
    } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('darkMode', 'false');
    }
}

// Inizializza il tema
if (localStorage.getItem('darkMode') === null) {
    // Se non è stato impostato, usa le preferenze del sistema
    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        setTheme(true);
    }
} else {
    // Usa il tema salvato
    setTheme(localStorage.getItem('darkMode') === 'true');
}

// Esponi la funzione globalmente
window.toggleDarkMode = function() {
    const isDark = document.documentElement.classList.contains('dark');
    setTheme(!isDark);
}; 