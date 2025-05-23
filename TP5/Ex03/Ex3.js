const Questions = [
    ["Quelle est la capitale de la France ?", "Paris"],
    ["Quel est le plus grand pays du monde ?", "Russie"],
    ["Quand a eu lieu la Révolution française ?", "1789"], 
    ["Quand le Maroc a-t-il obtenu son indépendance ?", "1956"],
    ["Quelle bataille a marqué la fin de Napoléon ?", "Waterloo"],
    ["Qui a découvert la gravité ?", "Newton"],
    ["Quelle période a suivi le Moyen Âge ?", "Renaissance"],
    ["Combien de films 'Harry Potter' y a-t-il ?", "8"],
    ["Qui interprète Jack Sparrow ?", "Johnny Depp"],
    ["Quel groupe a chanté 'Bohemian Rhapsody' ?", "Queen"],
    ["Qui est le réalisateur de « Howl's Moving Castle » ?", "Hayao Miyazaki"]
    ["Quel jeu vidéo met en scène un plombier moustachu ?", "Super Mario"],
];

function lancerQuiz() {
    let score = 0;
    
    for (let i = 0; i < Questions.length; i++) {
        let question = Questions[i][0];
        let rightAnswer = Questions[i][1];
        let userAnswer = prompt(question);
        
        if (userAnswer !== null) {
            if (userAnswer.trim().toLowerCase() === rightAnswer.trim().toLowerCase()) {
                alert("Réponse juste !");
                score++;
            } else {
                alert(`Réponse fausse ! La bonne réponse était : ${rightAnswer}`);
            }
        } else {
            alert("Question sautée.");
        }
    }
    
    alert(`Vous avez répondu correctement à ${score} questions sur ${Questions.length}.`);
}