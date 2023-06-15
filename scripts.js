const wrapper = document.querySelector('.wrapper');


const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');


const btnPopup = document.querySelector('.login-popup');


const iconclose = document.querySelector('.icon-close');


registerlink.addEventListener('click', () => {
    wrapper.classList.add('active');
});



loginlink.addEventListener('click', () => {
    wrapper.classList.remove('active');
});



btnPopup.addEventListener('click', () => {
    wrapper.classList.add('active-pupup');
});


iconclose.addEventListener('click', () => {
    wrapper.classList.remove('active-pupup');
});



class MobileNavBar {
    constructor(mobileMenu, navList, navLinks) {

      this.mobileMenu = document.querySelector(mobileMenu);

      this.navList = document.querySelector(navList);

      this.navLinks = document.querySelectorAll(navLinks);

      this.activeClass = "active";

      this.handleClick = this.handleClick.bind(this);

    }

//  animateLinks() {
//
//      this.navLinks.forEach((link) => {
//
//          link.style.animation
//
//    ? (link.style.animation = "")
//      : (link.style.animation = `navLinkFade 0.5s ease fowards 0.3s`);
//
//     });
//      
//    }  


    handleClick() {

      
      this.navList.classList.toggle(this.activeClass);

      this.mobileMenu.classList.toggle(this.activeClass);

//      this.animateLinks();

    }
  
    addClickEvent() {
      this.mobileMenu.addEventListener('click', this.handleClick);
    }
  
    init() {
      if (this.mobileMenu) {
        this.addClickEvent();
      }
      return this;
    }
  }
  
  const mobileNavBar = new MobileNavBar(
    ".mobile-menu",
    ".navigation",
    ".navigation li"
  );
  
  mobileNavBar.init();
  

  