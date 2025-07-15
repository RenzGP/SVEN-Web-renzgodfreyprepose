# SVEN-Web-renzgodfreyprepose
# Pawtastic - Pet Grooming Appointment System

A simple web application for scheduling pet grooming appointments

## Technologies Used
- **Laravel 10** – PHP backend framework
- **Vue 3 + Inertia.js** – Frontend reactive UI
- **Tailwind CSS** – Styling
- **MySQL** – Database
- **Git** – Version control

## Repository
GitHub: [SVEN-Web-renzgodfreyprepose](https://github.com/RenzGP/SVEN-Web-renzgodfreyprepose.git)

---

##  Setup Instructions
# 1. Clone the repository
git clone https://github.com/RenzGP/SVEN-Web-renzgodfreyprepose.git
cd SVEN-Web-renzgodfreyprepose

# 2. Install dependencies
composer install
npm install

# 3. Setup environment file
cp .env.example .env
php artisan key:generate

# 4. Configure your .env
# (open .env in a text editor and set your DB credentials)

# 5. Run migrations and start development servers
php artisan migrate
npm run dev
php artisan serve
