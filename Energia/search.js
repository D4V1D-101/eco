document.getElementById('searchBox').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#countryTable tbody tr');

    rows.forEach(row => {
        const countryName = row.querySelector('td').innerText.toLowerCase();
        if (countryName.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});