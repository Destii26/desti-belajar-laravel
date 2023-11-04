// file.js

document.addEventListener("DOMContentLoaded", function () {
    // Kode JavaScript
    console.log("Halaman telah dimuat sepenuhnya.");
});

function gantiWarna() {
    var body = document.body;
    body.style.backgroundColor = getRandomColor();
}

function getRandomColor() {
    var letters = "0123456789ABCDEF";
    var color = "#";
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
