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
        window.location.href = "/roadmap";

    })
}

//stage1 btns 

let stage1Btns = document.querySelectorAll('.stage1btn');

if(stage1Btns !== null){
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

//show password

let togglePasswordBtn = document.querySelector('.togglePassword');
if(togglePasswordBtn !== null){
    togglePasswordBtn.addEventListener('click', (e) => {
        e.preventDefault();
        let passwordType = document.querySelector('.password').type;
        
        if(passwordType === "password"){
            passwordType = "text";
        }else{
            passwordType = "password";
        }
        document.querySelector('.password').type = passwordType;
    })
}

//next page

let toggleNextBtn = document.querySelector('.nextBtn');
let toggleNext = 0;
if(toggleNextBtn !== null){
    toggleNextBtn.addEventListener('click', (e) => {
        e.preventDefault();

        if(toggleNext === 1){
            window.location.href = "/roadmap";
        }
        
        //roadmap veranderen
        let roadmap = document.querySelector('.roadmap');
        roadmap.style.backgroundPosition = "right"
        toggleNextBtn.style.transform = "scaleX(-1)";

        //.roadmap__stage veranderen

        let roadmapStages = document.querySelectorAll('.roadmap__stage');
        roadmapStages.forEach((stage) => {
            stage.style.display = "none";
        });

        let stage6 = document.querySelector('.roadmap__stage--6');
        let stage7 = document.querySelector('.roadmap__stage--7');
        let stage8 = document.querySelector('.roadmap__stage--8');

        stage6.style.display = "flex";
        stage7.style.display = "flex";
        stage8.style.display = "flex";

        toggleNext = 1;
    });
}

//faqs open
let faqs = document.querySelectorAll('.faq');
let check = 0;
if(faqs !== null){
    faqs.forEach((faq) => {
        let btn = faq.querySelector('.fold__icon');
        let answer = faq.querySelector('.faq__answer');
        btn.addEventListener('click', (e) => {
            if(check === 0){
                e.preventDefault();
                btn.style.transform = "rotate(180deg)";
                check = 1;
                answer.style.display = "block";
            }else{
                e.preventDefault();
                btn.style.transform = "rotate(0deg)";
                check = 0;
                answer.style.display = "none";
            }
        })
    })
}
