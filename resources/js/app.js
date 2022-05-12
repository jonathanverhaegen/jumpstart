require('./bootstrap');

//roadmap

let roadmapBtns = document.querySelectorAll('.roadmap__stage');
let roadmapContainer = document.querySelector('.roadmap__container');

if(roadmapBtns !== null){
    roadmapBtns.forEach((btn) => {
       btn.addEventListener('click', (e) => {
           e.preventDefault();
           let stage = btn.dataset.stage;
           roadmapContainer.style.display = "none";

           //juiste stap laten zien
           let stap = document.querySelector('.stage__container--' + stage);
           stap.style.display = "block";
       }); 
    });
}
