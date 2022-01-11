const closeLists = document.querySelector('.close-show-list');
const allLists = document.querySelector('.show-lists');

closeLists.addEventListener('click', () => {
  allLists.style.display = 'none';
});
