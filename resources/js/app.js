import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', () => {
    const profileButton = document.getElementById('profile-button');
    const profileMenu = document.getElementById('profile-menu');

    profileButton.addEventListener('click', (e) => {
        e.stopPropagation(); // Prevent click from bubbling up
        profileMenu.classList.toggle('hidden');
    });

    // Close the menu if clicked outside
    document.addEventListener('click', (e) => {
        if (!profileMenu.contains(e.target) && !profileButton.contains(e.target)) {
            profileMenu.classList.add('hidden');
        }
    });
});