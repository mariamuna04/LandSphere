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
                'sign-in-background-light': "url('/src/res/img/sign-in-background-light.webp')",
                'sign-up-background-light': "url('/src/res/img/sign-up-background-light.webp')",
                'sign-in-background-dark': "url('/src/res/img/sign-in-background-dark.webp')",
                'sign-up-background-dark': "url('/src/res/img/sign-up-background-dark.webp')",


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
