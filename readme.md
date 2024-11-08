# LaraQuiz-ExamPlatform

LaraQuiz-ExamPlatform is a robust and efficient web-based quiz system built with PHP and Laravel 11, designed to simplify the process of conducting online exams. This platform provides a seamless experience for both administering and taking exams, making it an ideal solution for educational institutions, educators, and students alike.

## Key Features

- User-Friendly Interfaces: Intuitive and accessible UI for both students and administrators.
- Comprehensive Exam Management: Create subject-wise quizzes, manage questions, and evaluate student performance.
- Secure Data Handling: Ensures secure storage of user data, quiz results, and question banks.
- Scalable and Maintainable: Built using Laravel’s features like routing, authentication, and Eloquent ORM, allowing the platform to scale as user demand grows.

## Technology Stack

- Backend: PHP with Laravel 11 for rapid, secure, and maintainable development.
- Database: MySQL for secure and efficient data storage.
- Frontend: Simple and clean interfaces designed to optimize the user experience.

## System Requirements

- PHP 8.x
- MySQL Database
- Composer
- Laravel 11

## Installation Guide

#### Using Docker
- Clone the repository with __git clone__
- Run __make setup__
- Access via __http://localhost:8888__

#### Without Docker
- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- Now you can login as admin: launch the main URL and login with default credentials
  - __admin@admin.com__
  - __password__
- Fill in the database with topics, questions and options
- For social login - fill in the credentials of your social apps in .env file
- That's it - allow people to register and take quizzes!

## User Roles and Functionality

- Admin: Can create subjects, quizzes, and manage questions, as well as view and evaluate student scores.
- Student: Can register, log in, take quizzes by subject, and view their scores.

## Future Enhancements
LaraQuiz-ExamPlatform is designed to adapt to the evolving demands of online education. Planned enhancements include:

- AI-Based Question Generation: Automate quiz question generation based on topics.
- Advanced Analytics: Insights into student performance and progress.
- LMS Integration: Compatibility with popular Learning Management Systems.

## Conclusion
LaraQuiz-ExamPlatform stands out as a reliable, scalable, and secure solution for digital education. With its efficient exam management and intuitive user experience, it is well-suited to meet the growing demands of online education.

As the education sector embraces digital transformation, LaraQuiz-ExamPlatform is poised to remain a valuable asset in the digital education landscape, empowering educators and students with a streamlined assessment system.

---

## License
This project is open-source and free to use for educational purposes. Feel free to modify and adapt it as per your requirements.
