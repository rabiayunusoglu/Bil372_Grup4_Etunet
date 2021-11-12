/* Creates an HTMLElement to display question form in #main-panel tag. */
function renderQuestionForm() {
  return tag("form", {class: "cf", id: "question-form"}, [
    tag("h2", {}, [
      "Welcome to ",
      tag("span", {}, "Callback Piazza"),
      "!",
    ]),
    tag("p", {}, "Enter a subject and question to get started."),

    tag("div", {}, [
      tag("input", {type: "text", name: "subject", placeholder: "Subject"}, []),
    ]),
    tag("div", {}, [
      tag("textarea", {rows: "5", cols: "40", name: "question", placeholder: "Question"}, []),
    ]),
    tag("input", {type: "submit", class: "btn"}, []),
  ])
}

/* Creates an HTMLElement to display all questions in #left-pane tag.
 *
 * Arguments:
 * questions -- an array of question objects with subject and question fields
 */
function renderQuestions(questions) {
  if (questions.length > 0) {
    const children = questions.map(question => {
      // id represents this question"s identifier in localStorage.
      return tag("div", {class: "list-question question-info", id: question.id}, [
        tag("h3", {}, question.subject),
        tag("p", {}, question.question),
      ])
    })

    return tag("div", {}, children)
  } else {
    return tag("div", {class: "list-question"}, [
      tag("p", {}, "No questions could be found."),
    ])
  }
}


/* Creates an HTMLElement to display the expanded question (question, response
 * form, and responses) in #main-panel tag.
 *
 * Arguments:
 * subject -- the subject text for the question
 * question -- the question text
 * responses -- an array of responses with the name and response fields
 */
function renderExpandedQuestion(questionObj) {
  const subject = questionObj.subject
  const question = questionObj.question
  let responses = questionObj.responses

  if (responses.length === 0) {
    responses = tag("p", {}, "No responses submitted yet!")
  } else {
    responses = responses.map(response => {
      return tag("div", {class: "response"}, [
        tag("h4", {}, response.name),
        tag("p", {}, response.response),
      ])
    })
  }

  return tag("div", {}, [
    tag("h3", {}, "Question"),
    tag("div", {class: "question"}, [
      tag("h4", {}, subject),
      tag("p", {}, question),
    ]),

    tag("div", {class: "resolve-container"}, [
      tag("a", {href: "#", class: "resolve btn"}, "Resolve"),
    ]),

    tag("div", {class: "responses"}, [
      tag("h3", {}, "Responses"),
      tag("div", {}, responses),
    ]),

    tag("form", {class: "cf", id: "response-form"}, [
      tag("h3", {}, "Add Response"),

      tag("div", {}, [
        tag("label", {for: "name"}, "Name"),
        tag("input", {type: "text", name: "name", placeholder: "John Doe"}, []),
      ]),

      tag("div", {}, [
        tag("label", {for: "response"}, "Response"),
        tag("textarea", {rows: "5", cols: "40", name: "response"}, []),
      ]),

      tag("input", {type: "submit", class: "btn"}, []),
    ]),
  ])
}

/* Creates and returns an HTMLElement representing a tag of the given name.
 * attrs is an object, where the key-value pairs represent HTML attributes to
 * set on the tag. contents is an array of strings/HTMLElements (or just
 * a single string/HTMLElement) that will be contained within the tag.
 *
 * Examples:
 * tag('p', {}, 'A simple paragraph') => <p>A simple paragraph</p>
 * tag('a', {href: '/about'}, 'About') => <a href="/about">About</a>
 *
 * tag('ul', {}, tag('li', {}, 'First item')) => <ul><li>First item</li></ul>
 *
 * tag('div', {}, [
 *   tag('h1', {'class': 'headline'}, 'JavaScript'),
 *   ' is awesome, ',
 *   tag('span', {}, 'especially in CS42.')
 * ])
 * => <div>
 *      <h1 class="headline">JavaScript</h1>
 *      is awesome,
 *      <span>especially in CS42.</span>
 *    </div>
 */
function tag(name, attrs, contents) {
  const element = document.createElement(name)
  for (const name in attrs) {
    element.setAttribute(name, attrs[name])
  }

  // If contents is a single string or HTMLElement, make it an array of one
  // element; this guarantees that contents is an array below.
  if (!(contents instanceof Array)) {
    contents = [contents]
  }

  contents.forEach(piece => {
    if (piece instanceof HTMLElement) {
      element.appendChild(piece)
    } else {
      // must create a text node for a raw string
      element.appendChild(document.createTextNode(piece))
    }
  })

  return element
}
