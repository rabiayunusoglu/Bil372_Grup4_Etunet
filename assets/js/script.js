// pane elements
const rightPane = document.getElementById('right-pane')
// TODO: add other panes here

// button and input elements
// TODO: add button/input element selectors here

/* Returns the questions stored in localStorage. */
function getStoredQuestions() {
  if (!localStorage.questions) {
    // default to empty array
    localStorage.questions = JSON.stringify([])
  }

  return JSON.parse(localStorage.questions)
}

/* Store the given questions array in localStorage.
 *
 * Arguments:
 * questions -- the questions array to store in localStorage
 */
function storeQuestions(questions) {
  localStorage.questions = JSON.stringify(questions)
}

// display question form initially
rightPane.appendChild(renderQuestionForm())

// TODO: display question list initially (if there are existing questions)

// TODO: tasks 1-5 and one extension
