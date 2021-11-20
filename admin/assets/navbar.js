function toggleProfileButton() {
    if (document.getElementById('profile-dropdown').classList.contains('hidden')) {
        document.getElementById('profile-dropdown').classList.remove('hidden');
    } else {
        document.getElementById('profile-dropdown').classList.add('hidden');
    }
}

function toggleMenuButton() {
    if (document.getElementById('menu-dropdown').classList.contains('hidden')) {
        document.getElementById('menu-dropdown').classList.remove('hidden');
    } else {
        document.getElementById('menu-dropdown').classList.add('hidden');
    }
}