document.getElementById("load-more").addEventListener("click", function () {
    var page = this.getAttribute("data-page");
    var button = this;
    fetch(`/search?search={{ request('search') }}&page=` + page, {
        headers: {
            "X-Requested-With": "XMLHttpRequest",
        },
    })
        .then((response) => response.text())
        .then((data) => {
            document
                .getElementById("doctor-list")
                .insertAdjacentHTML("beforeend", data);
            var nextPage = parseInt(page) + 1;
            button.setAttribute("data-page", nextPage);
        });
});
