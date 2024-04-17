// Navigation.js
import React from 'react';
import { Link } from 'react-router-dom';

function Navigation() {
    return (
        <nav className="navbar">
            <ul>
                <li>
                    <Link to="/shop">Shop</Link>
                </li>
                <li>
                    <Link to="/about">About</Link>
                </li>
                <li>
                    <Link to="/contact">Contact</Link>
                </li>
            </ul>
        </nav>
    );
}

export default Navigation;
