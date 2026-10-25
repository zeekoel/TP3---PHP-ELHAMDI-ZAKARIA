<hr>
    <footer>
        <p>&copy; 2026 - <?= ETABLISSEMENT ?></p>
        <p>Date du jour : <strong><?= date('d/m/Y') ?></strong></p>
        
        <?php
        // Calcul du nombre de jours restants avant la fin du semestre (ex: 31 janvier 2027)
        $aujourdhui = new DateTime();
        $fin_semestre = new DateTime('2027-01-31');
        $intervalle = $aujourdhui->diff($fin_semestre);
        
        if ($aujourdhui < $fin_semestre) {
            echo "<p>Il reste <strong>" . $intervalle->format('%a') . " jours</strong> avant la fin du semestre.</p>";
        } else {
            echo "<p>Le semestre est terminé.</p>";
        }
        ?>
    </footer>
</body>
</html>