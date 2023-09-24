# SayKhan

Welcome to the SayKhan Project's README file. This project is designed with the primary aim of providing a convenient and efficient platform for doctors and their assistants to manage patient records seamlessly. Additionally, patients will have the capability to access their records in PDF format, ensuring easy and secure access to their medical history.

### Project Installation

.env was missing after you clone this repo. You need to recreate .env file and generate key.

```bash
cd say-khan
```

```bash
composer update
```

```bash
php artisan key:generate
php artisan storage:link
```
