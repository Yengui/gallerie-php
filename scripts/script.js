function changeColor() {
  document.getElementById("hello").style.color = "red";
}

function controle() {
  //controle de longueur de description d'image
  let imageDescriptions = document.getElementsByClassName("img-description");
  console.log(imageDescriptions);
  for (let i = 0; i < imageDescriptions.length; i++) {
    const element = imageDescriptions[i];
    if (element.innerHTML.length > 100) {
      element.innerHTML = element.innerHTML.slice(0, 100) + "...";
    }
  }
}

function voirReactions() {
  const react = document.getElementById("reaction");
  const reactList = document.getElementById("reactionList");

  react.addEventListener("mouseenter", () => {
    reactList.style.display = "flex";
  });
  react.addEventListener("mouseleave", () => {
    reactList.style.display = "none";
  });
}
