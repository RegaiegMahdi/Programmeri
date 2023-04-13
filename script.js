/*dark mode */
document.addEventListener('DOMContentLoaded', () => {
    let darkModeIcon = document.querySelector('#dark-icon');
    darkModeIcon.onclick = () => {
      darkModeIcon.classList.toggle('bx-sun');
      document.body.classList.toggle('dark-mode');
    };
  });
/*sticky navbar*/
window.onscroll=()=>{
let header=document.querySelector('.header');
header.classList.toggle('sticky',window.scrollY>100);
};

