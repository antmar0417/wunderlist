const button = document.getElementById('open-button');
const popUpList = document.querySelector('.pop-up-add-list');
const closeAddList = document.querySelector('.close-add-list');
const popUpAddList = document.querySelector('.pop-up-add-list');
let count = 0;

button.addEventListener('click', () => {
  count++;
  counter.textContent = count;
});
