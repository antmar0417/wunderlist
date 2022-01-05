const openButton = document.getElementById('open-button');
const popUpList = document.querySelector('.pop-up-add-list');
const closeAddList = document.querySelector('.close-add-list');
let count = 0;

openButton.addEventListener('click', () => {
  count++;
});
