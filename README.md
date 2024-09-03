# CV Application

[![Laravel](https://img.shields.io/badge/laravel-11.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/php-8.3-blue.svg)](https://www.php.net)

A modern web application built with Laravel 11 and PHP 8.3, designed to manage CVs efficiently. Users can create, edit, view, and download their CVs in PDF format, all within a responsive and user-friendly interface.

## Features

- **Create CVs**: Users can fill out a detailed form to create a CV.
- **Edit CVs**: Modify existing CVs with updated information.
- **View CVs**: Display created CVs with all details neatly organized.
- **Download CVs**: Export CVs to a PDF format.
- **Responsive Design**: Accessible and fully functional on all devices.

## Prerequisites

Ensure you have the following installed before proceeding with the installation:

- **PHP 8.3**: The project is built using PHP 8.3.
- **Composer**: Dependency management for PHP.
- **Laravel 11**: The framework used for this application.
- **PostgreSQL**: The default database system used, although Laravel supports multiple DBMS options.

## Installation

Follow these steps to set up the project locally:

1. **Clone the Repository**

    ```bash
    git clone https://github.com/yourusername/yourproject.git
    cd yourproject
    ```

2. **Install Dependencies**

    Use Composer to install all necessary dependencies:

    ```bash
    composer install
    ```

3. **Environment Setup**

    Create a copy of the `.env.example` file and configure your environment settings:

    ```bash
    cp .env.example .env
    ```

    Update the `.env` file with your database credentials and other necessary configuration settings.

4. **Generate Application Key**

    Generate a unique application key:

    ```bash
    php artisan key:generate
    ```

5. **Run Migrations**

    Set up the database tables by running migrations:

    ```bash
    php artisan migrate --seed
    ```

6. **Serve the Application**

    Start the Laravel development server:

    ```bash
    php artisan serve
    ```

    Access the application at `http://localhost:8000`.

## Usage

Once the application is running, you can:

- **Register** as a new user or **log in** with existing credentials.
- **Create a new CV** by navigating to the relevant section.
- **View, edit, or delete** your CVs from the dashboard.
- **Download** your CV in PDF format for sharing or printing.



![login](https://github.com/user-attachments/assets/ea6df1c6-bc7c-4b0e-b1f2-f80687217bed)

![createcv](https://github.com/user-attachments/assets/9b588b18-80ba-4919-879e-a411002c3da4)

