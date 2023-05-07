# LandSphere

:star: **Awarded *Champion* in CSE Project Show 231 at United International University** :star:

###### A simple efficient land management website that can be used to manage land simply, flexibly and securely.  This website does not use any framework; just uses simple PHP, JavaScript, HTML and Tailwind CSS.


### Introduction

At LandSphere, we strive to promote efficient and eco-friendly land management
practices. Our database is designed to help landowners buy, sell, and manage their properties with ease,
while also ensuring that the environment is respected and preserved. We believe that land management should
be accessible to everyone, and our platform is designed to be user-friendly and customizable to meet the
unique needs of our clients. With a team of experienced professionals and cutting-edge technology, we are
committed to providing high-quality service and helping our clients achieve their land management goals.


### Features

- Viewing the available land according to the preferences

- Displaying list of land on sale

- No broker or middle-man rather direct deal with the group

- Booking and cancellation convenience

- Distributing the land among the successors with respect of division index for each successor

- Flexibility with the payment and advantage

- No direct deal with governmental organization
- *and so on*...


### Build Material

- PHP `v8.1.6`
- Tailwind CSS `v3.3.2`
- FlowBite `v1.6.5` (OPTIONAL)

---

### Instruction 
1. Clone repository and open with PhpStorm

2. Create a database and name it `landsphere` using XAMPP or similar software

3. Import the `sql` file located in `/databases/landsphere.sql` in the `landsphere` database

4. Run npm install **from root folder**
    ``` shell
    npm install
    ```

5. Compile Tailwind CSS **from the root folder**  using this command - 
    ``` shell
    npx tailwindcss -i ./src/stylesheet/input.css -o ./dist/output.css
    ```

    > You should see `/dist/output.css` in root folder

6. Run `/src/index.php` using PhpStorm’s built in web server. If not configured then configure it with `PHP v8.1.x+`

---
> **[**NOTE] [IMPORTANT]**
>
> We are advising to run this project with PhpStorm. Using VSCode with PHP CLI tools are not guaranteed to work because of some relative path issues as tested on 3rd May, 2023.

---


######  Project Finished on Tue May 2 2023 12:37:00 GMT+0600 (Bangladesh Standard Time)
