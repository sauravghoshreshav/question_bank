var id=1;
const questionContainer=document.getElementById("questionContainer");

// newDiv.attr('id', 'myDynamicDiv');


$(document).ready(function(){
  alert("Jquery");
  var q1div = $('<div>');
  q1div.attr("id", "q1");

  var lb1 = $('<label>');
  lb1.text('Select Question type');

  var select1 = $('<select>');
  select1.attr("id", "s1");

  for (var i = 0; i < 3; i++) {
    var option = $('<option>');
    if (i === 0) {
      option.text('Select question Type');
    } else if (i === 1) {
      option.text('Objective');
      option.attr("value", 'Objective');
      option.attr("onclick", "addQuestion1()")
    } else if (i === 2) {
      option.text('Subjective');
      option.attr("value", 'Subjective');
    }
    select1.append(option);
  }
  var inputContainer=$("<div>");
  inputContainer.attr("id","q11");

  $('#questionContainer').append(q1div);
  $('#q1').append(lb1);
  $('#q1').append(select1);
});

// q1.innerHTML=`
// <label for="type">select question type:</label>
// <select onchange="addQuestion1()" name="type" id="select`+ id +`" class="type">
//     <option value="">--Type--</option>
//     <option value="objective">Objective</option>
//     <option value="subjective">Subjective</option>
// </select><br>
// <div id="InputContainer`+ id +`"></div>
// `;



function addQuestion1(id,){
  alert("called");
  var value=document.getElementById("type").value;
  alert(value);

  const questionTemplate = document.getElementById("InputContainer");
  alert(questionTemplate);
  if(value=="objective"){
    questionTemplate.innerHTML=`<label>Question:</label>
    <textarea rows="2" cols="60" name="questions[]" placeholder="Type Question" oninput="adjustTextarea(this)"></textarea><br>`;
    for (var i = 0; i < 4; i++) {
      var textBoxInput = document.createElement('input');
      textBoxInput.type = 'text';
      textBoxInput.name = 'box'+i;
      textBoxInput.placeholder = 'Option';
      questionTemplate.appendChild(textBoxInput);
      var lineBreak = document.createElement('br');
      questionTemplate.appendChild(lineBreak);
      }
    var btn= document.createElement('button');
    btn.onclick='removeQuestion(this)';
    btn.innerHTML='REMOVE';
    btn.class='removeBtn';
    btn.style='background:red;color: white;';
    questionTemplate.appendChild(btn);
  // document.getElementById("questionContainer").appendChild()  
  // questionContainer.appendChild(questionTemplate);
  }

};

// function handleQuestionType() {
//   var questionTypeSelect = $('#type');
//   var additionalInputContainer = $('#InputContainer');

//   // Clear previous additional input
//   additionalInputContainer.empty();

//   if (questionTypeSelect.val() === 'objective') {
//     // Create a textbox input for MCQ
//     for (var i = 0; i < 4; i++) {
//       var textBoxInput = $('<input>').attr({
//         type: 'text',
//         name: 'mcqTextBox' + i,
//         placeholder: 'Option'
//       });
//       additionalInputContainer.append(textBoxInput).append('<br>');
//     }
//   }
// }

  //  $(document).ready(function(){});

// $(document).on("change","#type",function(){
//     var selectedOption = $(this).val();   // Get the selected option's value
//     if (selectedOption === 'objective') {
//       alert('You selected: ' + selectedOption);
//     }
//     // Display an alert with the selected option
//     else alert('subjective');
// });

function removeQuestion(button) {
    const questionDiv = this.parentElement;
    const questionContainer = document.getElementById("questionContainer");
    questionContainer.removeChild(questionDiv);
}

function adjustTextarea(textarea) {
    textarea.style.height = "auto";
    textarea.style.height = (textarea.scrollHeight) + "px";
}

// function xyz()
// {
//     document.addEventListener('DOMContentLoaded', function() {
//         // Get the dropdown element
//         var dropdown = document.getElementById('type');
//         // Attach change event to the dropdown
//         dropdown.addEventListener('change', function() {
//           // Get the selected option value
//           var selectedOption = dropdown.value;
      
//           // Display an alert with the selected option
//            alert('You selected: ' + selectedOption);
//          });
//       });
// }

// $(document).on("change","#type",function(){
//     var x=$("#type").val();
//     alert(x);
// });

// document.getElementById('type').addEventListener('change', function() {
//     var x = this.value; // 'this' refers to the element that triggered the event
//     alert(x);
//   });

