# 📚 CampusBookSwap – Online Book Exchange Platform

CampusBookSwap is a full-stack PHP web application that allows students to **sell**, **donate**, or **request** second-hand books within their university campus. It fosters sustainable education by connecting book donors and seekers through a trusted, easy-to-use platform.



## 🎯 Features

### 👥 User Features
- User registration and login
- Post books with details and images
- Edit/delete your listings
- Search books by title, author, or category
- Filter by condition, price range, or availability
- Message other users to negotiate or request
- Add books to favorites
- Manage your profile and listings from dashboard

### 🔧 Admin Features
- View all users and listings
- Approve or remove listings
- Handle reported books
- View basic platform analytics

---

## 🧰 Tech Stack

### Frontend
- HTML5, CSS3
- JavaScript (vanilla or jQuery)
- Tailwind CSS

### Backend
- PHP 
- MVC 
- Session management, form validation

### Database
- MySQL

### Tools & Libraries
- PHPMailer (for email alerts)
- Chart.js (for analytics)
- DomPDF (for downloadable reports)

---

## 🗂️ Project Structure (Example)

book-exchange-platform/
│
├── index.php                  # Homepage
├── .htaccess                  # Optional: URL rewriting
├── config/
│   └── db.php                 # Database connection file
│
├── controllers/               # PHP logic to handle requests
│   ├── AuthController.php
│   ├── BookController.php
│   ├── MessageController.php
│   └── AdminController.php
│
├── models/                    # PHP models to interact with DB
│   ├── User.php
│   ├── Book.php
│   ├── Message.php
│   └── Category.php
│
├── views/                     # UI pages (HTML + embedded PHP)
│   ├── auth/
│   │   ├── login.php
│   │   └── register.php
│   ├── books/
│   │   ├── list.php
│   │   ├── post.php
│   │   └── detail.php
│   ├── dashboard/
│   │   ├── user_dashboard.php
│   │   └── admin_dashboard.php
│   └── partials/
│       ├── header.php
│       ├── footer.php
│       └── navbar.php
│
├── public/                    # Publicly accessible assets
│   ├── css/
│   │   └── styles.css         # Tailwind build output
│   ├── js/
│   │   └── main.js
│   └── uploads/
│       └── book_images/       # Uploaded book photos
│
├── assets/                    # Optional: design assets, logos, etc.
│   ├── images/
│   └── icons/
│
├── README.md                  # Project documentation
└── database/
    └── book_exchange.sql      # Database schema dump
