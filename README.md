# SayKhan

Welcome to the SayKhan Project's README file. This project is designed with the primary aim of providing a convenient and efficient platform for doctors and their assistants to manage patient records seamlessly. Additionally, patients will have the capability to access their records in PDF format, ensuring easy and secure access to their medical history.

### Requirements

Before You Begin,Please make sure you have met the following requirements:

-   PHP>=8.0
-   Composer(For Laravel Installation)
-   Node.js and NPM(For Tailwind CSS)
-   MySQL Database

### Project Installation

To install and set up the SayKhan Project, follow these steps:

1. Clone this repository:

```bash
https://github.com/lara-camp/say-khan.git
```

2. Change to the project directory:

```bash
cd say-khan
```

3. Update Composer:

```bash
composer update
```

4. Copy the '.env.example' to '.env':

```bash
cp .env.example .env
```

5. Generate A key:

```bash
php artisan key:generate
```

6. Link Storage to Public Directory:

```bash
php artian storage:link
```

7. Install Node.js dependencies:

```bash
npm install
```

8. Compile the assets:

```bash
npm run dev
```

9. Start laravel Server:

```bash
php artisan serve
```

## License

This SayKhan project is open-source software licensed under the [Our SayKhan](LICENSE).
