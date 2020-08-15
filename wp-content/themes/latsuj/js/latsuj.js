window.addEventListener("DOMContentLoaded", function() {
    let body = document.body;
    body.classList.add("show");

    let menu = document.getElementById("menu");
    let sliderLock = false;
    let designSideLeft = document.getElementById("design_side_left");
    let sideLeft = document.getElementById("side_left");
    if(menu) menu.addEventListener("click", menuActionOnClick);

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
        if(sliderLock) return;
        sliderLock=true;
        let parent = e.currentTarget.parentNode;
        let a = parent.getElementsByTagName('a');
        let action = parent.dataset.action;
        let category_ID = parent.dataset.category==undefined || parent.dataset.category=="" ? "undefined" : parent.dataset.category;
        let order = parent.dataset.order;
        let loop = nextLoop(e,parent.dataset.total_loop,parent.dataset.loop,a.length);
        parent.dataset.loop = loop;

        sliderItemInvisble(a);

        let xmlhttp = sliderAjax(loop,action,order,category_ID);
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let categories = JSON.parse(this.response);
                setTimeout(sliderSwitchInformations, 150, a, categories);
                setTimeout(sliderItemVisible, 200, a);
            }
        };
    }

    function nextLoop(e,total_loop,loop,nbr_element) {
        if(e.target.classList.contains('right') && loop*1 + nbr_element>=total_loop) return loop*1 + nbr_element-total_loop;
        if(e.target.classList.contains('right')) return loop*1 + nbr_element;
        if(loop*1 - nbr_element>=0) return loop*1 - nbr_element;
        return total_loop-nbr_element;
    }

    function sliderItemInvisble(a) {
        for(let i=a.length;i--;) {
            setTimeout(function() {
                a[i].classList.add("invisible");
            }, i*100);
        }
    }

    function sliderAjax(loop,action,order,category_ID) {
        let xmlhttp = new XMLHttpRequest();
        console.log(category_ID);
        xmlhttp.open("POST", my_ajax_object.ajax_url+"?action="+action+"&loop="+loop+"&order="+order+"&category="+category_ID, true);
        xmlhttp.send();
        return xmlhttp;
    }

    function sliderSwitchInformations(a,categories) {
        for(let i=a.length;i--;) {
            let h = a[i].children[0];
            a[i].style.backgroundImage = "url('"+categories[i].backgroundImage+"')";
            a[i].href = categories[i].url;
            h.innerHTML = categories[i].innerHTML;
        }
    }

    function sliderItemVisible(a) {
        for(let i=a.length;i--;) {
            setTimeout(function() {
                a[i].classList.remove("invisible");
                sliderLock=false;
            }, i*200);
        }
    }
})

window.addEventListener("load", function() {
    function loadHighQualityImage() {
        const thumbnails = document.querySelectorAll("img.attachment-full");
        const thumbnail_low = thumbnails[0];
        const thumbnail_high = thumbnails[1];
        thumbnail_high.src = thumbnail_low.getAttribute("data-src")
        thumbnail_high.addEventListener('load',function() {
            thumbnail_high.classList.add("show");
        });
    }
    if(document.querySelector("body.single")) loadHighQualityImage();
    if(document.querySelector("body.home")) {
        const thumbnails = document.querySelectorAll("header .lqip.high");
        loadBackgroundHighQualityImages(thumbnails);
    }
})

let activatedVerticalMostRecentPost = false;
let activatedHorizontalMostRecentPost = false;
function loadBackgroundHighQualityImages(thumbnails) {
    for(let i = thumbnails.length;i--;) {
         loadBackgroundHighQualityImage(thumbnails[i]);
    }
}
function loadBackgroundHighQualityImage(thumbnail) {
    thumbnail.src = thumbnail.getAttribute("data-src");
    thumbnail.addEventListener('load',function() {
        thumbnail.classList.add("show");
    });
}

window.addEventListener("scroll", function() {
    let screenYBottom = window.pageYOffset+window.outerHeight;
    const verticalMostRecentPost = document.querySelector("#mb-vertical-posts");
    const horizontalMostRecentPost = document.querySelector("#mb-horizontal-posts");

    if(horizontalMostRecentPost && screenYBottom>horizontalMostRecentPost.offsetTop && !activatedHorizontalMostRecentPost) {
        activatedHorizontalMostRecentPost = true;
        const thumbnails = document.querySelectorAll("#mb-horizontal-posts .lqip.high");
        loadBackgroundHighQualityImages(thumbnails);
    }

    if(verticalMostRecentPost && screenYBottom>verticalMostRecentPost.offsetTop && !activatedVerticalMostRecentPost) {
        activatedVerticalMostRecentPost = true;
        const thumbnails = document.querySelectorAll("#mb-vertical-posts .lqip.high");
        loadBackgroundHighQualityImages(thumbnails);
    }
});
