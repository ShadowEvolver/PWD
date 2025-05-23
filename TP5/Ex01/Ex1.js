function calculer() {
    let n1, n2, s, d, p, q;
    n1 = parseFloat(prompt("Saisir le premier numéro :"));
    n2 = parseFloat(prompt("Saisir le deuxième numéro :"));
    s = n1 + n2;
    d = n1 - n2;
    p = n1 * n2;
    if (n2 !== 0) {
        q = n1 / n2;
    }
    else {
        q = "La division par zéro est indéfinie";
    }
    alert(
        `La somme est : ${s}\n\nLa difference est : ${d}\n\nLe produit est : ${p}\n\nLe quotient est : ${q}`
    )
}