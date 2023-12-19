burger = document.querySelector('.burger');
navbar = document.querySelector('.navbar');
nav_list = document.querySelector('.nav-list');
rightnav = document.querySelector('.rightnav');

burger.addEventListener('click', ()=>{
nav_list.classList.toggle('v-class-resp');
rightnav.classList.toggle('v-class-resp');
navbar.classList.toggle('h-nav-resp');
});