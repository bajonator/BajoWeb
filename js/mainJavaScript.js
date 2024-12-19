
window.addEventListener('DOMContentLoaded', function() {
    document.body.classList.add('startSiteOne');

    setTimeout(function() {
        document.querySelector('header').classList.add('headerUp');
    }, 2000);
    setTimeout(function() {
        document.querySelector('.descriptionFirst').classList.add('greating');
    }, 2800);
        setTimeout(function() {
        var descriptionsLeft = document.querySelectorAll(".descriptionLeft");
        descriptionsLeft.forEach(function(description) {
            description.classList.add("slide-left");
        });
        var descriptionsRight = document.querySelectorAll(".descriptionRight");
        descriptionsRight.forEach(function(description) {
            description.classList.add("slide-right");
        });
    }, 3600);
    setTimeout(function() {
        document.querySelector('.descriptionContact').classList.add('slide-right');
    }, 3600);
});

function showEnlarged(element) {
    const enlargedImage = document.getElementById("enlargedImage");
    const enlargedImageSrc = document.getElementById("enlargedImageSrc");

    enlargedImageSrc.src = element.src;
    enlargedImage.style.display = "flex";

    enlargedImageSrc.classList.remove("enlarged");
    
    setTimeout(function () {
        enlargedImageSrc.classList.add("enlarged");
    }, 10); 
}

function hideEnlarged() {
    const enlargedImage = document.getElementById("enlargedImage");
    const enlargedImageSrc = document.getElementById("enlargedImageSrc");
    enlargedImageSrc.classList.remove("enlarged");
    setTimeout(function () {
        enlargedImage.style.display = "none";
    }, 200); 
}
const enlargedImage = document.getElementById("enlargedImage");
enlargedImage.addEventListener("click", hideEnlarged);