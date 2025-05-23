function deviner() {
let ranNum = Math.random();
ranNum = Math.floor(ranNum * 10) + 1;
let score = 0;
let devine;
do {
    devine = prompt("Devinez un nombre entre 1 et 10 :");
    if (devine === null) {
        alert("Vous avez annulé le jeu. Redémarrage...")
        window.location.reload();
            return;
    }
    devine = parseInt(devine);
    if (isNaN(devine)) {
        alert("Veuillez entrer un nombre valide !");
        continue;
    }
    score++;
    if (devine < ranNum) {
        alert("Le nombre à deviner est plus grand !");
    }
    else if (devine > ranNum) {
        alert("Le nombre à deviner est plus petit !");
    }
    else {
        alert(`Vous avez deviné ${ranNum} en ${score} tentatives.`);
    }
} while (devine !== ranNum);

}