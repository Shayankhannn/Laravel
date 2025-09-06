:active="false" this will be reat as expression not string

 dd()  -- dump and die function

 elequent highly run on convention over configuration

 if you have table name comments your elequent model would be comment

 php artisan tinker --  create a playground to test things


 without elequent job class
 class Job ->
{
    public static function all() : array
    {
        return [
              [
                    'id' => '1',
                    'title' => 'director',
                    'salary' => '50,000'
                ],
                [
                    'id' => '2',
                    'title'=> 'sweeper',
                    'salary' => '90,000'
                ],
                [
                    'id' => '3',
                    'title'=> 'janitor',
                    'salary' => '100,000'
                ]
                ];
    }

    public static function find(int $id): array
    {
       $job =  Arr::first(static::all(), fn($job)=> $job['id'] == $id);

       if(!$job){
        abort(404);
       }
       return $job;

    }
};
-------------------------------------------


php artisan make:model Comment

php artisan make:model Post -m

php artisan migrate

factory --  database/factory
use a model factory to quickly scaffold example data

App\Models\User::factory()->create()

--------------

php artisan make:model Employer -m

php artisan migrate:fresh

php artisan make:model Employer -f

$job = App\Models\Job::first()   

$job->employer;    

$job->employer->name;    


> $employer = App\Models\Employer::first()  


> $employer->job   

two key elequent relation ship

A post can have many comment 
        |
    hasMany()
A comment belongs to a post
        |
    belongsTo()

A post belongs to a user
        |
    belongsTo()
------------------


php artisan make:model Tag -mf

php artisan migrate

php artisan migrate:rollback && php artisan migrate

in sql: pragma foreign_keys=on

 App\Models\Job::factory(10)->create()  

 > $job = App\Models\Job::find(10)      