# Econaur - Economic Data Management Platform

Econaur is a modern web application built with Laravel and Vite, designed to provide a robust and efficient platform for economic and financial data management.

## Features

- 📊 Advanced data visualization and analytics
- 🔐 Secure user authentication and authorization
- 📈 Real-time data updates and monitoring
- 📱 Responsive design for all devices
- 🔄 API-first approach for data exchange
- 📑 Comprehensive reporting system
- 🔍 Advanced search and filtering
- 🌐 Multi-language support

## Tech Stack

- **Backend**: Laravel 10.x
- **Frontend**: 
  - Vite
  - TailwindCSS
  - JavaScript
- **Database**: MySQL 8.0+
- **Cache**: Redis (optional)
- **Queue**: Laravel Queue

## Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js 16+ and NPM
- MySQL 8.0 or higher
- Git

## Installation

1. Clone the repository
```bash
git clone https://github.com/Anj2805/Econaur.git
cd Econaur
```

2. Install PHP dependencies
```bash
composer install
```

3. Install Node.js dependencies
```bash
npm install
```

4. Create environment file
```bash
cp .env.example .env
```

5. Generate application key
```bash
php artisan key:generate
```

6. Configure your database in `.env` file
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=econaur
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Run database migrations
```bash
php artisan migrate
```

8. Build assets
```bash
npm run build
```

9. Start the development server
```bash
php artisan serve
```

## Development

1. Start Vite development server
```bash
npm run dev
```

2. Run Laravel development server
```bash
php artisan serve
```

## Testing

```bash
php artisan test
```

## Deployment

### Recommended Platforms

1. **Laravel Forge + DigitalOcean**
   - Full Laravel support
   - Easy deployment
   - Good performance

2. **Railway.app**
   - Modern platform
   - Good Laravel support
   - Free tier available

3. **Heroku**
   - Well-established platform
   - Good documentation
   - Free tier available

### Deployment Steps

1. Set up your production environment variables
2. Run database migrations
3. Build assets for production
4. Configure web server
5. Set up SSL certificate
6. Configure queue worker (if using)

## Project Structure

```
Econaur/
├── app/
│   ├── Http/
│   ├── Models/
│   └── Services/
├── config/
├── database/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
├── storage/
└── tests/
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Security

If you discover any security-related issues, please email [your-email@example.com] instead of using the issue tracker.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For support, email [your-email@example.com] or open an issue in the repository.

## Acknowledgments

- [Laravel](https://laravel.com)
- [Vite](https://vitejs.dev)
- [TailwindCSS](https://tailwindcss.com)
- [MySQL](https://www.mysql.com)
