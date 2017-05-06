create table Sales (
	Date_Sold DATE not null,
	Staff_ID VARCHAR(50) not null,
	Total_Cost DECIMAL(12,2) not null,
	Invoice_ID INT not null,
    primary key(Invoice_ID),
    FOREIGN KEY (Staff_ID) REFERENCES Staff(Staff_ID)
);
insert into Sales (Date_Sold, Staff_ID, Total_Cost, Invoice_ID) values ('2016-11-19', 'rdumbare2', 820.01, 1);
insert into Sales (Date_Sold, Staff_ID, Total_Cost, Invoice_ID) values ('2016-07-03', 'rthorrington0', 2580.24, 2);
insert into Sales (Date_Sold, Staff_ID, Total_Cost, Invoice_ID) values ('2016-11-06', 'rthorrington0', 362.33, 3);
insert into Sales (Date_Sold, Staff_ID, Total_Cost, Invoice_ID) values ('2017-04-14', 'rthorrington0', 3542.36, 4);
insert into Sales (Date_Sold, Staff_ID, Total_Cost, Invoice_ID) values ('2016-05-29', 'rdumbare2', 6810.48, 5);
insert into Sales (Date_Sold, Staff_ID, Total_Cost, Invoice_ID) values ('2017-02-20', 'dmckennan1', 3499.83, 6);
insert into Sales (Date_Sold, Staff_ID, Total_Cost, Invoice_ID) values ('2016-10-25', 'dmckennan1', 1125.13, 7);
insert into Sales (Date_Sold, Staff_ID, Total_Cost, Invoice_ID) values ('2016-05-24', 'rthorrington0', 1418.85, 8);
insert into Sales (Date_Sold, Staff_ID, Total_Cost, Invoice_ID) values ('2016-10-14', 'dmckennan1', 297.72, 9);
insert into Sales (Date_Sold, Staff_ID, Total_Cost, Invoice_ID) values ('2017-04-26', 'rthorrington0', 6946.8, 10);

