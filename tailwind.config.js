module.exports = {
    content: ["./src/**/*.html", "./src/**/*.js", "./src/**/*.php"],
    theme: {
        extend: {
            colors: {
                'primary': '#6A64F1',
                'secondary': '#918dea',
                'accent': '#FFC107',
                'accent-2': '#FF9800',
                'accent-3': '#FF5722',
                'beige-default': '#f4f4f4',
                'beige-light': '#f8f8f8',
                'beige-dark': '#eaeaea',
                'beige-darker': '#e0e0e0',
                'beige-darkest': '#d6d6d6',
            },
            backgroundImage: {
                'sign-in-background-light': "url('/src/resource/img/sign-in-background-light.webp')",
                'sign-up-background-light': "url('/src/resource/img/sign-up-background-light.webp')",
                'sign-in-background-dark': "url('/src/resource/img/sign-in-background-dark.webp')",
                'sign-up-background-dark': "url('/src/resource/img/sign-up-background-dark.webp')",
                's3c2-1': "url('/src/resource/icons/index/main-section_shelf-three_c2-1_specialists.jpg')",
                's3c2-3': "url('/src/resource/icons/index/main-section_shelf-three_c2-3_expert_bg.jpg')",
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
    variants: {
        extend: {
            animation: ['motion-safe'],
        }
    },
}
