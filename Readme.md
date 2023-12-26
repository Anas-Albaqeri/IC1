# IC1 - Automobile Insurance system 
<img width="919" alt="Screenshot 2023-12-26 024509" src="https://github.com/Anas-Albaqeri/IC1/assets/127996785/6b483357-66ad-4d62-af76-93e2848433e5">


## Overview
This Insurance System is designed to showcase fundamental skills in PHP, CSS, HTML, and JavaScript. It incorporates a multi-role user system, where each role has specific permissions and functionalities. This system is tailored to meet the requirements of different positions within an insurance company, specifically the Automobile Department of the Company.

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
  They responsiblity of the underwriter inlcludes adding new policies, reviweing pending and flagged policies and reporting directly to the Policy manager of the department
  <img width="866" alt="image" src="https://github.com/Anas-Albaqeri/IC1/assets/127996785/a7543137-ef17-44d1-9973-b83315940cba">

  
- Policy Managers have full authorization to perform direct updates.
  policy managers are responsible for admitting new policies, managing current policies (renewals, canceling, modiications, flagging ..etc)
  <img width="844" alt="image" src="https://github.com/Anas-Albaqeri/IC1/assets/127996785/ab66f69a-89d0-416c-a75d-7825d4b8db85">

- Claims Managers have restricted access to financial database tables.
  claim managers are responsible for filing new claims reported by clients and admitted by the inspection and authentication department of the company.
  <img width="871" alt="image" src="https://github.com/Anas-Albaqeri/IC1/assets/127996785/5b5fc339-9e83-41fb-bc5c-505aa5d37da2">

- Financial Managers have direct access to financial tables.
  They manage the full finances of the department, including settlements, policies and permiums.
  <img width="960" alt="image" src="https://github.com/Anas-Albaqeri/IC1/assets/127996785/8bd0a95d-005c-4c06-879f-4ce5e12d0af6">

- General Managers can view and flag data in tables but cannot directly modify them.
  General Manager of the department has the essential informations of the department and the essentials to manage all the outs and ins of the department.
  <img width="908" alt="image" src="https://github.com/Anas-Albaqeri/IC1/assets/127996785/3ad03516-acb5-406a-a13a-3253b90f9c2c">


## Implementation Notes
<img width="358" alt="image" src="https://github.com/Anas-Albaqeri/IC1/assets/127996785/1837d943-ebc7-4e76-bef5-ead34f7b3391">

- Import the database using the provided credentials.
  <img width="940" alt="image" src="https://github.com/Anas-Albaqeri/IC1/assets/127996785/db6317cb-5c63-447c-ad49-58511988f6ba">

- If needed, change the storage engine to InnoDB via phpMyAdmin operations not only becauase its reliable and achieves the best performance, but also as it is the deafult eninge for MySQL and would face the least issues running the db.
  <img width="755" alt="image" src="https://github.com/Anas-Albaqeri/IC1/assets/127996785/03a8e4f2-2e65-4e4d-a53e-e03266cfd411">


## Getting Started
To get started with this system:
1. Ensure your local server environment (like XAMPP or WAMP) is set up correctly.
2. Import the `IC1` database into your MySQL server.
3. Login using the credentials provided for the respective roles to explore the functionalities specific to each role.

## Enjoy!
We hope you find this system demonstrates the key skills and fundamentals of web development effectively. Enjoy exploring and testing the functionalities!

And as always
<img width="332" alt="image" src="https://github.com/Anas-Albaqeri/IC1/assets/127996785/5cf1e659-1e24-44f2-9e2b-2d480fe6345d">

