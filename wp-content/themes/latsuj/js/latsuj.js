document.addEventListener("DOMContentLoaded", function() {
    let menu = document.getElementById("menu");
    let designSideLeft = document.getElementById("design_side_left");
    let sideLeft = document.getElementById("side_left");
    menu.addEventListener("click", menuActionOnClick);

    function menuActionOnClick() {
        if(!menu.classList.contains('active')) return menuActive();
        if(menu.classList.contains('active')) return menuDesactive();
    }
    
    function menuActive() {
        menu.classList.add("active");
        designSideLeft.classList.add("right");
        sideLeft.classList.add("right");
    }
    
    function menuDesactive() {
        menu.classList.remove("active");
        designSideLeft.classList.remove("right");
        sideLeft.classList.remove("right");
    }
})