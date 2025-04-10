# 🍽️ Cloud Kitchen – Menu Management Web App

Cloud Kitchen is a full-stack menu management system built for cloud-based or virtual kitchens. It allows restaurant administrators to manage their menu items with a clean, responsive admin panel while customers can view the updated menu on a separate user-friendly landing page.

---

## 🚀 Features

### 👨‍💼 Admin Panel
- Secure login page for admin access
- Add, edit, and delete menu items
- Real-time updates without page reloads
- Clean, responsive admin UI using HTML, CSS, and JavaScript

### 🍴 Customer-Facing Page
- Stylish and responsive homepage (`index.html`)
- Displays dynamic menu content fetched from the database
- CSS animations for engaging visual effects

### ⚙️ Backend Functionality
- PHP scripts for CRUD operations:
  - `add_menu.php`
  - `edit_menu.php`
  - `delete_menu.php`
  - `fetch_menu.php`
- `db.php` for managing secure MySQL database connections
- AJAX-based frontend communication for smooth UX

---

## 🛠️ Tech Stack

| Layer         | Technology             |
|---------------|-------------------------|
| **Frontend**  | HTML, CSS, JavaScript   |
| **Backend**   | PHP, MySQL              |
| **Database**  | MySQL (via PHPMyAdmin)  |
| **DevOps**    | Docker                  |
| **Package Mgmt** | Composer              |

---

## 📁 Folder Structure
cloud-kitchen-app-main/
├── Dockerfile
├── composer.json
├── db.php
└── public/
    ├── admin.html, admin.css, admin.js
    ├── index.html, index.php
    ├── login.html
    ├── styles.css
    ├── add_menu.php, edit_menu.php, delete_menu.php, fetch_menu.php
    └── images/
![Screenshot 2025-04-10 105012](https://github.com/user-attachments/assets/ca344a41-2a42-4bdb-9ef1-5ff286a43710)
![Screenshot 2025-04-10 105111](https://github.com/user-attachments/assets/ac2b837f-9f47-4c35-bd76-d64848465df8)
![Screenshot 2025-04-10 105137](https://github.com/user-attachments/assets/aae2b93a-5653-4f34-9a29-32a6ee568a5c)
![Screenshot 2025-04-10 105235](https://github.com/user-attachments/assets/21355137-0c5f-4140-a49a-f9030c03c690)
![Screenshot 2025-04-10 105319](https://github.com/user-attachments/assets/426418d8-4659-41e1-b1ef-f03bafaadabd)
![Screenshot 2025-04-10 105337](https://github.com/user-attachments/assets/a60c3552-0103-4e52-8691-03e87101ea3b)
![Screenshot 2025-04-10 105351](https://github.com/user-attachments/assets/980c5df9-53cb-4ae0-ac06-cca1b4b337a9)




## 🐳 Docker Support

This project includes a `Dockerfile` for containerized deployment. You can easily run this app with Docker to ensure consistency across environments.

```bash
# Build the container
docker build -t cloud-kitchen .

# Run the container
docker run -p 8080:80 cloud-kitchen

💡 Future Enhancements
Image upload for dishes
Authentication with JWT or sessions
Search and filter functionality
React-based frontend version
Order management system

🤝 Contributing
Contributions are welcome! Feel free to fork the repo and submit a pull request.
