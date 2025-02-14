# Web Project - Project Management Platform

A web application built with PHP and MySQL that allows users to share, discover and collaborate on projects. Features a responsive design using Bootstrap and dynamic functionality powered by Vue.js.

## Features

### Public Access
- Browse published projects
- Filter projects by categories (WebDev, GameDev, Data Mining, etc.)
- Search projects by name and author
- Sort projects by rating, alphabetically, or date
- View detailed project information
- Apply to collaborate on projects (authors are notified via email)

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

1. Clone the repository
2. Set up a PHP environment with MySQL
3. Install dependencies:
```bash
composer require phpmailer/phpmailer
```
4. Import the database schema from `sql/db.sql`
5. Configure database connection in `model/DBInit.php`
6. Configure email settings for PHPMailer

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

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

Copyright © 2022 Matic Knez. All rights reserved.
