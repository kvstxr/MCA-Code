const search = document.querySelector('#search');
const listings = document.querySelectorAll('.listing');

search.addEventListener('input', () => {
    const text = search.value.toLowerCase();

    listings.forEach((listing) => {
        listing.hidden = !listing.textContent.toLowerCase().includes(text);
    });
});
