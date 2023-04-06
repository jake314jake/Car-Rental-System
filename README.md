# Car-Rental-System
Design and implementation a database for keeping track of information about a car rental company(system)
# DESCRIPTION
A car rental system is a software application that manages the rental of vehicles to customers. The system is designed to help car rental companies automate their rental processes, streamline their operations, and improve customer experience. The system typically includes a database to store information about customers, vehicles, rental agreements, rental agencies, and other related information.



# Steps 

## First : ER schema diagram
## Entities:

1/Customer 

2/Car

3/Rental Agreement

4/Rental Agency

5/Payment

## Relations:

1/A customer can rent one or more cars. 

2/A car can be rented by one or more customers. 

3/A rental agreement is made between a customer and a rental agency for a specific car.

4/A rental agency can have multiple rental agreements with different customers for different cars.

5/A customer makes a payment for a rental agreement.

6/A rental agreement includes information about the rental period, the rented car, the rental price, and any additional charges.

7/A rental agency is responsible for maintaining the cars and ensuring they are in good condition for rental.

8/A customer may have a loyalty program with a rental agency, which offers discounts or other benefits.



### Entities before normalization:
### Customer:
---
Customer ID (primary key)

First name

Last name

Address

Phone number

Email address

Loyalty program information (if applicable)

### Car:
---
Car ID (primary key)

Make and model

Year

Color

License plate number

Rental agency ID (foreign key referencing Rental Agency table)

Availability status



### Rental Agency:
---
Agency ID (primary key)

Agency name

Address

Phone number

Email address

Partnership information (if any)

Additional services offered (if any)

### Rental Agreement:
---
Agreement ID (primary key)

Rental start date and time

Rental end date and time

Rental price

Customer ID (foreign key referencing Customer table)

Car ID (foreign key referencing Car table)

Rental agency ID (foreign key referencing Rental Agency table)


### Payment:
---
Payment ID (primary key)

Payment date 

Payment amount

Payment method (credit card, cash, etc.)

Rental agreement ID (foreign key referencing Rental Agreement table)
### Entities after normalization:
### 1)Customer:
---
Customer ID (primary key)

First name

Last name

Email address

Loyalty program ID (foreign key referencing Loyalty Program table)

### 2)Car:
---
Car ID (primary key)

model

Year

Color

License plate number

Rental agency ID (foreign key referencing Rental Agency table)

Car status ID (foreign key referencing Car Status table)

### 3)Rental Agreement:
---
Agreement ID (primary key)

Rental start date and time

Rental end date and time

Rental price

Additional charges (if any)

Customer ID (foreign key referencing Customer table)

Car ID (foreign key referencing Car table)

Rental status ID (foreign key referencing Rental Status table)

### 4)Rental Agency:
---
Agency ID (primary key)

Agency name

Address

Phone number

Email address

### 5)Payment:
---
Payment ID (primary key)

Payment date and time

Payment amount

Payment method (credit card, cash, etc.)

Rental agreement ID (foreign key referencing Rental Agreement table)

### 6)Loyalty Program:
---
Loyalty program ID (primary key)

Loyalty program name


### 7)Loyalty Program Discount:
---
Loyalty program ID (foreign key)

Discount percentage

### 8)Car Status:
---
Car status ID (primary key)

Car status name

### 9)Rental Status:
---

Rental status ID (primary key)

Rental status name

### USE CASE :




![Untitled](https://user-images.githubusercontent.com/90989827/230389561-0a345a00-eb05-416d-9f8c-7aaad0de3539.png)
### Logical Model:
![photo_2023-04-06_14-15-53](https://user-images.githubusercontent.com/90989827/230389910-d305404b-75bd-494e-9b9d-360ae352db2b.jpg)

### NB :
"Car Status" ={ "available", "rented", "in maintenance", "out of service"};

"Rental Status" ={"reserved", "rented", "returned", "overdue", "cancelled"}


