// Start program
console.log("Start program");

// Check connection
if (navigator.onLine) {
  console.log("Connection: OK");
} else {
  console.log("Connection: ERROR");
  alert("Отсутствует подключение к интернету");
}

// Switch forms
if (document.title.includes("Учет бытовой техники")) {
  let btnGoToReg = document.getElementById("goToReg");
  let btnGoToAuth = document.getElementById("goToAuth");

  let formReg = document.querySelector(".form.reg");
  let formAuth = document.querySelector(".form.auth");

  btnGoToReg.addEventListener("click", (e) => {
    e.preventDefault();

    formReg.classList.remove("disabled");
    formAuth.classList.add("disabled");
  });
  btnGoToAuth.addEventListener("click", (e) => {
    e.preventDefault();

    formAuth.classList.remove("disabled");
    formReg.classList.add("disabled");
  });

  if (formReg) {
    let formSelect = document.getElementById("userTypeSelect");

    let gridToFiz = document.getElementById("dataOfFiz");
    let gridToUri = document.getElementById("dataOfUri");

    formSelect.addEventListener("change", function () {
      if (formSelect.value === "1") {
        gridToUri.classList.add("disabled");
        disableInputs(gridToUri);
        gridToFiz.classList.remove("disabled");
        enableInputs(gridToFiz);
      } else if (formSelect.value === "2") {
        gridToFiz.classList.add("disabled");
        disableInputs(gridToFiz);
        gridToUri.classList.remove("disabled");
        enableInputs(gridToUri);
      }
    });

    function disableInputs(formGrid) {
      const inputs = formGrid.getElementsByTagName("input");
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].disabled = true;
      }
    }
    function enableInputs(formGrid) {
      const inputs = formGrid.getElementsByTagName("input");
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
      }
    }
  }
}
