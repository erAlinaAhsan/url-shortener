
const shortenUrl = async () => {
    const longUrl = document.getElementById('long-url').value;
    const response = await fetch(`https://api.shrtco.de/v2/shorten?url=${longUrl}`);
    const data = await response.json();
    const shortUrl = data.result.full_short_link;

    const shortUrlContainer = document.getElementById('short-url-container');
    const shortUrlLink = document.getElementById('short-url').querySelector('a');
    shortUrlLink.href = shortUrl;
    shortUrlLink.textContent = shortUrl;
    shortUrlContainer.style.display = 'block';
};

const shortenBtn = document.getElementById('shorten-btn');
shortenBtn.addEventListener('click', shortenUrl);

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