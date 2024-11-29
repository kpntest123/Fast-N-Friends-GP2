<footer>
        <p>&copy; <?php echo date('Y'); ?> Fast 'N Friends. Tous droits réservés.</p>
    </footer>

    
 <script>



    /*PARTIE 4 ==> animation des chiffres*/
    document.addEventListener("DOMContentLoaded", function () {
       const targetNumber = 196;
       const element = document.getElementById("userCount");
       let currentNumber = 0;
       const increment = Math.ceil(targetNumber / 150); // vitesse de progression ici   
       const interval = setInterval(() => {
         currentNumber += increment;
         if (currentNumber >= targetNumber) {
           currentNumber = targetNumber;
           clearInterval(interval);
         }
         element.textContent = currentNumber;
       }, 20); // Ajuste la vitesse de l'animation en ms ici
     });    


</script>

    <?php wp_footer(); ?> <!-- Important pour charger les scripts à la fin de la page -->

</body>
</html> <!-- Fermeture de la balise <body> et <html> -->
