# User Management System with Access Control

This project is a User Management System with Access Control implemented in PHP and MySQL. It includes functionalities for managing users with different roles (Super Admin, Admin, and User), as well as basic functionalities like searching and pagination.

## Task 1: Access Control Management

### Features

- Super Admin: Full access to Add, Edit, and Delete users (registration not required).
- Admin: Access to Add and Delete users (registration not required).
- User: Update profile details (registration required + admin approval).

### Implementation

1. Create a database table for managing user basic details: name, role, mobile, email, address, gender, Date of Birth, profile picture, and signature.
2. Super Admin or Admin login to get all users' information from the database and display the data.

## Task 2: Basic Functionality – Search & Pagination

### 2.a) PHP Pagination for Employee Information

- Retrieve and display Employee information with PHP Pagination.
- Display 10 employees per page in a table.

### 2.b) File Management System

- Develop a File Management System allowing users to upload identity files (e.g., Aadhar card, Pan card).
- Users can view their uploaded files at any time.

### Implementation

1. Create a database table for managing employee details.
   - Basic Details: Employee Name, Designation, Date of Birth, Date of Joining, Blood Group, Mobile, Email, Address (Location).
2. Display employee data in a table with PHP Pagination and implement a search feature through backend queries.
3. Allow users to upload identity files, displaying a preview image before the final submission.

## How to Run

1. Clone the repository.
2. Import the database schema from `database folde/ client.sql`.
3. Configure the database connection in `config.php`.
4. Open the application in a web browser.

## Screenshots

Include screenshots or GIFs demonstrating the system in action.

## Technologies Used

- PHP
- MySQL
- HTML
- CSS
- JavaScript

## License

Abishek Nookathoti.
