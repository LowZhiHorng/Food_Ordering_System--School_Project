# Food Ordering System — School Project

> SPM Computer Science Project (2024/2025) — A PHP & MySQL-based food ordering web application for school use.

![License](https://img.shields.io/badge/license-MIT-green)
![Language](https://img.shields.io/badge/language-PHP-yellow)
![GitHub](https://img.shields.io/badge/GitHub-LowZhiHorng/Food_Ordering_System--School_Project-black?logo=github)

---

## 📖 Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Usage](#usage)
- [Database](#database)
- [File Structure](#file-structure)
- [Troubleshooting](#troubleshooting)
- [License](#license)
- [Author](#author)

---

## Introduction
This project is a **school-level food ordering system** built with **PHP**, **HTML/CSS**, **JavaScript**, and **MySQL**.  
It allows **students to order food online** and **administrators to manage menu items, orders, and staff accounts**.

---

## Features
- **User Registration & Login**
- **Admin Login & Dashboard**
- **Menu Browsing** (with images)
- **Shopping Cart** & Checkout
- **Order History**
- **Food Management** (add, edit, delete menu items)
- **Staff Management**
- **Responsive UI**

---

## Tech Stack
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL (via XAMPP)
- **Server:** Apache (XAMPP)
- **Version Control:** GitHub

---

## Installation

### 1️⃣ Prerequisites
- [XAMPP](https://www.apachefriends.org/)
- PHP 7.4+
- MySQL

### 2️⃣ Setup Steps
1. **Clone or Download the Project**
   ```bash
   git clone https://github.com/LowZhiHorng/Food_Ordering_System--School_Project.git
   
2. **Move Project to XAMPP htdocs**
   ```bash
   mv Food_Ordering_System--School_Project /xampp/htdocs/
   
3. **Import Database**
- Open phpMyAdmin
- Create a database:
  ```sql
  CREATE DATABASE spp_sateking;
- Import spp_sateking.sql from the project folder.

4. **Configure Database Connection**
- Edit db_conn.php with your MySQL username/password.

5. **Run the Application**
- Start Apache & MySQL in XAMPP
- Visit:
  ```bash
  http://localhost/Food_Ordering_System--School_Project/spp_sateKing

---

## Usage
**User**
1. Register using borang_daftar.php
2. Login
3. Browse menu and add items to cart
4. Checkout and confirm orders

**Admin**
1. Login via borang_loginAdmin.php
2. Manage menu, orders, and staff accounts
3. View reports and order details

---

## Database
**Main tables include:**
- users — customer accounts
- admin — admin accounts
- menu — food items
- orders — customer orders
- staff — staff info

---

## File Structure

Food_Ordering_System--School_Project/
│   README.md
│   spp_sateking.sql
│
├── gambar/              # Images (food + system UI)
│   ├── sate/
│   └── system/
│
├── spp_sateKing/         # PHP application files
│   ├── index.php
│   ├── borang_daftar.php
│   ├── borang_login.php
│   ├── menu.php
│   ├── bakul_saya.php
│   ├── ...
│
└── testCase/             # Test images and data

---

## Troubleshooting
- Blank Page: Check PHP error logs and ensure display_errors is enabled in php.ini.
- Database Error: Verify database name, username, and password in db_conn.php.
- Images Not Loading: Ensure gambar/ is in the correct path relative to PHP files.

---

## License
**This project is licensed under the MIT License.**

---

## Author
**Low Zhi Horng**
**GitHub: LowZhiHorng**
**Profile:**
```bash
https://github.com/LowZhiHorng
```
