create table Items_Sold (
	Item_Id INT Not Null,
	No_Sold INT Not Null,
	Date_Sold DATE Not Null,
    primary key (Item_Id, Date_Sold),
    FOREIGN KEY (Item_ID) REFERENCES Items(Item_ID)
);
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (1, 87, '2016-09-27');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (2, 78, '2016-05-24');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (3, 70, '2017-04-10');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (4, 11, '2016-08-27');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (5, 25, '2016-05-02');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (6, 82, '2017-01-15');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (7, 66, '2016-06-20');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (8, 82, '2016-06-18');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (9, 26, '2016-07-02');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (10, 95, '2016-05-31');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (11, 33, '2016-09-09');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (12, 76, '2016-10-24');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (13, 51, '2017-02-01');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (14, 56, '2017-01-03');
insert into Items_Sold (Item_Id, No_Sold, Date_Sold) values (15, 19, '2016-10-04');
