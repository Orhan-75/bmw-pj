function deleteRecord(recordId) {
    // Custom Confirmation Box
    let confirmBox = document.createElement('div');
    confirmBox.style = 'position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #FF6600; color: #FFF; border-radius: 10px; padding: 15px; box-shadow: 0px 0px 10px #aaa; font-size: 16px; text-align: center;';

    let confirmText = document.createElement('span');
    confirmText.innerHTML = 'Are you sure you want to delete this record ?';
    confirmText.style = 'font-weight: normal; font-size: 20px;';
    confirmBox.appendChild(confirmText);

    let confirmBtns = document.createElement('div');
    confirmBtns.style = 'display: flex; justify-content: center; margin-top: 10px;';

    let yesBtn = document.createElement('button');
    yesBtn.type = 'button';
    yesBtn.className = 'btn btn-outline-secondary';
    yesBtn.style = 'width: 32px; height: 30px;padding: 2px 1px 1px 3px; font-size: 14px; font-weight: bold; border-radius: 50%; background-color: #FFF; color: #FF6600; text-align: center; cursor: pointer; border: none; margin-right: 10px;';
    yesBtn.innerHTML = 'Yes';
    yesBtn.addEventListener('click', function () {
        // Perform AJAX request to delete the record
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/delete_record.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Response received
                var response = xhr.responseText.trim();
                if (response.startsWith("success|")) {
                    // Extract the updated table content from the response
                    var updatedTableContent = response.substring("success|".length);

                    // Update the table with the new content
                    document.getElementById("table-container").innerHTML = updatedTableContent;
                } else {
                    alert("Failed to delete the record.");
                }
            }
        };
        xhr.send("record_id=" + encodeURIComponent(recordId));

        // Remove the confirmation box
        confirmBox.remove();
    });
    confirmBtns.appendChild(yesBtn);

    let noBtn = document.createElement('button');
    noBtn.type = 'button';
    noBtn.className = 'btn btn-outline-secondary';
    noBtn.style = 'width: 32px; height: 30px;padding: 2px 1px 1px 3px; font-size: 14px; font-weight: bold; border-radius: 50%; background-color: #FFF; color: #FF6600; text-align: center; cursor: pointer; border: none; margin-left: 10px;';
    noBtn.innerHTML = 'No';
    noBtn.addEventListener('click', function () {
        // Remove the confirmation box
        confirmBox.remove();
    });
    confirmBtns.appendChild(noBtn);

    confirmBox.appendChild(confirmBtns);

    // Append the confirmation box to the body
    document.body.appendChild(confirmBox);
}
// end of deleting record

// start of editing record 
$(document).ready(function () {
    // Handle "Edit" button click using event delegation
    $(document).on('click', '.edit-btn', function () {
      var $row = $(this).closest('tr'); // Get the parent row of the button

      var recordId = $(this).data('record-id'); // Get the unique ID of the record from the button's data attribute
      console.log("Record ID: " + recordId); // Check the recordId value

      // Set the record ID in the hidden input field inside the modal
      $('#record_id').val(recordId);

      // Get the data from the table cells and populate the modal's input fields
      var data = $row.children("td").map(function () {
        return $(this).text();
      }).get();

      // Set the date and time input fields in the modal using Moment.js
      var dateValue = moment(data[0], 'MM/DD/YYYY h:mm A').format('YYYY-MM-DDTHH:mm'); // Format for the date input field
      $('#date').val(dateValue);

      // Populate other fields in the modal
      $('#username').val(data[1]);
      $('#cname').val(data[2]);
      $('#phone').val(data[3]);
      $('#purpose').val(data[4]);
      $('#source').val(data[5]);
      $('#city').val(data[6]);
      $('#note').val(data[7]);

      // Show the modal with the fetched data
      $('#UpdateModal').modal('show');
    });

    $(".btn-close, .btn-danger").click(function () {
      $("#UpdateModal").modal("hide");
    });
  });