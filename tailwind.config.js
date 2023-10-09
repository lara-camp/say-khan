/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        colors: {
            transparent: "transparent",
            current: "currentColor",
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
            h0: "36px",
            h1: "18px",
            h2: "16px",
            b1: "14px",
            b2: "12px",
        },
        extend: {},
    },
    plugins: [require("preline/plugin")],
};
