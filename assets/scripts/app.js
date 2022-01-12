const closeLists = document.querySelector('.close-show-list');
const allLists = document.querySelector('.show-lists');

if (closeLists) {
  closeLists.addEventListener('click', () => {
    allLists.style.display = 'none';
  });
}
