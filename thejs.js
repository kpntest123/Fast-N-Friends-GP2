/*
document.addEventListener("DOMContentLoaded", function() {
  const targetNumber = 196;
  const element = document.getElementById("userCount");
  let currentNumber = 0;
  const increment = Math.ceil(targetNumber / 100); // Ajuste la vitesse de progression ici

  const interval = setInterval(() => {
    currentNumber += increment;
    if (currentNumber >= targetNumber) {
      currentNumber = targetNumber;
      clearInterval(interval);
    }
    element.textContent = currentNumber;
  }, 30); // Ajuste la vitesse de l'animation en ms ici
});
*/