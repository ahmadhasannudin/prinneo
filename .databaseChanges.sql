create table blog_data (
  blog_data_id int auto_increment primary key,
  type varchar(255) not null,
  title varchar(255) null,
  content text null,
  is_active bool default true not null
);
create unique index blog_data_blog_data_id_uindex on blog_data (blog_data_id);
alter table
  blog_data
add
  image_url varchar(255) null;
--table career
  create table career (
    career_id int,
    title varchar(255) not null,
    description text null,
    is_active bool default true not null
  );
create unique index career_career_id_uindex on career (career_id);
alter table
  career
add
  constraint career_pk primary key (career_id);
alter table
  career
modify
  career_id int auto_increment;
alter table
  career
add
  penempatan varchar(255) not null
after
  description;
alter table
  career
add
  pendidikan varchar(255) not null
after
  penempatan;
--table career applicant
  create table career_applicant (
    career_applicant_id int,
    career_id int not null,
    nama varchar(255) not null,
    tanggal_lahir date not null,
    alamat varchar(255) not null,
    telephone varchar(255) not null,
    email varchar(255) not null,
    status_pekerjaan varchar(255) not null,
    status_pernikahan varchar(255) not null,
    surat_lamaran varchar(255) not null,
    document_lamaran varchar(255) not null
  );
create unique index career_applicant_career_applicant_id_uindex on career_applicant (career_applicant_id);
alter table
  career_applicant
add
  constraint career_applicant_pk primary key (career_applicant_id);
alter table
  career_applicant
modify
  career_applicant_id int auto_increment;
alter table
  users
add
  is_email_confirmed boolean not null;
UPDATE
  users
SET
  is_email_confirmed = true
WHERE
  is_email_confirmed = false;
alter table
  users
add
  confirmation_code varchar(255) null;
alter table
  orders
add
  order_code varchar(255) not null
after
  order_id;
alter table
  orders
modify
  order_name varchar(200) not null
after
  order_date;
create unique index orders_order_code_uindex on orders (order_code);
-- midtrans payment
  create table order_payment (
    order_payment_id int,
    order_id int not null,
    order_code int not null,
    status_code int null,
    status_message varchar(255) null,
    transaction_id varchar(255) null,
    gross_amount int null,
    payment_type varchar(255) null,
    transaction_time datetime null,
    transaction_status varchar(255) null,
    va_bank varchar(255) null,
    va_number varchar(255) null,
    fraud_status varchar(255) null,
    pdf_url varchar(255) null,
    finish_redirect_url varchar(255) null
  );
create unique index order_payment_order_payment_id_uindex on order_payment (order_payment_id);
alter table
  order_payment
add
  constraint order_payment_pk primary key (order_payment_id);
alter table
  order_payment
modify
  order_payment_id int auto_increment;
drop index orders_order_code_uindex on orders;
alter table
  order_details
add
  jenis_order varchar(255) null;