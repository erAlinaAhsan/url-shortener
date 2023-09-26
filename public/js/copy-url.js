// copy-url.js

// Check if the browser supports the Clipboard API
if (navigator.clipboard) {
    const copyButtons = document.querySelectorAll('.copy-button');

    copyButtons.forEach((button) => {
        button.addEventListener('click', async (event) => {
            const urlToCopy = button.getAttribute('data-url');

            try {
                await navigator.clipboard.writeText(urlToCopy);
                alert('URL copied to clipboard: ' + urlToCopy);
            } catch (err) {
                console.error('Failed to copy: ', err);
            }
        });
    });
} else {
    // Handle browsers that don't support the Clipboard API
    const copyButtons = document.querySelectorAll('.copy-button');

    copyButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            const urlToCopy = button.getAttribute('data-url');
            const textArea = document.createElement('textarea');
            textArea.value = urlToCopy;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            alert('URL copied to clipboard: ' + urlToCopy);
        });
    });
}
