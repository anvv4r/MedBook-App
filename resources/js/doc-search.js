const searchInput = document.getElementById("search-input");
const searchResultsContainer = document.querySelector(".search__results");

const fetchSearchResults = async (searchValue) => {
    const response = await fetch("/api/doctor/search?search=" + searchValue);
    const data = await response.json();

    console.log(data);

    searchResultsContainer.innerHTML = "";

    if (searchValue && searchValue !== "prague") {
        data.forEach((doctor) => {
            searchResultsContainer.innerHTML += `<a href="/doctor/${doctor.id}" class="search-results__result">${doctor.name}</a>`;
        });
    }
};

searchInput.addEventListener("input", (e) => {
    fetchSearchResults(e.target.value);
});
