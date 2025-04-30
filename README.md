# php_personal_website

A personal website built using PHP. This project showcases my portfolio, blog, and contact information. It also includes features like user authentication, CRUD operations, and an admin panel for managing users.

## Live Demo

You can view the website live at [https://www.student.bth.se/~nibo23/dbwebb-kurser/webtec/me/report/public/today.php](https://www.student.bth.se/~nibo23/dbwebb-kurser/webtec/me/report/public/today.php).

## Features

- **User Authentication**: Secure login and registration system with password hashing.
- **Admin Panel**: Manage users, including creating, updating, and deleting accounts.
- **Profile Management**: Users can update their profile details and change their password.
- **Dynamic Content**: Pages like "Guessname" and "Today" provide interactive and dynamic content.
- **Flash Messages**: Feedback messages for user actions like login, registration, and profile updates.
- **Responsive Design**: Mobile-friendly layout using CSS.

## Project Structure

- **`config/`**: Contains configuration files like `config.php` for error reporting and session management.
- **`data/`**: Includes CSV files for name-related data used in features like "Guessname."
- **`db/`**: SQLite database files and SQL scripts for managing the database schema and queries.
- **`public/`**: Publicly accessible files, including PHP scripts for pages like login, registration, and admin actions.
- **`src/`**: Contains reusable PHP functions and libraries for database interaction and utility functions.
- **`view/`**: Reusable view components like `header.php`, `footer.php`, and user-related templates.
- **`css/`**: Stylesheets for the website, organized by functionality (e.g., `navbar.css`, `responsive.css`).

## Technologies Used

- **PHP**: Server-side scripting for dynamic content and database interactions.
- **SQLite**: Lightweight database for storing user data and other information.
- **HTML & CSS**: Structure and styling of the website.
- **JavaScript**: Interactivity and client-side enhancements.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/php_personal_website.git
