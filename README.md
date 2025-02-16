# Web Project - Project Management Platform

A web application built with PHP and MySQL that allows users to share, discover and collaborate on projects. Features a responsive design using Bootstrap and dynamic functionality powered by Vue.js.

<img src="resources/front_page.png" width="850"/><br><br>

## Features

### Public Access
- Browse published projects
- Filter projects by categories (WebDev, GameDev, Data Mining, etc.)
- Search projects by name and author
- Sort projects by rating, alphabetically, or date
- View detailed project information
- Apply to collaborate on projects (authors are notified via email)

<img src="resources/login_form.png" height="420"/><br><br>
<img src="resources/register_form.png" width="420"/><br><br>

### Registered Users
Additional features available after registration:
- Create and publish projects with:
  - Title and description
  - Category selection
  - Image upload
- Manage personal projects (edit/delete)
- Access personal project dashboard
- Rate other users' projects (like/dislike)
- Manage account settings

<img src="resources/create_project.png" width="450"/><br><br>
<img src="resources/account_settings.png" width="450"/><br><br>

## Technology Stack

### Backend
- PHP (MVC Architecture)
- MySQL Database
- PHPMailer for email notifications

### Frontend
- HTML5/CSS3
- Bootstrap 5 for responsive design
- Vue.js for dynamic interactions
- jQuery
- Axios for AJAX requests

### Key Features
- MVC architecture for clean code organization
- Secure user authentication and authorization
- Client and server-side input validation
- Responsive design for all devices
- Real-time project search and filtering
- Email notifications via SMTP (Gmail)

## Installation

1. Set up XAMPP:
   - Download and install XAMPP from [https://www.apachefriends.org](https://www.apachefriends.org)
   - Start Apache and MySQL services from XAMPP Control Panel

2. Set up the project:
   - Navigate to `C:\xampp\htdocs`
   - Copy all project files to this directory

3. Set up the database:
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named "web_project"
   - Import the database from `sql/db.sql`

4. PHPMailer is already included:
   - Located in `libs/PHPMailer-6.9.3/`
   - No additional installation required

5. Access the application:
   - Open your browser
   - Navigate to `http://localhost/your-project-folder`

[Rest of the README remains the same]

## Test Accounts

For testing purposes, you can use these accounts:
```
Username: user     | Password: pass1234
Username: student  | Password: vaje
Username: IronMerc | Password: 1234test
```

## Project Structure

```
├── controller/           # Controller classes
├── model/               # Database models
├── view/                # View templates
├── static/              # Static assets
│   ├── css/
│   ├── js/
│   └── images/
└── sql/                 # Database schema
```

## Security Features

- Password hashing
- SQL injection prevention
- XSS protection
- Input validation
- Secure session management

## License

Copyright © 2022 Matic Knez. All rights reserved.
