// App.js
import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Shop from './components/Shop';
import About from './components/About';
import Contact from './components/Contact';
import Navigation from './components/Navigation';

function App() {
    return (
        <Router>
            <div>
                <Navigation />
                <Routes>
                    <Route exact path="/shop" element={<Shop />} />
                    <Route path="/about" element={<About />} />
                    <Route path="/contact" element={<Contact />} />
                </Routes>
            </div>
        </Router>
    );
}

export default App;
