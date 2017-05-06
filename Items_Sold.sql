create table Items_Sold (
	Invoice_ID INT not null,
	Item_ID INT not null,
	Qty INT not null,
	Cost DECIMAL(12,2) not null,
    primary key (Invoice_ID, Item_ID),
    FOREIGN KEY (Item_ID) REFERENCES Items(Item_ID),
    FOREIGN KEY (Invoice_ID) REFERENCES Sales(Invoice_ID)
);
insert into Items_Sold (Invoice_ID, Item_ID, Qty, Cost) values (1, 3, 43, 820.01);
insert into Items_Sold (Invoice_ID, Item_ID, Qty, Cost) values (2, 4, 26, 2580.24);
insert into Items_Sold (Invoice_ID, Item_ID, Qty, Cost) values (3, 3, 19, 362.33);
insert into Items_Sold (Invoice_ID, Item_ID, Qty, Cost) values (4, 1, 76, 3542.36);
insert into Items_Sold (Invoice_ID, Item_ID, Qty, Cost) values (5, 2, 72, 6810.48);
insert into Items_Sold (Invoice_ID, Item_ID, Qty, Cost) values (6, 2, 37, 3499.83);
insert into Items_Sold (Invoice_ID, Item_ID, Qty, Cost) values (7, 3, 59, 1125.13);
insert into Items_Sold (Invoice_ID, Item_ID, Qty, Cost) values (8, 2, 15, 1418.85);
insert into Items_Sold (Invoice_ID, Item_ID, Qty, Cost) values (9, 4, 3, 297.72);
insert into Items_Sold (Invoice_ID, Item_ID, Qty, Cost) values (10, 4, 70, 6946.8);

