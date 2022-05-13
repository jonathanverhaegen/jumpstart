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

//stage1 btns 

let stage1Btns = document.querySelectorAll('.stage1btn');

if(stage1Btns !== false){
    stage1Btns.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            let bank = btn.innerHTML.toLocaleLowerCase();
            
            //juiste checkveld tonen
            let checkField = document.querySelector('.stage__form__check');
            let btns = document.querySelector('.stage__btns');

            checkField.style.display = "flex";
            btns.style.display = "none";

            //bank invullen
            document.querySelector('.stage__form__check__extra').value = bank;
        })
    })
}
