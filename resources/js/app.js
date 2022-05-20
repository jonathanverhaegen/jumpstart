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

//stage3

let stageBtn3 = document.querySelectorAll('.stagebtn3');
if(stageBtn3 !== null){
    stageBtn3.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            document.querySelector('.formStage3').submit();
        })
    })
}

//stage4 
let stageBtn4 = document.querySelectorAll('.stagebtn4');
if(stageBtn4 !== null){
    stageBtn4.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            let extra = btn.dataset.extra;
            console.log(extra);
            if(extra === "2"){
                document.querySelector('.stage4Input').value = extra;
                document.querySelector('.formStage4').submit();
            }else{
                document.querySelector('.formStage4').style.display = "none";
                document.querySelector('.stage__form__number').style.display = "flex";
            }
            
        })
    })
}

//stage5
let stage5 = document.querySelectorAll('.stage5');
if(stage5 !== null){
    stage5.forEach((stage) => {
        let stageField = stage.querySelector('.stage__field');
        let check = 0;
        stageField.addEventListener('click', (e) => {
            e.preventDefault();
            if(check === 0){
                stage.querySelector('.stage__field__icon').style.transform = "rotate(180deg)";
                stage.querySelector('.stage5__form').style.display = "block";
                check = 1;
            }else{
                stage.querySelector('.stage__field__icon').style.transform = "rotate(0deg)";
                stage.querySelector('.stage5__form').style.display = "none";
                check = 0;
            }
            
        })
    })
}

//stage6
let stageBtn6 = document.querySelectorAll('.stagebtn6');
if(stageBtn6 !== null){
    stageBtn6.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            document.querySelector('.formStage6').submit();
        })
    })
}
