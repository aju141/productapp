import React, { useEffect, useState } from 'react';

function Shop() {
    const [data, setData] = useState(null);
    const [currentPage, setCurrentPage] = useState(1);
    const [categories, setCategories] = useState([]);
    const [selectedCategory, setSelectedCategory] = useState(null);

    useEffect(() => {
        fetchData();
    }, [currentPage, selectedCategory]);

    const fetchData = async () => {
        try {
            let url = `http://127.0.0.1:8000/api/products?page=${currentPage}`;
            if (selectedCategory) {
                url += `&category=${selectedCategory}`;
            }
            const response = await fetch(url);
            const responseData = await response.json();
            setData(responseData);
            if (responseData && responseData.data && responseData.data.length > 0) {
                const uniqueCategories = [...new Set(responseData.data.map(product => product.product_cat))];
                setCategories(uniqueCategories);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    };

    const handleCategoryChange = (category) => {
        setSelectedCategory(category);
        setCurrentPage(1); // Reset to first page when category changes
    };

    const handlePrevPage = () => {
        setCurrentPage(prevPage => prevPage - 1);
    };

    const handleNextPage = () => {
        setCurrentPage(prevPage => prevPage + 1);
    };

    return (
        <div className="shop-container">
            <h2>Products</h2>
            <div className="filter-section">
                <h3>Categories</h3>
                <select value={selectedCategory || ''} onChange={(e) => handleCategoryChange(e.target.value)}>
                    <option value="">All</option>
                    {categories.map((category, index) => (
                        <option key={index} value={category}>{category}</option>
                    ))}
                </select>
            </div>
            <div className="product-list">
                <h3>Product List</h3>
                {data ? (
                    <div className="product-grid">
                        {data.data.map(product => (
                            <div key={product.id} className="product">
                                <img src={`${product.image_url}/${product.product_image}`} alt={product.product_title} />
                                <h3>{product.product_title}</h3>
                                <p>{product.product_description}</p>
                                <p>Price: ${product.product_price}</p>
                                <a href={product.product_link_url} target="_blank" rel="noopener noreferrer">View Product</a>
                            </div>
                        ))}
                    </div>
                ) : (
                    <p>Loading...</p>
                )}
                <div className="pagination">
                    <button onClick={handlePrevPage} disabled={!data || !data.links[0].url}>Previous</button>
                    <button onClick={handleNextPage} disabled={!data || !data.links[2].url}>Next</button>
                </div>
            </div>
        </div>
    );
}

export default Shop;
