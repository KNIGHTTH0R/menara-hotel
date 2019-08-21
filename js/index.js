var no = 0;

function slideshow() {
    no++;
    switch (no) {
        case 1:
            document.getElementById("imgc").src = "images/1.jpg";
            break;
        case 2:
            document.getElementById("imgc").src = "images/2.jpg";
            break;
        case 3:
            document.getElementById("imgc").src = "images/3.jpg";
            break;
        case 4:
            document.getElementById("imgc").src = "images/4.jpg";
            no = 0;
            break;
    }
}

function load() {
    setInterval(slideshow, 5000);
}