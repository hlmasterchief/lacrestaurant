## Cheatsheet for group (Vietnamese)

### Tạo database:
http://laravel.com/docs/migrations
http://laravel.com/docs/schema  
Kiểm tra các file trong folder app/database/migrations để biết thêm chi tiết.


### Quy tắc đặt tên column:
1. Bắt buộc phải có column id ($table->increments('id'))
2. primary key sẽ tự động set là id luôn, không dùng 2 hoặc nhiều cột làm key
3. không cần quan tâm đến việc đặt foreign key
4. đặt relationship:
  - cột được tính là foreign key phải có tên là MODEL\_id (với MODEL là tên class MODEL mình sẽ tạo, MODEL đó sẽ liên kết với relation table)
  - với many to many relationship, table trung gian sẽ có tên MODEL1\_MODEL2 (tên MODEL1 và MODEL2 được xếp theo thứ tự ABC, ví dụ role\_user chứ không phải user\_role). table trung gian sẽ có cột id, MODEL1\_id và MODEL2\_id
  - nếu model có 2 từ (ví dụ BlogCategory) thì tên foreign key là blog\_category\_id
5. các database dùng để lưu data nên có $table->timestamps();


### Quy tắc Model:
Check model trong folder app/model
1. tên model ngắn gọn hết sức có thể, không dùng plural (ví dụ bảng users, thì model dùng User thôi)
2. đầu class đặt `protected $table = 'table_name';` với table_name là tên bảng Model hướng tới
3. tên function relationship phải đặt trùng tên model relation (in thường), nếu model chứa 2 từ (ví dụ BlogCategory) thì function sẽ tên là blogCategory
4. nếu dùng hasMany thì đặt tên function là plural (ví dụ trong class Group sẽ có function users() để nhặt tất cả users thuộc group)