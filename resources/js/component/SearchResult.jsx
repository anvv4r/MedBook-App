import React from "react";

function SearchResults({
    searchResults,
    currentPage,
    totalPages,
    handleNextPage,
    handlePreviousPage,
}) {
    // Check if searchResults.data exists and is an array before trying to map over it
    const hasResults = searchResults && Array.isArray(searchResults.data);

    return (
        <>
            <div className="search_list">
                {searchResults?.data?.length === 0 ? (
                    <div className="search_list_item">
                        <p>No available doctors found.</p>
                    </div>
                ) : (
                    searchResults?.data?.map((doctor) => (
                        <div key={doctor.id} className="search_list_item">
                            <a href={`/doctor/${doctor.id}`}>
                                {doctor.image == null ? (
                                    <img
                                        src="/img/user-profile.svg"
                                        alt={doctor.name}
                                    />
                                ) : (
                                    <img
                                        src={`/images/${doctor.image}`}
                                        alt={doctor.name}
                                    />
                                )}
                            </a>
                            <a href={`/doctor/${doctor.id}`}>
                                <h4>{doctor.name}</h4>
                            </a>
                            <p>{doctor.specialty}</p>
                            <p>Address: {doctor.address}</p>
                        </div>
                    ))
                )}
            </div>
            <div className="pagination">
                {currentPage > 1 && (
                    <button onClick={handlePreviousPage}>Previous</button>
                )}

                {currentPage < totalPages && (
                    <button onClick={handleNextPage}>Next</button>
                )}
            </div>
        </>
    );
}

export default SearchResults;
