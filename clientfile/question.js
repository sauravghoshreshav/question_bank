// function addQuestion() {
//     const questionContainer = document.getElementById("questionContainer");
//     const questionTemplate = document.createElement("div");
//     questionTemplate.classList.add("question"); // Add the "question" class to the new question div

//     // Construct the HTML for the question
//     questionTemplate.innerHTML = `
//         <label for="type">select question type:</label>            
//         <select name="type" id="type">
//             <option value="">--Type--</option>
//             <option value="">MCQ</option>
//             <option value="">Subjective</option>
//         </select><br>



//         <label>Question:</label>
//         <textarea rows="2" cols="60" name="questions[]" placeholder="Type here..." oninput="adjustTextarea(this)"></textarea><br>
//         <span style="padding-right:35px">Mark:</span>
//         <input type="text" name="marks[]" placeholder="Marks"><br>
//         <button type="button" onclick="removeQuestion(this)">Remove</button>
//         <br><br>
//     `;

//     questionContainer.appendChild(questionTemplate);
// }

// function removeQuestion(button) {
//     const questionDiv = button.parentElement;
//     const questionContainer = document.getElementById("questionContainer");
//     questionContainer.removeChild(questionDiv);
// }

// function adjustTextarea(textarea) {
//     textarea.style.height = "auto";
//     textarea.style.height = (textarea.scrollHeight) + "px";
// }

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

document.getElementById('type').addEventListener('change', function() {
    var x = this.value; // 'this' refers to the element that triggered the event
    alert(x);
  });