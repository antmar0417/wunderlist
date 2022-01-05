const button = document.getElementById('button');
const popUpList = document.querySelector('.pop-up-add-list');
const closeAddList = document.querySelector('.close-add-list');
const popUpAddList = document.querySelector('.pop-up-add-list');

button.addEventListener('click', () => {
  popUpList.style.display = 'flex';
});

closeAddList.addEventListener('click', () => {
  popUpAddList.style.display = 'none';
});
