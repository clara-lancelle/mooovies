// burger menu

document.addEventListener('click', (e) => {
    if(e.target.id == 'menuBtn' || e.target.id.match('line')) {
        menuBtn.classList.toggle("active");
        line1.classList.toggle("active");
        line2.classList.toggle("active");
        line3.classList.toggle("active");
        menubar.classList.toggle("show");
    }
})

