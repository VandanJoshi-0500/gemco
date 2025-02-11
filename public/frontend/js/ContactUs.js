document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("ContactUsForm");

    form.addEventListener("submit", function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Get form data
        const firstname = document.getElementById("firstname").value;
        const lastname = document.getElementById("lastname").value;
        const phone = document.getElementById("phone").value;
        const email = document.getElementById("email").value;
        const message = document.getElementById("message").value;

        // Simple validation (check if fields are empty)
        if (firstname === "" || lastname === "" || email === "" || phone === "" || message === "") {
            alert("Please fill all the fields.");
            return;
        }

        // Display form data in a <p> tag
        alert(`Submitted! First Name: ${firstname}, Last Name: ${lastname},Email: ${email} , Phone : ${phone} , Message : ${message}`)

        // const result = document.getElementById("result");
        // result.innerHTML = `Submitted! Name: ${name}, Email: ${email}`;

        // Optionally, you can send the form data to a server here
        // using AJAX or the Fetch API
        // Example with Fetch API:
        /*
        fetch('your-server-url', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ name: name, email: email }),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
        */
    });
});




// ................ENABLE LETS TALK BTN...............

function EnableBTN() {
    const CheckBox = document.querySelector(".CheckBoxContainer input");
    const SubmitBTN = document.querySelector(".ContactUsBTN button");

    // Enable button if checkbox is checked, otherwise disable it
    if (CheckBox.checked) {
        SubmitBTN.disabled = false;  // Enable button
        // SubmitBTN.style.backgroundColor = "red"
    } else {
        SubmitBTN.disabled = true;   // Disable button
        // SubmitBTN.style.backgroundColor = "gray"
    }
}




