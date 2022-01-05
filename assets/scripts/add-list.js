document.getElementById('button').addEventListener('click', () => {
  document.querySelector('.pop-up-add-list').style.display = 'flex';
});

document.querySelector('.close-add-list').addEventListener('click', () => {
  document.querySelector('.pop-up-add-list').style.display = 'none';
});
