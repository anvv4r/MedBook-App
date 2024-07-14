import React, { useState, useEffect } from "react";
// import "../App.scss";
import SearchBar from "./SearchBar";
import SearchResults from "./SearchResult";

function HomePage() {
    const [searchQuery, setSearchQuery] = useState("prague");
    const [searchResults, setSearchResults] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [totalPages, setTotalPages] = useState(0);

    useEffect(() => {
        const fetchData = async () => {
            if (searchQuery !== "") {
                const response = await fetch(
                    `/api/doctor/search?search=${searchQuery}&page=${currentPage}&per_page=6`
                );
                const data = await response.json();
                setSearchResults(data.data); // Adjusted to match the API structure
                setTotalPages(data.last_page); // Adjusted to use last_page for total pages
                console.log("Data fetched: ", data);
            }
        };
        fetchData();
    }, [searchQuery, currentPage]);

    const handleNextPage = () => {
        if (currentPage < totalPages) {
            setCurrentPage(currentPage + 1);
        }
    };

    const handlePreviousPage = () => {
        if (currentPage > 1) {
            setCurrentPage(currentPage - 1);
        }
    };

    return (
        <>
            <SearchBar setSearchQuery={setSearchQuery} />
            <SearchResults
                searchResults={searchResults}
                currentPage={currentPage}
                totalPages={totalPages}
                handleNextPage={handleNextPage}
                handlePreviousPage={handlePreviousPage}
            />
        </>
    );
}
export default HomePage;
