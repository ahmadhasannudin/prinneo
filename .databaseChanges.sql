create table blog_data
(
	blog_data_id int auto_increment primary key ,
	type varchar(255) not null ,
	title varchar(255) null,
	content text null,
	is_active bool default true not null
);

create unique index blog_data_blog_data_id_uindex
	on blog_data (blog_data_id);
	
alter table blog_data
	add image_url varchar(255) null;