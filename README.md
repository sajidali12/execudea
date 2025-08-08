# Execudea - Laravel 11 Website

This is the converted Laravel 11 version of the Execudea website, transformed from React/Inertia.js to traditional Blade templates while maintaining the exact same frontend design.

## Features

- **Homepage** with hero section, services, portfolio, testimonials, and latest blog posts
- **About Page** with company information and technology showcase
- **Service Pages**: UX Design, Web Development, SEO, and WordPress Development
- **Blog System** with article listing and detailed post views
- **Contact Form** with validation and email notifications
- **Responsive Design** with Tailwind CSS
- **Google Reviews Carousel** using Swiper.js
- **Technology Showcases** with animated carousels

## Tech Stack

- **Laravel 11** - PHP Framework
- **Blade Templates** - Server-side templating
- **Tailwind CSS** - Utility-first CSS framework
- **Swiper.js** - Modern touch slider
- **AOS** - Animate On Scroll library
- **Font Awesome** - Icon library

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd execudea
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   - Create a MySQL database named `execudea`
   - Update your `.env` file with database credentials
   - Run migrations:
   ```bash
   php artisan migrate
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start the server**
   ```bash
   php artisan serve
   ```

## Pages Structure

### Main Pages
- `/` - Homepage
- `/about` - About page
- `/contact` - Contact form
- `/blog` - Blog listing
- `/blog/{id}-{slug}` - Individual blog post

### Service Pages
- `/User-Experience-Design` - UX Design services
- `/web-development` - Web Development services
- `/Search-Engine-Optimization` - SEO services
- `/Wordpress-development` - WordPress services

## Key Components

### Blade Templates
- `layouts/app.blade.php` - Main layout
- `partials/navbar.blade.php` - Navigation bar
- `partials/footer.blade.php` - Footer
- `partials/google-reviews.blade.php` - Reviews carousel
- `partials/tech-logos.blade.php` - Technology carousel

### Controllers
- `HomeController` - Homepage and about page
- `BlogController` - Blog functionality
- `ContactController` - Contact form handling
- `ServiceController` - Service pages

## Styling

The project uses Tailwind CSS with custom colors defined in the configuration:
- **Primary**: #4db8b3 (teal)
- **Secondary**: #fc4258 (red)
- **Secondary-400**: #feb2b4 (light red)

Custom fonts (Futura) are loaded for headings and used throughout the design.

## Development

To work on the project:

1. **Start the development server**
   ```bash
   php artisan serve
   ```

2. **Watch for CSS changes** (in development)
   ```bash
   npm run dev
   ```

3. **Build for production**
   ```bash
   npm run build
   ```

## Features Converted from React

✅ **Completed Conversions:**
- Homepage with all sections (hero, services, portfolio, clients, blog, reviews)
- About page with technology showcase
- All service pages (UX, Web Dev, SEO, WordPress)
- Blog listing and individual post pages
- Contact form with validation
- Responsive navigation with mobile menu
- Google Reviews carousel
- Technology logo carousels
- All styling and animations preserved

✅ **Laravel Features:**
- Clean routing structure
- Controller-based architecture
- Blade template inheritance
- Form validation and handling
- Database integration for blog posts
- Email notifications for contact form
- SEO-friendly URLs
- Asset compilation with Vite

## Database Models

- **Post** - Blog posts with title, body, image, and author
- **Message** - Contact form submissions
- **User** - Admin users (from existing Laravel auth)

## Admin Features

The existing admin functionality for managing blog posts and viewing messages has been preserved and can be accessed through the Laravel auth system.

## Browser Support

The website is optimized for modern browsers and includes:
- Responsive design for mobile, tablet, and desktop
- CSS animations and transitions
- Modern JavaScript features (ES6+)
- Progressive enhancement

---

**Note**: This conversion maintains the exact same visual design and user experience as the original React version while providing the benefits of server-side rendering and traditional Laravel architecture.
