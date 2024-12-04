document.querySelectorAll('.nav-item.dropdown').forEach(item => {
    item.addEventListener('mouseenter', function () {
        const contentId = item.id.replace('menu-', '') + '-content';
        const content = document.getElementById(contentId);
        content.style.display = 'block';
    });

    item.addEventListener('mouseleave', function () {
        const contentId = item.id.replace('menu-', '') + '-content';
        const content = document.getElementById(contentId);
        content.style.display = 'none';
    });
});

document.querySelectorAll('.display.menu-dropdown').forEach(item => {
    item.addEventListener('mouseenter', function () {
        item.style.display = 'block';
    });

    item.addEventListener('mouseleave', function () {
        item.style.display = 'none';
    });
});
