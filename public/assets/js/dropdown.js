const toggleMenu = document.querySelector('.menu');
const toggleIcon = document.querySelector('.icon');

function menuToggle(){
    toggleMenu.classList.toggle("active");
}

// window.addEventListener('click', function(e){
//     if (!toggleMenu.contains(e.target) && !toggleIcon.contains(e.target) && toggleMenu.classList.contains('active')) {
//         menuToggle();
//     }
// });