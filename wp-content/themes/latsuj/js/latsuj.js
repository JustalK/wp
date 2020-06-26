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
    
    let arrow = document.getElementsByClassName("arrow");
    for(let i=arrow.length;i--;) {       
        arrow[i].addEventListener("click", sliderActive);
    }

    function sliderActive(e) {
        clearInterval();
        let parent = e.currentTarget.parentNode;
        let loop = parent.dataset.loop;
        let a = parent.getElementsByTagName('a');
        sliderItemInvisble(a);
        
        let xmlhttp = sliderAjax(loop);
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let categories = JSON.parse(this.response);
                setTimeout(sliderSwitchInformations, 500, a, categories);
                setTimeout(sliderItemVisible, 600, a);
            }
        };
        parent.dataset.loop = parent.dataset.loop*1 + 2;
    }    
    
    function sliderItemInvisble(a) {
        for(let i=a.length;i--;) {
            a[i].classList.add("invisible");
        }
    }
    
    function sliderAjax(loop) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", my_ajax_object.ajax_url+"?action=get_loop_categories&loop="+loop, true);
        xmlhttp.send();
        return xmlhttp;
    }
    
    function sliderSwitchInformations(a,categories) {
        for(let i=a.length;i--;) {
            let h = a[i].children[0];
            a[i].style.backgroundImage = "url('./images/article_2.jpg')";
            h.innerHTML = categories[i].cat_name;
        }
    }
    
    function sliderItemVisible(a) {
        for(let i=a.length;i--;) {
            a[i].classList.remove("invisible");
        }
    }
})