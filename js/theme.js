// Executa assim que a página carrega
document.addEventListener("DOMContentLoaded", () => {
  const temaSalvo = localStorage.getItem("tema");
  
  // Aplica o tema salvo imediatamente
  if (temaSalvo === "dark") {
    document.body.classList.add("dark-mode", "tema-noturno");
  }

  // Procura o botão pelo ID ou pela classe da foto (o solzinho)
  const btnDark = document.getElementById("btn-dark-mode") || document.querySelector(".btn-tema");

  if (btnDark) {
    btnDark.addEventListener("click", () => {
      document.body.classList.toggle("dark-mode");
      document.body.classList.toggle("tema-noturno");

      const eEscuro = document.body.classList.contains("dark-mode");
      localStorage.setItem("tema", eEscuro ? "dark" : "light");
    });
  }
});
