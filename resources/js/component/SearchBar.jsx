import React, { useState } from "react";

function SearchBar({ setSearchQuery }) {
    const [inputValue, setInputValue] = useState("");

    const handleInputChange = (e) => {
        setInputValue(e.target.value);
    };

    const handleSearch = (e) => {
        e.preventDefault();
        setSearchQuery(inputValue);
        setInputValue("");
    };

    return (
        <>
            <form onSubmit={handleSearch}>
                <input
                    className="search_bar"
                    type="text"
                    value={inputValue}
                    onChange={handleInputChange}
                    placeholder="Search for Available Doctors..."
                />
                <button type="submit">Search</button>
            </form>
        </>
    );
}

export default SearchBar;
