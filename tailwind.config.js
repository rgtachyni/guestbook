/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                pink: "#F08686",
                "bg-pink": "#F8E1E1",
            },
        },
    },
    plugins: [
        require("flowbite/plugin")({
            datatables: true,
        }),
    ],
};
