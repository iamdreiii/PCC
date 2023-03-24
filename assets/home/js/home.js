
const homes = document.querySelectorAll('.pcc_home');
const dots = document.querySelectorAll('.dot');
let currentHome = 0;

function showHome(index) {
  homes.forEach(home => home.classList.remove('active'));
  dots.forEach(dot => dot.classList.remove('active'));
  homes[index].classList.add('active');
  dots[index].classList.add('active');
  currentHome = index;
}

function nextHome() {
  currentHome++;
  if (currentHome >= homes.length) {
    currentHome = 0;
  }
  showHome(currentHome);
}

let intervalId = setInterval(nextHome, 5000);

dots.forEach((dot, index) => {
  dot.addEventListener('click', () => {
    clearInterval(intervalId);
    showHome(index);
    intervalId = setInterval(nextHome, 5000);
  });
});
