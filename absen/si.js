const weekday = ["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"];
let buka = document.getElementById("buka");
let tutup = document.getElementById("tutup");


const d = new Date();
let day = weekday[d.getDay()];

if (day == "Selasa") {
    tutup.innerHTML = "";
} else {
    buka.innerHTML = "";
}