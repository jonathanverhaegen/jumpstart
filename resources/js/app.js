const { add, findLastIndex, isSet } = require('lodash');

require('./bootstrap');

//roadmap

let roadmapBtns = document.querySelectorAll('.roadmap__stage');
let roadmapContainer = document.querySelector('.roadmap__container');

if(roadmapBtns !== null){
    roadmapBtns.forEach((btn) => {
       btn.addEventListener('click', (e) => {
           e.preventDefault();
           let stage = btn.dataset.stage;
           if(stage){
           roadmapContainer.style.display = "none";
            }
           
           //juiste stap laten zien
           let stap = document.querySelector('.stage__container--' + stage);
           stap.style.display = "block";
       }); 
    });
}

//stage back 

let stageBackBtn = document.querySelector('.stage__header__back');

if(stageBackBtn !== null){
    stageBackBtn.addEventListener('click', (e) => {
        e.preventDefault();
        let stap = document.querySelector('.stage__container');
        stap.style.display = "none";
        document.querySelector('.roadmap__container').style.display = "block";
    })
}
