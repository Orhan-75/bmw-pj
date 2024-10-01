// waxti awrro pishan da ba default la field i date 
var today = new Date();

var year = today.getFullYear();
var month = (today.getMonth() + 1).toString().padStart(2, '0');
var day = today.getDate().toString().padStart(2, '0');
var hour = today.getHours().toString().padStart(2, '0');
var minute = today.getMinutes().toString().padStart(2, '0');

var formattedDateTime = `${year}-${month}-${day}T${hour}:${minute}`;

document.getElementById("date-field").value = formattedDateTime;

// validation for source menu 
function validateForm() {
    console.log("Form submitted!"); // Log the message to the console

    const form = document.getElementById("validation"); // Get the form element

    const sourceSelect = form.querySelector("#source-validation"); // Use the correct ID "source-validation"

    console.log("Source value:", sourceSelect.value); // Log the value of the "source" select element

    if (sourceSelect.value === "choose from the menu") {
        // Create the alert element with the icon
        const errorMessage = "You have to choose something from the source menu !!";
        const alertDiv = document.createElement("div");
        alertDiv.style = "display: flex; align-items: center; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; padding: 10px;margin: 10px;";

        const iconSpan = document.createElement("span");
        iconSpan.className = "fas fa-exclamation-circle"; // Font Awesome icon class
        iconSpan.style = "font-size: 24px; margin-right: 10px;";
        alertDiv.appendChild(iconSpan);

        const messageSpan = document.createElement("span");
        messageSpan.innerText = errorMessage;
        alertDiv.appendChild(messageSpan);

        // Append the alert to a specific location on the page (e.g., before the form)
        form.parentNode.insertBefore(alertDiv, form);

        event.preventDefault(); // Prevent form submission
    } else {
        // If the form is valid, submit it programmatically
        form.submit();
    }
}