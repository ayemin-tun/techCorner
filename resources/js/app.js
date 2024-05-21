import './bootstrap';
import 'preline';

// bug fix for navbar is hunbager menu icon is not clickable on first page reload due to wire navigate
document.addEventListener('livewire:navigated', () => {
    window.HSStaticMethods.autoInit();
})