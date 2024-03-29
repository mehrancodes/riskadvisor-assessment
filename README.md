<p align="center"><a href="https://riskadvisor.insure/" target="_blank"><img src="https://riskadvisor.insure/wp-content/uploads/2022/06/withoutTagline.png" width="400" alt="RiskAdvisor Logo"></a></p>

## RiskAdvisor Assessments Project Setup
[![Actions Status](https://github.com/mehrancodes/riskadvisor-assessment/actions/workflows/tests.yml/badge.svg?event=pull_request)](https://github.com/mehrancodes/riskadvisor-assessment/actions) | Latest Code Coverage: 82%

Welcome to the RiskAdvisor Assessments project! Follow these simple steps to set up the project on your local machine.

### Prerequisites

Before you begin, make sure you have the following installed:

- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/) (>= 8.1)
- [Node.js](https://nodejs.org/) (>= 18)
- [NPM](https://www.npmjs.com/) or [Yarn](https://yarnpkg.com/) (for managing front-end assets)
- [MySQL](https://www.mysql.com/) or [SQLite](https://www.sqlite.org/) database

### Getting Started

1. Clone the repository to your local machine:

   ```bash
   git clone https://github.com/mehrancodes/riskadvisor-assessment.git
   ```

2. Navigate to the project directory:

   ```bash
   cd riskadvisor-assessments
   ```

3. Copy the `.env.example` file and create a new `.env` file:

   ```bash
   cp .env.example .env
   ```

4. Install PHP dependencies using Composer:

   ```bash
   composer install
   ```

5. Generate an application key:

   ```bash
   php artisan key:generate
   ```

6. Update the `.env` file with your database configuration.

7. Create a new database in your MySQL server or use SQLite.

8. Run the database migrations:

   ```bash
   php artisan migrate
   ```

9. Seed the database with sample data:

   ```bash
   php artisan db:seed
   ```

10. Install the Node modules:

    ```bash
    npm install
    ```
   
11. Build the Inertia.js:
    
    ```bash
    npm run build
    ```

### Running the Application

After completing the setup, you can run the application using the following command:

```bash
php artisan serve
```

Visit `http://localhost:8000/get-quote` in your browser to access the RiskAdvisor Get Quote Page.

Using the credentials 'test@example.com' and 'password', access the admin panel at the following URL: http://localhost:8000/admin.

## RiskAdvisor Assessments Project Time

I invested a total of 11 hours and 20 minutes in the development of the RiskAdvisor Assessments project. Below is a breakdown of the time spent on each aspect:

- **Brainstorming:** 1 hour and 50 minutes
    - During this phase, I conceptualized the project, outlined features, and considered the technical approach.

- **Project Setup and Environment Configuration:** 20 minutes
    - This time was dedicated to installing a fresh Laravel project, setting up the Laravel, Vue.js, Tailwind CSS, and Inertia.js environment, and configuring necessary files.

- **Frontend Development (Vue.js and Tailwind CSS):** 5 hours and 20 minutes
    - I spent a significant portion of time developing the frontend using Vue.js and Tailwind CSS, including creating the three-step wizard form.

- **Backend Development (Laravel and Inertia.js):** 2 hours
    - The backend development involved setting up Laravel and Inertia.js, creating models and migrations, and configuring web routes.

- **Testing and Debugging:** 40 minutes
    - I allocated time for writing testes, do manual test and debugging to ensure the smooth functioning of the application.

- **Project Review and Optimization:** 30 minutes
    - I conducted a review of the project to identify potential optimizations and enhance performance.

- **Documentation and README:** 40 minutes
    - The documentation phase included creating a README file, providing setup instructions, and explaining the reasoning behind certain development decisions.

### Additional Note:
The project was expected to be completed within an 8-hour timeframe. However, I exceeded this timeframe due to challenges faced during development. Specifically, I encountered difficulties with Inertia.js form processing, which led to additional time spent on troubleshooting and ultimately adjusting the approach to speed up development.

### Room for Enhancement:
There is still room for improvement and enhancement in certain aspects of the project. I would be delighted to discuss these potential enhancements in our next meeting.

### FilamentPHP Admin Panel:
Additionally, I took the initiative to integrate the FilamentPHP admin panel outside of the specified time to simplify data management for you. The admin panel provides an easy-to-use interface for handling entry data efficiently.
