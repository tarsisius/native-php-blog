
let currentStep = 0;
let steps = [
  ":(",
  ":&lt;",
  ":-",
  ":&gt;",
  ":)",
  ":|",
  ":v",
  "-,-"
];
let span = document.querySelector(".emtcn");
let ham = document.querySelector(".ham");
let topNav = document.querySelector(".nav--top");

function animateStep() {
  span.innerHTML = steps[currentStep];
  currentStep += 1;
  if (currentStep >= steps.length) currentStep = 0;
}

function hamburg() {
  topNav.classList.toggle("active");
  ham.classList.toggle("clicked");
}

setInterval(animateStep, 200);
ham.addEventListener('click', hamburg, false);


