import { Tooltip, Toast,Modal,Offcanvas} from 'bootstrap';

let isClosed = false;
let lastScrollTop = 0;
let body=document.querySelector("body");
let burgerMenu = document.querySelector("#hamburger")
let btnLanguage=document.querySelectorAll('.navbar-custom__btn-language');
let btnToggler=document.querySelector('.navbar-custom__toggler');
const dropdowns = document.querySelectorAll(".dropdown")


window.addEventListener("load", (event) => {
	if (window.innerWidth >=992 ) {
        hoverDropdown();
  }
  // gsap.fromTo(
  //   ".preloader",
  //   { duration:1, autoAlpha:1},
  //   { duration:1, autoAlpha:0}
  // );
});

window.addEventListener("resize", function(){
    if (window.innerWidth >=992 ) {
		hoverDropdown();
	}
});

btnToggler.addEventListener('click', ()=>{  
  burgerTime() 
});

//3. Function Area
function burgerTime() {
  if (isClosed== true) {
      closeSideMenu();
  } else {
      openSideMenu()
  }
}

function openSideMenu(){
  burgerMenu.classList.remove("closed");
  burgerMenu.classList.add("open");
  body.classList.add('no-scroll');
  isClosed = true;
}

function closeSideMenu(){
  burgerMenu.classList.remove("open");
  burgerMenu.classList.add("closed");
  body.classList.remove('no-scroll');
  isClosed  = false;
}

function hoverDropdown(){
    for (const dropdown of dropdowns) {
        dropdown.addEventListener('mouseenter', function(event) {
            let target=event.target
            let dropdownToggle=target.querySelector('.dropdown-toggle')
            let dropdownMenu=target.querySelector('.dropdown-menu')
            target.classList.add('show');
            dropdownToggle.classList.add('show');
            dropdownMenu.classList.add('show');
        })
        dropdown.addEventListener('mouseleave', function(event) {
            let target=event.target
            let dropdownToggle=target.querySelector('.dropdown-toggle')
            let dropdownMenu=target.querySelector('.dropdown-menu')
            target.classList.remove('show');
            dropdownToggle.classList.remove('show');
            dropdownMenu.classList.remove('show');
        })
    }
}




