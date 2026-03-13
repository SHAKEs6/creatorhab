// script.js

document.addEventListener('DOMContentLoaded', () => {
    // 1. Navbar Scroll Effect
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.style.background = 'rgba(15, 15, 15, 0.95)';
            navbar.style.boxShadow = '0 10px 30px rgba(0,0,0,0.5)';
        } else {
            navbar.style.background = 'rgba(15, 15, 15, 0.85)';
            navbar.style.boxShadow = 'none';
        }
    });

    // 2. Reveal Sections on Scroll (Intersection Observer)
    const revealElements = document.querySelectorAll('.card, .section-header, .consultation-box');
    
    // Initial hidden state
    revealElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
    });

    const revealOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const revealOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
            observer.unobserve(entry.target);
        });
    }, revealOptions);

    revealElements.forEach(el => revealOnScroll.observe(el));

    // 3. Interactive Calendar Mockup
    const days = document.querySelectorAll('.cal-grid .day:not(.fade)');
    days.forEach(day => {
        day.addEventListener('click', () => {
            document.querySelector('.cal-grid .day.active')?.classList.remove('active');
            day.classList.add('active');
        });
    });

    const timeBtns = document.querySelectorAll('.time-btn');
    timeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelector('.time-btn.active')?.classList.remove('active');
            btn.classList.add('active');
        });
    });

    // 4. Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if(targetId === '#') return;
            const target = document.querySelector(targetId);
            if(target) {
                const navHeight = document.querySelector('.navbar').offsetHeight;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navHeight;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});
