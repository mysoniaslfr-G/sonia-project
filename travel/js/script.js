//Toggle Class Active
const navbarNav = document.querySelector(".navbar-nav");
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

//klik diluar saibar untuk menghilangkan nav
const hamburger = document.querySelector("#hamburger-menu");
document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

// JavaScript untuk menutup navbar saat link diklik
document.querySelectorAll(".navbar .navbar-nav a").forEach((link) => {
  link.addEventListener("click", function () {
    document.querySelector(".navbar .navbar-nav").classList.remove("active");
  });
});

// Carousel untuk Gambar dengan Thumbnail
let nextDom = document.getElementById("next");
let prevDom = document.getElementById("prev");
let carouselDom = document.querySelector(".carousel");
let listItemDom = document.querySelector(".carousel .list");
let thumbnailDom = document.querySelector(".thumbnail");

let timeRunning = 3000,
  runTimeOut;

nextDom.onclick = () => showSlider("next");
prevDom.onclick = () => showSlider("prev");

function showSlider(type) {
  let itemSlider = document.querySelectorAll(".carousel .list .item");
  let itemThumbnail = document.querySelectorAll(".thumbnail .item");

  let action = type === "next" ? "appendChild" : "prepend";
  let position = type === "next" ? 0 : itemSlider.length - 1;

  listItemDom[action](itemSlider[position]);
  thumbnailDom[action](itemThumbnail[position]);
  carouselDom.classList.add(type);

  clearTimeout(runTimeOut);
  runTimeOut = setTimeout(
    () => carouselDom.classList.remove("next", "prev"),
    timeRunning
  );
}

function toggleDescription(element) {
  element.classList.toggle("show-description");
}

// Fungsi untuk memunculkan animasi love
function showLove() {
  const loveIcon = document.createElement("div");
  loveIcon.classList.add("love-icon");
  loveIcon.innerHTML = "❤️";
  loveIcon.style.left = `${Math.random() * 100}%`;
  loveIcon.style.top = `${Math.random() * 100}%`;
  document.getElementById("love-container").appendChild(loveIcon);
  setTimeout(() => loveIcon.remove(), 1000);
}

//about selengkapnya
function toggleText() {
  const moreText = document.getElementById("more-text");
  const button = document.getElementById("see-more-btn");
  const isHidden = moreText.style.display === "none";
  moreText.style.display = isHidden ? "block" : "none";
  button.innerText = isHidden ? "Read Less" : "Read More";
}

// Ambil tombol-tombolnya
let scrollDownButton = document.getElementById("scrollDownButton");
let scrollUpButton = document.getElementById("scrollUpButton");

// Menampilkan tombol scroll up ketika halaman digulir lebih dari 200px
window.onscroll = () => {
  scrollUpButton.style.display =
    document.body.scrollTop > 200 || document.documentElement.scrollTop > 200
      ? "block"
      : "none";
};

// Scroll ke bawah ketika tombol scroll down diklik
scrollDownButton.onclick = () =>
  window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });

// Scroll ke atas ketika tombol scroll up diklik
scrollUpButton.onclick = () => window.scrollTo({ top: 0, behavior: "smooth" });
