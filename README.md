
Built by https://www.blackbox.ai

---

```markdown
# Naukri Clone

## Project Overview
Naukri Clone is a web-based job portal application replicating the core functionalities of Naukri.com, enabling users to search for jobs, apply for openings, manage their resumes, and login to a personal dashboard. The application features an intuitive UI built with Tailwind CSS and handles user authentication through PHP with a MySQL database backend.

## Installation
To set up the Naukri Clone project on your local machine, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   ```
   
2. **Navigate to the project directory**:
   ```bash
   cd naukri-clone
   ```

3. **Set up the database**:
   - Create a new database in your MySQL server named `naukri_clone`.
   - Adjust the database connection settings in `config.php`.

4. **Import the database schema**: You may create tables in your MySQL database based on your application requirements.

5. **Start a local server**:
   - You can use XAMPP, WAMP, or your preferred web server.

6. **Access the application**:
   Open your browser and navigate to `http://localhost/naukri-clone/index.html`.

## Usage
- **User Registration**: Users can register by filling out the registration form, which includes fields like name, email, phone number, and password.
- **Login**: Registered users can log in to access their dashboard.
- **Job Search**: Users can search for jobs by entering job titles and locations.
- **Apply for Jobs**: Users can view job listings and apply for jobs directly.
- **Dashboard**: Users can manage their profiles, view applied jobs, and update their resumes.

## Features
- User registration and login/logout functionality
- Job searching and listing capabilities
- Dashboard for user profile management
- Resume builder tool
- Responsive design using Tailwind CSS

## Dependencies
The project relies on the following external libraries:
- **Tailwind CSS**: A utility-first CSS framework for building custom designs.
  
You can find the Tailwind CSS link in the `index.html` and other HTML files:
```html
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
```

Additional styles are in `styles.css` and JavaScript functionalities are handled through `scripts.js`.

## Project Structure
The project structure is organized as follows:

```
naukri-clone/
├── index.html             # Main landing page
├── jobs.html              # Job listings page
├── companies.html         # Top companies page
├── login.html             # User login page
├── register.html          # User registration page
├── dashboard.html         # User dashboard page
├── resume.html            # Resume builder page
├── styles.css             # Custom styles
├── scripts.js             # JavaScript functionality
├── config.php             # Database configuration
├── login.php              # Handles user login
├── register.php           # Handles user registration
├── dashboard.php          # Server-side user dashboard handling
└── resume.php             # Server-side resume handling
```

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
```

This README provides a clear overview of the Naukri Clone project, including installation instructions, usage guidelines, features, dependencies, and project structure. Feel free to customize it further as necessary!