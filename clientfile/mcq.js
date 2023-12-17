function handleQuestionType() {
    var questionTypeSelect = document.getElementById('questionType');
    var additionalInputContainer = document.getElementById('additionalInputContainer');
  
    // Clear previous additional input
    additionalInputContainer.innerHTML = '';
  
    if (questionTypeSelect.value === 'mcq') {
      // Create a textbox input for MCQ
      for (var i = 0; i < 4; i++) {
      var textBoxInput = document.createElement('input');
      textBoxInput.type = 'text';
      textBoxInput.name = 'mcqTextBox'+i;
      textBoxInput.placeholder = 'Option';
      additionalInputContainer.appendChild(textBoxInput);
      var lineBreak = document.createElement('br');
      additionalInputContainer.appendChild(lineBreak);
      }
      
    }

  }
  
  // function addOption() {
  //   var additionalInputContainer = document.getElementById('additionalInputContainer');
  
  //   // Create a new textbox input for MCQ option
  //   var optionInput = document.createElement('input');
  //   optionInput.type = 'text';
  //   optionInput.name = 'mcqOption';
  //   optionInput.placeholder = 'Enter MCQ Option';
  //   additionalInputContainer.appendChild(optionInput);
  // }