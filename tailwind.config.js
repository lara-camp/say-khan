/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        colors: {
            purple: "#5b2a86",
            blue: "#6184d8",
            green: "#85cb33",
            white: "#f7f4ea",
            gray: "#ded9e2",
        },
        fontFamily: {
            sans: ["Poppins", "sans-serif"],
        },
        fontSize: {
            h1: "48px",
            h2: "40px",
            h3: "32px",
            b1: "32px",
            b2: "28px",
            b3: "24px",
            b4: "18px",
        },
        extend: {},
    },
    plugins: [],
};
