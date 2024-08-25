import _ from 'lodash';
console.log(_.join(['Index', 'module', 'loaded!'], ' '));

import '../scss/styles.scss';
import 'aos/dist/aos.css';

import Typed from 'typed.js';
import Waypoint from 'waypoints/lib/noframework.waypoints';

import { openNav, closeNav } from './nav.js';


/* -------------------------------------------------------
                   Offcanvas menu
---------------------------------------------------------*/
document.getElementById("hamburger").addEventListener("click", openNav);
document.querySelector(".closebtn").addEventListener("click", closeNav);


/* -------------------------------------------------------
              Easy selector helper function
---------------------------------------------------------*/
(function () {
  "use strict";
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /* -------------------------------------------------------
                        Hero type effect
    ---------------------------------------------------------*/
  const typed = select('.typed')
  if (typed) {
    let typed_strings = typed.getAttribute('data-typed-items')
    typed_strings = typed_strings.split(',')
    new Typed('.typed', {
      strings: typed_strings,
      loop: true,
      typeSpeed: 100,
      backSpeed: 50,
      backDelay: 2000
    });
  }



  /* -------------------------------------------------------
                  Animation on scroll
  ---------------------------------------------------------*/
  document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
      duration: 3000,
      easing: 'ease-in-out',
      once: true,
      mirror: false,
    });
  });

  /* -------------------------------------------------------
              Easy event listener function
  ---------------------------------------------------------*/
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /* -------------------------------------------------------
              Easy on scroll event listener 
  ---------------------------------------------------------*/

  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }


  /* -------------------------------------------------------
              Navbar links active state on scroll
  ---------------------------------------------------------*/
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)


  /* -------------------------------------------------------
            Scrolls to an element with header offset
  ---------------------------------------------------------*/
  const scrollto = (el) => {
    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos,
      behavior: 'smooth'
    })
  }

  /* -------------------------------------------------------
                      Back to top button
  ---------------------------------------------------------*/
  document.addEventListener("DOMContentLoaded", function () {
    const backToTopButton = document.getElementById("backToTop");

    // Function to smoothly scroll to the top of the page
    const scrollToTop = () => {
      const c = document.documentElement.scrollTop || document.body.scrollTop;
      if (c > 0) {
        window.requestAnimationFrame(scrollToTop);
        window.scrollTo(0, c - c / 30); // Adjust the speed by changing the value
      }
    };

    // Add click event listener to back-to-top button
    if (backToTopButton) {
      backToTopButton.addEventListener("click", function (e) {
        e.preventDefault();
        scrollToTop();
      });
    }

    // Show/hide back-to-top button based on scroll position
    window.addEventListener("scroll", function () {
      const backToTopButton = document.getElementById("backToTop");

      if (backToTopButton) {
        if (window.scrollY > 100) { // Adjust the scroll position threshold as needed
          backToTopButton.classList.add("active");
        } else {
          backToTopButton.classList.remove("active");
        }
      }
    });
  });

  /* -------------------------------------------------------
    Scrool with ofset on links with a class name .scrollto
  ---------------------------------------------------------*/
  on('click', '.scrollto', function (e) {
    if (select(this.hash)) {
      e.preventDefault()

      let body = select('body')
      if (body.classList.contains('mobile-nav-active')) {
        body.classList.remove('mobile-nav-active')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)


  /* -------------------------------------------------------
   Scroll with ofset on page load with hash links in the url
  ---------------------------------------------------------*/
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });


  /* -------------------------------------------------------
                    Skills animation
  ---------------------------------------------------------*/
  let skilsContent = select('.skills-content');
  if (skilsContent) {
    new Waypoint({
      element: skilsContent,
      offset: '80%',
      handler: function (direction) {
        let progress = select('.progress .progress-bar', true);
        progress.forEach((el) => {
          el.style.width = el.getAttribute('aria-valuenow') + '%'
        });
      }
    })
  }


  /* -------------------------------------------------------
                  Porfolio isotope and filter
  ---------------------------------------------------------*/

  const portfolioItems = document.querySelectorAll('.portfolio-item');

  const options = {
    root: null,
    threshold: 0.2
  };

  const callback = (entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('fade-in');
        observer.unobserve(entry.target);
      }
    });
  };

  const observer = new IntersectionObserver(callback, options);

  portfolioItems.forEach(item => {
    observer.observe(item);
  });

})()
