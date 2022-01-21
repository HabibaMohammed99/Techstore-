insert into cats(`name`) values('laptops'),('pcs'),('mobiles');

insert into products(`name`,`desc`,`price`,`pieces_no`,`img`,cat_id) 
values
('lenovo','this is dumy description to this product',15000,10,'1.jpg',1),
('toshiba','this is dumy description to this product',13000,20,'2.jpg',1),
('hp','this is dumy description to this product',14000,10,'3.jpg',2),
('apple','this is dumy description to this product',16000,10,'4.jpg',2),
('samsung','this is dumy description to this product',18000,20,'5.jpg',2),
('oppo','this is dumy description to this product',19000,50,'6.jpg',3),
('hawawi','this is dumy description to this product',12000,30,'7.jpg',3);


insert into admins(`name`,`email`,`password`)
values('habiba' ,'habiba_mohammed@gmail.com','$2y$10$pKRUVm8W1gkg8RflecNKI.RLETX3..fGVIyf5jiGeUxkcRj99k2DG');