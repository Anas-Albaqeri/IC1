# IC1 - Automobile Insurance system 


## Overview
This Insurance System is designed to showcase fundamental skills in PHP, CSS, HTML, and JavaScript. It incorporates a multi-role user system, where each role has specific permissions and functionalities. This system is tailored to meet the requirements of different positions within an insurance company.

## System Roles and Credentials
The system includes the following user roles with their respective login credentials:

1. **General Manager**
   - Username: Anas.Hafedh
   - Password: 123456
   - Permissions: View and flag data in tables, no direct access to modify.

2. **Underwriter**
   - Username: Robil.Sabek
   - Password: 123456
   - Permissions: Restricted to direct updates on the database.

3. **Policy Manager**
   - Username: Jane.Doe
   - Password: 123456
   - Permissions: Full authorization for direct updates.

4. **Financial Manager**
   - Username: John.Doe
   - Password: 123
   - Permissions: Direct access to financial tables.

5. **Claims Manager**
   - Username: Rissal.Hedhna
   - Password: 123456
   - Permissions: Restricted access to financial database tables.

Each employee role has specified functions as required by the client.

## Database Configuration
- Database Name: IC1
- Database User: root
- Database Password: root
- Database Host: localhost

## System Workflow
- Underwriters are restricted from making direct updates to the database.
- Policy Managers have full authorization to perform direct updates.
- Claims Managers have restricted access to financial database tables.
- Financial Managers have direct access to financial tables.
- General Managers can view and flag data in tables but cannot directly modify them.

## Implementation Notes
- Import the database using the provided credentials.
- If needed, change the storage engine to InnoDB via phpMyAdmin operations.

## Getting Started
To get started with this system:
1. Ensure your local server environment (like XAMPP or WAMP) is set up correctly.
2. Import the `IC1` database into your MySQL server.
3. Login using the credentials provided for the respective roles to explore the functionalities specific to each role.

## Enjoy!
We hope you find this system demonstrates the key skills and fundamentals of web development effectively. Enjoy exploring and testing the functionalities!
