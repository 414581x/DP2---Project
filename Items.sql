create table Items (
	Item_ID INT not null,
	Category_ID INT not null,
	Brand VARCHAR(50) not null,
	Item_Name VARCHAR(50) not null,
	Qty INT not null,
	Price DECIMAL(8,2) not null,
    primary key (Item_ID),
    FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID)
);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (1, 3, 'Aconite', 'Aconitum napellus,', 70, 46.61);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (2, 1, 'Hydrochlorothiazide', 'Hydrochlorothiazide', 79, 94.59);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (3, 3, 'Doxycycline Hyclate Capsules', 'Doxycycline Hyclate', 22, 19.07);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (4, 1, 'Doxycycline', 'Doxycycline', 18, 99.24);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (5, 1, 'Amoxicillin and Clavulanate Potassium', 'Amoxicillin and Clavulanate Potassium', 79, 21.96);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (6, 1, 'Etodolac', 'Etodolac', 94, 59.24);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (7, 2, 'hemorrhoidal', 'glycerin, phenylephrine HCl', 67, 11.2);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (8, 1, 'Imipramine Pamoate', 'Imipramine Pamoate', 23, 57.45);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (9, 3, 'PROMETHAZINE DM', 'Dextromethorphan Hydrobromide ', 2, 34.52);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (10, 2, 'Jentadueto', 'linagliptin', 27, 78.83);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (11, 1, 'Haloperidol', 'Haloperidol', 65, 89.06);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (12, 2, 'Acyclovir', 'Acyclovir', 54, 69.35);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (13, 1, 'Furosemide', 'Furosemide', 97, 85.62);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (14, 3, 'TYLENOL with Codeine', 'acetaminophen and codeine phosphate', 38, 24.9);
insert into Items (Item_ID, Category_ID, Brand, Item_Name, Qty, Price) values (15, 3, 'ANTIBACTERIAL HAND', 'CHLOROXYLENOL', 91, 7.91);
