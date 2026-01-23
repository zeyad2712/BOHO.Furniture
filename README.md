# 🪑 BOHO Furniture - Premium E-Commerce Platform

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo">
</p>

**BOHO Furniture** is a sophisticated, high-end e-commerce platform built with Laravel 12, designed to provide a seamless and premium shopping experience for luxury furniture enthusiasts. The application features a clean, modern aesthetic with a focus on visual storytelling and user engagement.

---

## ✨ Key Features

### 🌍 Bilingual Experience
- **Full Localization**: Seamlessly switch between **English** and **Arabic**.
- **Localized Content**: Titles, descriptions, and UI elements are fully translated to cater to a global audience.

### 🛋️ Advanced Product Management
- **Dynamic Image Gallery**: Support for multiple professional images per product.
- **Detailed Specifications**: Comprehensive product details including dimensions (Width, Height, Depth), SKU, and availability.
- **Smart Filtering**: Category-based browsing and featured product showcases.
- **Interactive Reviews**: Real-time customer feedback and rating system.

### 🛠️ Powerful Admin Dashboard
- **Comprehensive Control**: Manage products, categories, users, and reviews from a central hub.
- **Media Management**: Dynamic control over landing page imagery and project videos.
- **Analytics at a Glance**: Overview of store performance and user activity.

### 🎨 Modern UI/UX
- **AOS Animations**: Smooth, scroll-triggered animations for a premium feel.
- **Glassmorphism Design**: Sleek, modern interface with depth and clarity.
- **Responsive Layout**: Optimized for Desktop, Tablet, and Mobile devices.
- **Wishlist System**: Let users save their favorite pieces for later.

---

## 🚀 Tech Stack

- **Backend**: [Laravel 12.x](https://laravel.com) (PHP 8.2+)
- **Frontend**: Blade Templates, [Tailwind CSS](https://tailwindcss.com), [Vite](https://vitejs.dev)
- **Database**: MySQL / SQLite
- **Interactions**: JavaScript (ES6+), [AOS (Animate On Scroll)](https://michalsnik.github.io/aos/)
- **Authentication**: Laravel Breeze
- **Communication**: Twilio SDK Integration

---

## 🛠️ Installation & Setup

Follow these steps to get the project running locally:

### 1. Clone the repository
```bash
git clone https://github.com/your-repo/boho-furniture.git
cd boho-furniture
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```
*Configure your database settings in the `.env` file.*

### 4. Database Setup & Assets
```bash
# Run migrations and seed the database
php artisan migrate --seed

# Link the storage directory for product images
php artisan storage:link
```

### 5. Start the Application
```bash
# Run the development server
php artisan serve

# Run Vite for frontend assets (Styles & Scripts)
npm run dev
```

---

## 📁 Project Structure Highlights

- `app/Models/Product.php`: Core logic for bilingual products and specifications.
- `app/Http/Controllers/Admin/`: Dedicated controllers for specialized admin management.
- `resources/views/`: Beautifully crafted Blade templates with localized support.
- `routes/web.php`: Clean, organized routing for both users and administrators.

---

## 📜 License

The BOHO Furniture platform is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

<p align="center">Made with ❤️ for the Love of Design</p>
