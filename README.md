# 🍢 Food Ordering System — School Project

> A web-based food ordering platform for "Sate King", developed as a 2024/2025 SPM Computer Science project.  
> Built with **PHP**, **MySQL**, **HTML/CSS**, and **JavaScript**.

[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)
[![PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)](https://developer.mozilla.org/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)](https://developer.mozilla.org/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?logo=javascript&logoColor=black)](https://developer.mozilla.org/docs/Web/JavaScript)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?logo=xampp&logoColor=white)](https://www.apachefriends.org/)
[![GitHub](https://img.shields.io/badge/GitHub-Food_Ordering_System--School_Project-black?logo=github)](https://github.com/LowZhiHorng/Food_Ordering_System--School_Project)

---

## 📖 Introduction
The **Food Ordering System** allows customers to browse menus, place orders, and track their order status online.  
It includes an **Admin Panel** for managing menu items, orders, and users, making it a complete small-scale restaurant management system.

This project is designed to run locally using **XAMPP** or similar PHP/MySQL environments.

---

## ✨ Features
### 👤 For Customers
- User registration & login
- Browse menu with images & prices
- Add items to cart
- Place orders and view order history

### 🛠 For Admins
- Admin login
- Add, edit, or delete menu items
- Manage customer orders
- View registered users

---

## 📂 Project Structure
```bash
Food_Ordering_System--School_Project/
└── Food_Ordering_System--School_Project-main
├── README.md # Project documentation
├── gambar/ # Images used in the system
│ ├── sate/ # Menu item images (Sate dishes)
│ │ ├── sateAyam.jpg # Chicken satay image
│ │ ├── sateBabi.jpg # Pork satay image
│ │ ├── sateIkan.jpeg # Fish satay image
│ │ ├── sateKambing.jpg # Goat satay image
│ │ ├── sateLembu.jpg # Beef satay image
│ │ └── sateSotong.jpg # Squid satay image
│ └── system/ # UI icons & banners
│ ├── Banner.png # Main website banner
│ ├── admin.png # Admin icon
│ ├── bakul.png # Cart icon
│ ├── daftar.png # Register icon
│ ├── delete.png # Delete icon
│ └── edit.png # Edit icon
│
├── spp_sateKing/ # Main PHP source code
│ ├── bakul_saya.php # Customer cart page
│ ├── borang_daftar.php # Customer registration form
│ ├── borang_login.php # Customer login page
│ ├── borang_loginAdmin.php # Admin login page
│ ├── borang_makanan.php # Add/edit menu item form
│ ├── db_conn.php # Database connection settings
│ ├── edit_makanan.php # Edit menu item processing
│ ├── footer.php # Website footer
│ ├── header.php # Website header
│ ├── index.php # Landing page
│ ├── logout.php # Logout script
│ ├── main.php # Main dashboard page
│ ├── maklumat_pesanan.php # Order details page
│ ├── menu.php # Menu listing page
│ ├── nav.php # Navigation bar (user)
│ ├── nav2.php # Navigation bar (admin)
│ ├── padam_makanan.php # Delete menu item
│ ├── proses_daftar.php # Process registration form
│ ├── proses_login.php # Process customer login
│ ├── proses_makanan.php # Process menu item submission
│ ├── proses_muatnaik.php # Handle file uploads (e.g., food images)
│ ├── senarai_makanan.php # List all menu items (admin)
│ ├── senarai_pesanan.php # List all customer orders (admin)
│ ├── senarai_staf.php # List all staff (admin)
│ └── session.php # Session management
│
├── spp_sateking.sql # MySQL database dump
│
└── testCase/ # Testing resources
├── sate-ayam.jpg # Sample image for testing
└── staf.csv # Sample staff CSV file
```

---

## 🛠 Installation Guide
1. **Download & Install XAMPP**  
   [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html)

2. **Clone or Download the Project**  
   Place the folder inside `htdocs:C:\xampp\htdocs\Food_Ordering_System`

3. **Import the Database**  
   - Open **phpMyAdmin** via `http://localhost/phpmyadmin`
   - Create a new database (e.g., `spp_sateking`)
   - Import `spp_sateking.sql` from the project folder

4. **Configure Database Connection**  
   Open `spp_sateKing/db_conn.php` and ensure:
   ```php
   $servername = "localhost";
   $username   = "root";
   $password   = "";
   $dbname     = "spp_sateking";
   
5. **Run the Application**
   Visit:
   ```bash
   http://localhost/Food_Ordering_System--School_Project/spp_sateKing/

---

## 🚀 Usage

### 🔑 Default Credentials  
*(These can be changed in the database via phpMyAdmin)*  

#### 🛠 Admin  
- **Username:** `admin`  
- **Password:** `admin123`  

#### 👤 Customer  
- Create an account via the registration form in the application.

---

## 🗄 Database Schema
The system uses a MySQL database with the following tables:

1. **admin**

| Column       | Type         | Description             |
| ------------ | ------------ | ----------------------- |
| login\_id    | varchar(50)  | Admin username          |
| kata\_laluan | varchar(50)  | Password (hashed/plain) |
| nama         | varchar(255) | Admin name              |


2. **makanan** (Menu Items)

| Column     | Type         | Description            |
| ---------- | ------------ | ---------------------- |
| kodMakanan | varchar(3)   | Menu item code         |
| makanan    | varchar(255) | Name of the food       |
| harga      | double       | Price                  |
| gambar     | varchar(50)  | Image filename         |
| login\_id  | varchar(50)  | Admin who added/edited |


3. **maklumat_pesanan** (Order Details)

| Column     | Type       | Description      |
| ---------- | ---------- | ---------------- |
| noPesanan  | varchar(5) | Order number     |
| kodMakanan | varchar(3) | Menu item code   |
| kuantiti   | int(3)     | Quantity ordered |


4. **pelanggan** (Customers)

| Column    | Type         | Description           |
| --------- | ------------ | --------------------- |
| noTelefon | varchar(12)  | Customer phone number |
| nama      | varchar(255) | Customer name         |


5. **pesanan** (Orders)

| Column    | Type        | Description           |
| --------- | ----------- | --------------------- |
| noPesanan | varchar(5)  | Order number          |
| tarikh    | date        | Order date            |
| noTelefon | varchar(12) | Customer phone number |



---

## ❗ Troubleshooting

**Blank page / PHP errors** → Enable PHP error reporting in *php.ini*

**Database connection failed** → Check *db_conn.php* credentials

**Images not loading** → Ensure the `gambar/` folder remains in the correct relative path

---

## 📜 License
**This project is licensed under the [![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)**

---

## 👤 Author
**Low Zhi Horng**

**📂 GitHub: [![GitHub](https://img.shields.io/badge/GitHub-LowZhiHorng-black?logo=github)](https://github.com/LowZhiHorng)**
