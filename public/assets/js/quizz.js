var questions = [
    {
        question: "Quel est le nom du plus grand désert du monde ?",
        choices: [
            "Le Sahara", "Le gobi", "L'Antarctique", "Le cerveau d'Eric Zemour"
        ],
        answer: "L'Antarctique"
    },
    {
        question: "Quel est le nom du plus petit pays du monde ?",
        choices: [
            "Monaco", "Le Vatican", "Tellement petit qu'on le vois pas", "Le Je menfouistan"
        ],
        answer: "Le Vatican"
    },
    {
        question: "Quel est le nom du plus long fleuve du monde ?",
        choices: [
            "L'Amazone", "La Vologne", "Le Nil", "Le Fleuve"
        ],
        answer: "L'Amazone"
    },
    {
        question: "Quel est le résultat de l'opération mathématique suivante : 1 + 1 ?",
        choices: [
            "11", "9", "5", "7778"
        ],
        answer: "2"
    }, {
        question: "Quel est le sport le plus populaire en France ?",
        choices: [
            "Le curling", "Le football", "Le curling", "Le curling"
        ],
        answer: "Le football"
    }
];


var score = 0;


var currentQuestion = 0;


var container = document.querySelector(".container");


function displayQuestion() {
    container.innerHTML = "";


    var question = questions[currentQuestion].question;
    var choices = questions[currentQuestion].choices;


    var questionElement = document.createElement("p");
    questionElement.className = "question";
    questionElement.textContent = question;
    container.appendChild(questionElement);


    var choicesElement = document.createElement("ul");
    choicesElement.className = "choices";
    container.appendChild(choicesElement);


    for (var i = 0; i < choices.length; i++) {
        var choiceElement = document.createElement("li");
        choiceElement.className = "choice";

        // Créer un élément <input> de type radio pour le choix
        var inputElement = document.createElement("input");
        inputElement.type = "radio";
        inputElement.name = "choice";
        inputElement.value = choices[i];


        var labelElement = document.createElement("label");
        labelElement.textContent = choices[i];


        choiceElement.appendChild(inputElement);
        choiceElement.appendChild(labelElement);

        choicesElement.appendChild(choiceElement);
    }


    var buttonElement = document.createElement("button");
    buttonElement.className = "validate";
    buttonElement.textContent = "Valider";
    container.appendChild(buttonElement);


    buttonElement.addEventListener("click", checkAnswer);
}

function checkAnswer() {
    var buttonElement = document.querySelector(".validate");


    var selectedChoice = document.querySelector("input[name='choice']:checked");


    if (selectedChoice == null) {
        alert("Veuillez sélectionner une réponse !");
    } else {
        var selectedValue = selectedChoice.value;

        var correctAnswer = questions[currentQuestion].answer;


        if (selectedValue == correctAnswer) {
            score++;
        }


        buttonElement.disabled = true;


        setTimeout(nextQuestion, 10);
    }
}


function nextQuestion() {
    currentQuestion++;


    if (currentQuestion < questions.length) {
        displayQuestion();
    } else {
        displayResult();
    }
}

function displayResult() {
    container.innerHTML = "";


    var resultElement = document.createElement("p");
    resultElement.className = "result";


    if (score >= 3) {
        resultElement.textContent = "Bravo, tu as réussi le quizz ! Tu as obtenu " + score + " bonnes réponses sur " + questions.length + ".";
    } else {
        resultElement.textContent = "Tu as échoué au quiz, ta lettre destinée au Père Noël sera envoyée à Yavuz Kutuk, 67000 Strasbourg, ça t’apprendra à ne pas travailler à l’école !!! Tu as obtenu " + score + " bonnes réponses sur " + questions.length + ".";
    } container.appendChild(resultElement);
}

displayQuestion();