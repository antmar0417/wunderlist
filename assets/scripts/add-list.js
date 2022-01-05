document.getElementById("button").addEventListener("click", function () {
  document.querySelector(".pop-up-add-list").style.display = "flex";
});

document
  .querySelector(".close-add-list")
  .addEventListener("click", function () {
    document.querySelector(".pop-up-add-list").style.display = "none";
  });
