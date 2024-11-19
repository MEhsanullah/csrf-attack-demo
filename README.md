# CSRF Attack Demonstration

## Introduction
This project demonstrates how a Cross-Site Request Forgery (CSRF) attack works using PHP, SQLite, and HTML. It simulates a real-world attack where an attacker exploits a user's authenticated session to perform unintended actions, such as withdrawing money from their account.

This demonstration includes:
1. **Database Setup** to initialize the application.
2. **A Vulnerable Main Application** to simulate user interactions.
3. **A Malicious Page** to perform the CSRF attack.

---

## Requirements
To run this demo, ensure you have:
1. **PHP** (Version 7 or higher)
   - Check if PHP is installed using: `php -v`
2. **SQLite** enabled in PHP.
   - Verify SQLite is enabled using: `php -m | grep sqlite3`

---

## How to Run the Demo

### Step 1: Download the Project
1. Download the project files and extract them to a folder on your system.
2. Ensure the folder contains the following files:
csrf-attack-demo/ 
├── db.sqlite # SQLite database file (created during setup) 
├── index.php # Main application logic 
├── setup.php # Initializes the SQLite database 
├── welcome.php # Interactive start page 
├── attacker.html # Malicious page for CSRF demonstration 
├── styles.css # CSS file for styling 
└── README.md # Instructions for running the demo


### Step 2: Start the PHP Server
1. Open a terminal or command prompt.
2. Navigate to the project directory:
```bash
cd path_to_your_project/csrf-attack-demo.

php -S localhost:8000

```
### Step 3: Open the Welcome Page

http://localhost:8000/welcome.php


### Demo Flow
1. Welcome Page
The welcome page provides three clear options for interacting with the demo:

### Initialize the Database:
Click this button to create the necessary database and add initial data.
This step is mandatory before proceeding to the main application.
### Go to the Main Application:
Use this option to access the vulnerable application, where you can withdraw money as a user.
View the Attacker's Page:
Open the malicious page that simulates a CSRF attack.
2. Database Initialization
Click the "Initialize the Database" button on the welcome page.
A confirmation popup will appear once the database is set up successfully.
After the setup, you’ll be redirected back to the welcome page.
3. Main Application (index.php)
Navigate to the main application by clicking "Go to the Main Application".
You will see:
The user John Doe with an initial balance of $1000.
A form to withdraw money from their account.
Enter an amount in the form and click "Withdraw" to simulate a legitimate transaction.
The balance will update dynamically after each transaction.
4. Simulating the CSRF Attack (attacker.html)
Open the attacker’s page by clicking "View the Attacker's Page".
The attacker’s page automatically submits a hidden form that withdraws $500 from the user’s account without their consent.
After visiting the attacker’s page, return to the main application (index.php) to see the updated balance, which reflects the unauthorized withdrawal.
