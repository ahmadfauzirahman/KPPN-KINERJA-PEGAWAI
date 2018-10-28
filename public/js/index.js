(function() {
    'use strict';
    // Self Initialize DOM Factory Components
    domFactory.handler.autoInit()


    // Connect button(s) to drawer(s)
    var sidebarToggle = document.querySelectorAll('[data-toggle="sidebar"]')

    sidebarToggle.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            var selector = e.currentTarget.getAttribute('data-target') || '#default-drawer'
            var drawer = document.querySelector(selector)
            if (drawer) {
                if (selector == '#default-drawer') {
                    $('.container-fluid').toggleClass('container--max');
                }
                drawer.mdkDrawer.toggle();
            }
        })
    })
})()