module.exports = {
    mode: 'jit',
    content: ["./src/**/*.html", "./src/**/*.js", "./src/**/*.php"],
    theme: {
        extend: {
            colors: {
                'primary': '#6A64F1',
                'secondary': '#918dea',
                'accent': '#FFC107',
                'accent-2': '#FF9800',
                'accent-3': '#FF5722',
            },
            backgroundImage: {
                'sign-in-background': "url('/src/res/img/sign-in-background.webp')",
                'sign-up-background': "url('/src/res/img/sign-up-background.webp')",
            },
            cursor: {
                'hand': 'pointer',
            },
            animation: {
                fadeIn: 'fadeIn 0.7s ease-in',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
            }
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
}
