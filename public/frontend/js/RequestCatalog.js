document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("myForm");

    form.addEventListener("submit", function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Get form data
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const phone = document.getElementById("phone").value;
        const country = document.getElementById("country").value;
        const message = document.getElementById("message").value;

        // Simple validation (check if fields are empty)
        if (name === "" || email === "" || phone === "" || country === "" || message === "") {
            alert("Please fill all the fields.");
            return;
        }

        // Display form data in a <p> tag
        alert(`Submitted! Name: ${name}, Email: ${email} , Phone : ${phone} , Country : ${country} , Message : ${message}` )
       
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
