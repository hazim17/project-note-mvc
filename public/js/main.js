

//-------------------------------------------------------

//For the hamurger navbar
const navSlide = () => {
    const burger = document.querySelector('.burger-btn');
    const nav = document.querySelector('.nav-links');

    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');
    });
}

navSlide();

//-------------------------------------------------------

//Want to create the read more so the content won't offset

// function getContentNote() {
//     //to get the content inside p tag with id "contentnote"
//     let contentnote = document.getElementById("contentnote").innerHTML; 
//     return contentnote;
// }

// function wordCount(str) {  
//     return str.split("").length;
// }

// if(wordCount(getContentNote()) >= 350){
//     //For the read more
//     const addSpanTag = () => {
//     let tag = document.createElement("span");
//     let text = document.createTextNode("");
//     tag.appendChild(text);
//     let element = document.getElementById("");
//     element.appendChild(tag);
// }
// }

// console.log(wordCount(getContentNote()));


//https://stackoverflow.com/questions/33986023/html-how-to-make-a-read-more-button

//https://www.tutorialspoint.com/how-to-add-a-new-element-to-html-dom-in-javascript


//-------------------------------------------------------
// For modal box to insert data & trigger button

const modalBox = () => {
    const modal = document.querySelector(".modal");
    const trigger = document.querySelector(".trigger");
    const closeButton = document.querySelector(".close-button");

    trigger.addEventListener("click", () => {
        modal.classList.toggle("show-modal");
    });

    closeButton.addEventListener("click", () => {
        modal.classList.toggle("show-modal");
    });

    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            toggleModal();
        }
    });
}

modalBox();

//-------------------------------------------------------

// For flash message button

    const closebtn = document.getElementById('closebtn');
    // let alert = document.getElementsByClassName('alert');
    // let displaynone = document.getElementsByClassName('displaynone');

    closebtn.addEventListener("click", () => {
        this.parentElement.style.display = 'none';
    })






