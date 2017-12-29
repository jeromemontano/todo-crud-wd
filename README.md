# todo-crud-wd
Web Based TODO List Application

#clone
git clone https://github.com/pot8toman/todo-crud-wd.git

#go to todo-crud-wd and create db folder
cd todo-crud-wd
mkdir todo-db

#execute docker command
docker-compose up -d

#run mysql (password is root)
mysql -uroot -p -h 0.0.0.0

#copy and execute script in init.sql to create db and table

#view project by visiting localhost
