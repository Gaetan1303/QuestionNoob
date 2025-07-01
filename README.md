# QuestionNoob
/**
 * Charge la liste des questions du quiz.
 *
 * @return array Liste des questions, chaque question étant un tableau contenant :
 *               - l'intitulé de la question (string)
 *               - un tableau de propositions de réponses (array)
 *               - l'indice de la bonne réponse (int, 1-based)
 */
function chargerQuestions() { ... }

/**
 * Lance le jeu du quiz interactif en console.
 *
 * - Affiche le score précédent (chargé depuis un fichier).
 * - Mélange et pose les questions à l'utilisateur.
 * - Gère la saisie utilisateur et le calcul du score.
 * - Affiche le score final et le pourcentage de bonnes réponses.
 * - Propose de rejouer à la fin de la partie.
 *
 * @return void
 */
function jouerQuiz() { ... }
