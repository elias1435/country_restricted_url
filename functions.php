<?php

// USA conuntry restriction
add_action('wp_footer', 'md_add_script_wp_footer');
function md_add_script_wp_footer() {
?>
<script>
	
document.addEventListener('DOMContentLoaded', function() {
    // Get the button element
    var pdfButton = document.querySelector('.button-id');

    // Add click event listener to the button
    pdfButton.addEventListener('click', function(event) {
        // Prevent the default action of the button (i.e., opening the PDF file)
        event.preventDefault();

        // Fetch the visitor's country information
        fetch('https://ipapi.co/json/')
            .then(response => response.json())
            .then(data => {
                var country_code = data.country;
                if (country_code === 'US') {
                    // Redirect if the visitor is from the USA
                    window.location.href = 'https://yourdomain.com';
                } else {
                    // Otherwise, allow opening the PDF file
                    window.open(pdfButton.href, '_blank');
                }
            })
            .catch(error => console.error('Error:', error));
    });
});



</script>
<?php
}
