create table Category (
	Category_ID INT not null,
	Category_Name VARCHAR(20) not null,
    primary key (Category_ID)
);
insert into Category (Category_ID, Category_Name) values (1, 'medicine');
insert into Category (Category_ID, Category_Name) values (2, 'health care products');
insert into Category (Category_ID, Category_Name) values (3, 'accessories');
