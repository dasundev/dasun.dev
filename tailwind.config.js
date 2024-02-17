/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php"],
    theme: {
        extend: {
            colors: {
                primary: {
                    50: "#edfaff",
                    100: "#d6f1ff",
                    200: "#b5e9ff",
                    300: "#83dcff",
                    400: "#48c7ff",
                    500: "#1ea7ff",
                    600: "#0689ff",
                    700: "#0075ff",
                    800: "#0859c5",
                    900: "#0d4e9b",
                    950: "#0e305d",
                },
            },
        },
    },
    darkMode: "class",
    plugins: [require("@tailwindcss/typography")],
};
