# Example for laravel-user-jobs package

User Story: Users want to see in the interface a list of when and which reports they have uploaded.

## Installation

Run the commands after cloning the project
```bash
git clone https://github.com/tumarinson/laravel-user-jobs.git
composer install
php artisan migrate
```
Then you can see a database table `user_jobs` with a structure:

| user_job_id | job_class            | user_id | status    | progress | payload         | created_at          | updated_at          | deleted_at |
|-------------|----------------------|---------|-----------|----------|-----------------|---------------------|---------------------|------------|
| 1           | Namespace\Your\Class | 5       | waiting   | 0        | null            | 2022-01-01 00:00:00 | 2022-01-01 00:00:00 | null       |
| 2           | Namespace\Your\Class | 123     | completed | 100      | {"foo": "bar"}  | 2022-01-01 00:00:01 | 2022-01-01 00:12:34 | null       |


## Create a job
All you need is to extend your job class with AbstractUserJob.php and when creating a task, pass the user ID to the class with the first parameter as follows:

`$job = new UserJobExample($userId);`

Job class example: https://github.com/tumarinson/laravel-user-jobs/blob/master/example/Jobs/UserJobExample.php
