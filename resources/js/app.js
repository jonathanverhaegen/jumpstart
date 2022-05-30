const { add, findLastIndex, isSet } = require('lodash');

require('./bootstrap');

//mob header
let header = document.querySelector('.header--mob');
if(header !== null){
    header.addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelector('.header__links__mob').style.top = "50px";
        document.querySelector('.header--mob').style.borderRadius = "0px";
    })
}


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

// stage back 

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

if(toggleNextBtn !== null){
    toggleNextBtn.addEventListener('click', (e) => {
        e.preventDefault();

        //roadmap veranderen
        let roadmap = document.querySelector('.roadmap');
        roadmap.style.backgroundPosition = "right"
        toggleNextBtn.style.display = "none";

        //.roadmap__stage veranderen
        let roadmapStages = document.querySelectorAll('.roadmap__stage');
        roadmapStages.forEach((stage) => {
            stage.style.display = "none";
        });

        let stage6 = document.querySelector('.roadmap__stage--6');
        let stage7 = document.querySelector('.roadmap__stage--7');
        

        stage6.style.display = "flex";
        stage7.style.display = "flex";
        
        let backBtn = document.querySelector('.roadmap__back');
        backBtn.style.display = "flex";
       
    });
}

let backBtn = document.querySelector('.backBtn');
if(backBtn !== null){
    backBtn.addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href = "/roadmap";
    })
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
        });
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
                document.querySelector('.checkNumber4').style.display = "block";
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

//stage5 activity
let categoryContainers = document.querySelectorAll('.category__container');
let teller = 0;
if(categoryContainers !== null){
    categoryContainers.forEach((cat) => {
        let container = cat.querySelector('.category');
        let check = 0;

        container.addEventListener('click', (e) => {
            if(check === 0){
                cat.querySelector('.category__icon').style.transform = "rotate(180deg)";
                cat.querySelectorAll('.subcategory__container').forEach((con) => {
                    con.style.display = "block";
                })
                check = 1;
            }else{
                cat.querySelector('.category__icon').style.transform = "rotate(0deg)";
                cat.querySelectorAll('.subcategory__container').forEach((con) => {
                    con.style.display = "none";
                })
                check = 0;
            }
        })

        let subContainers = cat.querySelectorAll('.subcategory__container');
        subContainers.forEach((sub) => {
            let subcategory = sub.querySelector('.subcategory');
            let check2 = 0;
            subcategory.addEventListener('click', (e) => {
                if(check2 === 0){
                    sub.querySelector('.subcategory__icon').style.transform = "rotate(180deg)";
                    sub.querySelectorAll('.activity__container').forEach((ac) => {
                        ac.style.display = "block";
                    })
                    check2 = 1;
                }else{
                    sub.querySelector('.subcategory__icon').style.transform = "rotate(0deg)";
                    sub.querySelectorAll('.activity__container').forEach((ac) => {
                        ac.style.display = "none";
                    })
                    check2 = 0;
                }
            })

            let acContainer = sub.querySelectorAll('.activity__container');
            console.log(acContainer);
            acContainer.forEach((ac) => {
                let activity = ac.querySelector('.activity');
                let check3 = 0;
                
                activity.addEventListener('click', (e) => {
                    if(check3 === 0){
                        ac.querySelector('.activity__icon').src = "/img/checked.png";
                        let name = ac.querySelector('.activity__text').innerHTML;

                        //name toevoegen aan briefje
                        let briefje = document.querySelector('.briefje');

                        let activityContainer = document.createElement("div");
                        activityContainer.classList.add('activity__container--visible');

                        let activity = document.createElement("div");
                        activity.classList.add('activity');

                        let activityText = document.createElement("p");
                        let activityIcon = document.createElement("img");

                        activityText.classList.add('activity__text');
                        activityIcon.classList.add('activity__icon');

                        activityText.innerHTML = name;
                        activityIcon.src = "/img/checked.png";

                        activity.appendChild(activityText);
                        activity.appendChild(activityIcon);
                        activityContainer.appendChild(activity);
                        briefje.appendChild(activityContainer);

                        //toevoegen aan formulier
                        let form = document.querySelector('.briefjeAdd');
                        console.log(form);
                        input = document.createElement('input');
                        teller++;
                        input.name = 'brief[]';
                        input.type = "hidden";
                        input.value = name;
                        input.classList.add('inputBrief');

                        form.appendChild(input);

                        check3 = 1;
                        
                    }else{
                        ac.querySelector('.activity__icon').src = "/img/unchecked.png";
                        let name = ac.querySelector('.activity__text').innerHTML;

                        let activityContainer = document.querySelectorAll('.activity__container--visible');
                        activityContainer.forEach((ac) => {
                            let text = ac.querySelector('.activity__text').innerHTML;
                            if(text === name){
                                document.querySelector('.briefje').removeChild(ac);   
                            }
                        })

                        let inputFields = document.querySelectorAll('.inputBrief');
                        inputFields.forEach((input) => {
                            let text2 = input.value;
                            if(name === text2 ){
                                input.remove();
                            }
                        })

                        check3 = 0;
                    }
                })
            })
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
        
