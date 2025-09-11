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

 > $tag = App\Models\Tag::find(1) 

 > $tag->jobs()->attach(7) 

> $tag->jobs()->get()

> $tag->jobs()->get()->pluck('title')  

N+1 problem:
the N+1 problem refers to database queries executed within loop rather than making a single query that loads all of relevent data upfront

for this in web we did this

from this 
       return view('jobs',[
            'jobs'=> Job::all()]); -- lazy loading
});

to this
Route::get('/jobs', function ()  {
    $jobs = Job::with('employer')->get(); -- eager laoding
        return view('jobs',[
            'jobs'=> $jobs]);
});


if you want to disable lazy loading 

in app service provider
  public function boot(): void
    {
        Model::preventLazyLoading();
    }

    php artisan vendor:publish

    to change the default styling of pagination do it app service provider

    Paginator::useBootstrapFive();

    $jobs = Job::with('employer')->paginate(3); this kind of pagination can cause performance issue if there are many records so we use 
    $jobs = Job::with('employer')->simplePaginate(3);


     php artisan db:seed  

     php artisan  make:seeder  

      php artisan migrate:fresh --seed

      go to laravel docs validation for more validation