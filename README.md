## Installation

### 1. Clone the Repository

1. Clone the repo
   
   ```sh
   git clone [https://github.com/ShaniGajera1993/Frontend-Task.git]
   ```
3. Copy the environment file & edit it accordingly
   ```sh
   cp .env.example .env
   ```
4. Generate an application key
   ```sh
   php artisan key:generate
   ```
6. Migrate database and run seeder
   ```sh
   php artisan migrate
   php artisan db:seed
   ```
5. Install the necessary dependencies
   ```sh
   composer install
   npm install
   npm run dev
   ```
6. Run Backend
   ```sh
   php artisan serve
   ```
