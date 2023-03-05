# Todo List
### A simple laravel based todo application.

### INSTALLATION
To install the application, follow these steps:



1. Clone the repository to your local machine:


```bash
    git clone https://github.com/MuhammadMahediHasan/to-do-list.git
```
2. Navigate to the project directory:

```bash
    cd ./to-do-list
```
3. Navigate to the project directory:

```bash
    composer install
```
4. Create a copy of the .env.example file and save it as .env:

```bash
    cp .env.example .env
```

5. Generate a new application key:

```bash
    php artisan key:generate
```

6. Update the .env file with your database credentials.

```bash
    php artisan migrate
```
7. Start the application:

```bash
    php artisan serve
```

You should now be able to access the application by navigating to http://localhost:8000 in your web browser.

## Usage
To use the application, follow these steps:

1. Create an account by clicking on the "Register" link in the top right corner of the page.

2. Once you have created an account and logged in, you will be taken to the homepage where you can see the navigation.

3. There are two menus like To-do and Task.

4. To show the list of to-do click on the "Todo" Menu. Here will see the exiting Todo list.

5. To create a new todo, click on the "Create Todo" button and enter a name for the todo.

6. To update a todo, click on the "Edit" button and make your changes in the form.

7. To view a todo, click on the  "Show" button and show Todo.

7. To delete a todo, click on the "Delete" button next to the todo you want to delete.

8. To show the list of task click on the "Task" Menu. Here will see the exiting Task list

9. To create a new task, click on the "Create Task" button and enter a name and select todo for the task.

10. To update a task, click on the task "Edit" button and make your changes in the form.

11. To delete a task, click on the "Delete" button next to the task you want to delete.



## License

This application is open-sourced software licensed under the MIT license.
