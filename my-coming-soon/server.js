const express = require('express');
const path = require('path');
const app = express();
const PORT = process.env.PORT || 3000;

// Public folder ko static banata hai (HTML/CSS files ke liye)
app.use(express.static(path.join(__dirname, 'public')));

// Main Route - Jab koi site khole to index.html dikhaye
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// Server Start karna
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});