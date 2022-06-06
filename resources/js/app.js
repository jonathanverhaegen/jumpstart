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

//showpassword signup

let togglePassword = document.querySelectorAll('.passwordToggle');
if(togglePassword !== null){
    togglePassword.forEach((toggle) => {
        let toggleBtn = toggle.querySelector('.togglePass--signup');
        let check = 0;
        toggleBtn.addEventListener('click', (e) => {
            if(check === 0){
                toggle.querySelector('#pass').type = "text";
                check = 1;
            }else{
                toggle.querySelector('#pass').type = "password";
                check = 0;
            }
        })
    })
}

//showpassword signup zelfstandige

let passwordToggle = document.querySelectorAll('.passwordToggleZelf');

if(passwordToggle !== null){
    passwordToggle.forEach((password) => {
        let btn = password.querySelector('.togglePass--signup');
        let check = 0;
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            if(check === 0){
                password.querySelector('.signup__input--pass').type = "text";
                check = 1;
            }else{
                password.querySelector('.signup__input--pass').type = "password";
                check = 1;
            }
        })
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
        let stage8 = document.querySelector('.roadmap__stage--8');
        

        stage6.style.display = "flex";
        stage7.style.display = "flex";
        stage8.style.display = "flex";
        
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
            let exemption = btn.dataset.exemption;
            document.querySelector('.exemption').value = exemption;
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
                if(stage.querySelector('.stage__info') !== null){
                    stage.querySelector('.stage__info').style.display = "block";
                }else{
                    stage.querySelector('.stage5__form').style.display = "block";
                }
                check = 1;
            }else{
                stage.querySelector('.stage__field__icon').style.transform = "rotate(0deg)";
                if(stage.querySelector('.stage__info') !== null){
                    stage.querySelector('.stage__info').style.display = "none";
                }else{
                    stage.querySelector('.stage5__form').style.display = "none";
                }
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

//avatar
let avatarPick = document.querySelector('.avatar');
if(avatarPick !== null){
    avatarPick.addEventListener('change', (e) => {
        var src = URL.createObjectURL(e.target.files[0]);
        document.querySelector('.sz__pic').src = src;
        
    })
}

//signup Zelfstandige
let signupZelf = document.querySelector('.signupZelf');
if(signupZelf !== null){

    let title = signupZelf.querySelector('.h__reg__sz');
   
    let form1 = signupZelf.querySelector('.addZelf1');
    let form2 = signupZelf.querySelector('.addZelf2');
    let form3 = signupZelf.querySelector('.addZelf3');

    let btn1 = signupZelf.querySelector('.btn1');
    let btn2 = signupZelf.querySelector('.btn2');

    btn1.addEventListener('click', (e) => {
        e.preventDefault();
        title.innerHTML = "KBO";
        form1.style.display = "none";
        form2.style.display = "flex";
    });

    btn2.addEventListener('click', (e) => {
        e.preventDefault();
        title.innerHTML = "Vertel meer over jezelf";
        form2.style.display = "none";
        form3.style.display = "flex";
    })


}

//post plaatsen
let addPostBtn = document.querySelector('.ask');
if(addPostBtn !== null){
    addPostBtn.addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelector('.addPost').style.display = "flex";
    })
}


//settings avatar update
let formAvatar = document.querySelector('.form--updateAvatar');
if(formAvatar !== null){
    let input = formAvatar.querySelector('.avatar');
    input.addEventListener('change', (e) => {
        formAvatar.submit();
    })
}
//zoekfunctie chat desktop

let searchBarDesk = document.querySelector('.chat__container--desk');

if(searchBarDesk !== null){
    let input = searchBarDesk.querySelector('#search-chat');
    let chats = searchBarDesk.querySelectorAll('.chat__list__person');

    input.addEventListener('keyup', (e) => {
        e.preventDefault();
        let value = input.value;
        chats.forEach((chat) => {
            chat.style.display = "none";

            let name = chat.querySelector('.chat__list__name').innerHTML;
            let filterName = name.toLowerCase().indexOf(value.toLowerCase());

            if(filterName > -1){
                chat.style.display = "grid";
            }
        })
    })
}

//zoekfunctie chat mob

let searchBarMob = document.querySelector('.chat__container--mob');

if(searchBarMob !== null){
    let input = searchBarMob.querySelector('#search-chat');
    let chats = searchBarMob.querySelectorAll('.chat__list__person');

    input.addEventListener('keyup', (e) => {
        e.preventDefault();
        let value = input.value;
        chats.forEach((chat) => {
            chat.style.display = "none";

            let name = chat.querySelector('.chat__list__name').innerHTML;
            let filterName = name.toLowerCase().indexOf(value.toLowerCase());

            if(filterName > -1){
                chat.style.display = "grid";
            }
        })

    })
}

//statuut stopzetten

let statuutForm = document.querySelector('.settings__status-form');
if(statuutForm !== null){
    let input1 = statuutForm.querySelector('.submit1');
    let input2 = statuutForm.querySelector('.submit2');
    let hiddenValue = statuutForm.querySelector('.source');

    input1.addEventListener('click', (e) => {
        e.preventDefault();
        hiddenValue.value = "icecube";
        statuutForm.submit();
    })

    input2.addEventListener('click', (e) => {
        e.preventDefault();
        hiddenValue.value = "stop";
        statuutForm.submit();
    })
}
        
