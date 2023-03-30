Project Structure
----------------
An outline of this project file structure is shown below.

``````
cse3522
├── dist
├── node_modules
├── src
│ ├── js
│ ├── php
│ ├── res
│ ├── stylesheets
│ ├── index.php
├── .gitignore
├── LICENSE
├── MANUAL.md
├── package.json
├── package-lock.json
├── README.md
├── tailwind.config.js
`
``````

The `dist` directory is
where the compiled files are placed. The `node_modules` directory is where the
dependencies are installed. The `src` directory is where the source files are placed. `.gitignore` is
where the files and directories to be ignored by git are listed. `LICENSE` is the license file.
`MANUAL.md` is the manual file. `package.json` is the file that contains the dependencies that needs to be
installed. `package-lock.json` is the file that contains the dependencies that are installed. `README.md` is the readme
file. `tailwind.config.js` is the file that contains the configuration for tailwind.

****Only work in the `src` directory.**

> **Note:** You should not edit any files other than which are in the `src` directory.

### `src` Directory

``````
├── src
│ ├── js
│ ├── php
│ ├── res
│ ├── stylesheets
│ ├── index.php
``````

The `js` directory is where the javascript files are placed. The `php` directory is where the php files are placed.
The `res` directory is where the resource files are placed. The `stylesheets` directory is where the stylesheet files
are placed. The `index.php` file is the main entry point file.

> **Note:** You don't need to write anything in the 'js' directory.

In the `php` directory, there should be a directory for every page. For Example, if you want to create a page called
`about`, you should create a directory called `about` in the `php` directory. In the `about` directory, there should
be a file called `index.php`. The `index.php` file is the entry point file for the `about` page. The `index.php` file
should contain codes that are specific to the `about` page.

``````
├── php
│ ├── forgot-password        <<< Directory for the forgot-password page
│ │ ├── index.php               <<< Entry point file for the forgot-password page
│ ├── reset-password         <<< Directory for the reset-password page
│ │ ├── index.php               <<< Entry point file for the reset-password page
│ ├── sign-in                <<< Directory for the sign-in page
│ │ ├── index.php               <<< Entry point file for the sign-in page
│ ├── sign-up                <<< Directory for the sign-up page
│ │ ├── index.php               <<< Entry point file for the sign-up page
│ ├── 404.php                <<< Entry point file for the 404 page
``````

