export function contactForm() {

  // variables first
  const form = document.querySelector('#contactForm');

  // functions second
  function submitAjaxForm(e) {
    e.preventDefault();

    const currentForm = e.currentTarget;
    const path = "sendEmailJob.php";
    console.log(currentForm.elements);
    const formFields =
      "name=" +
      currentForm.elements.name.value +
      "&email=" +
      currentForm.elements.email.value +
      "&message=" +
      currentForm.elements.message.value;

      fetch(path, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: formFields
      })
      .then(response => {
        console.log('Response status:', response.status);
        return response.text(); // Get as text first to see raw content
      })
      .then(text => {
        console.log('Raw response:', JSON.stringify(text));
        console.log('Character at position 16:', text.charCodeAt(16));
        console.log('First 50 characters:', text.substring(0, 50));
        
        // Then try to parse as JSON
        const data = JSON.parse(text);
        console.log('Parsed JSON:', data);
      })
      .catch(error => {
        console.log('Error:', error);
      });
  }

  // event listeners last
  form.addEventListener('submit', submitAjaxForm);
};
