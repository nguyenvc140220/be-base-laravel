# Implementation Policy

## Log

In general, retain logs that correspond to the commonly suggested [log levels](https://en.wikipedia.org/wiki/Log4j#Log_level), such as info, warn, and fatal.

Ensure that the output format includes the necessary information within the process. The `uuid` should be used as a unique identifier per request.
Information that can identify the user performing the action (such as the user's ID) should be obtained through a customized Log class. Here is an example implementation:
https://www.zu-min.com/archives/567

```php
$articleId = 1;

Log::info('Article data updated successfully', [
    'articleId' => $articleId,
]);
Log::error('Failed to update article data', [
    'articleId' => $articleId,
]);
```

## server/app/Enums ([Reference](https://www.php.net/manual/en/language.enumerations.php))

This directory stores constants.
Values that are close to the implementation within the program (≈ used as type information) are placed in `server/app/Enums`.

```
- Values that may become magic numbers
- Roles
- Gender
- ...etc
```

As with classes, define each enum in a separate file.

```php
<?php

namespace App\Enums;

use App\Traits\Enum\EnumEnhancement;

enum Role: string
{
    use EnumEnhancement;

    case MEMBER = 'MEMBER';
    case CLIENT = 'CLIENT';
}
```

```php
<?php

use App\Enums\Role;

// For example, where type information is needed, use enum
function getUser(Role $role)
{
    return Role::MEMBER;
}
```

## server/config

"This directory is for placing constants, similar to enums.

Configuration values for Laravel, for instance, are placed in `server/config`.
Additionally, other constants that don’t require type information or have a deeper hierarchy are also placed in `server/config`."

```
- S3 Bucket path
- Pagination count
- ...etc
```

```php
<?php
// config/s3.php

// As shown below, items that have a deep hierarchy and do not require type information should be placed in config.
return [
    'avatar' => [
        'image' => 'upload/avatar'
    ],
    'work_log' => [
        'image' => 'upload/work_log'
    ],
    'chat' => [
        'image' => 'upload/chat'
    ],
    'default' => [
        'image' => 'upload/tmp'
    ],
];
```

## server/app/Http/Resources

> **Warning**  
> This is not limited to using API resources, but [take care to avoid the N+1 problem](https://zenn.dev/tekihei2317/articles/d788362937eb96#%E9%96%A2%E9%80%A3%E3%82%92%E5%BF%85%E3%81%9A%E3%83%AD%E3%83%BC%E3%83%89%E3%81%99%E3%82%8B%E5%A0%B4%E5%90%88).

- [Reference](https://readouble.com/laravel/9.x/en/eloquent-resources.html)
- When processing, transforming, or formatting Eloquent models as JSON responses for the API, use this approach for conversions.
  - In other words, when returning a response in the controller, wrap it in a resource class.
- This also serves the purpose of making the API interface clearer.

> **Note**  
> Please list all attributes explicitly instead of using `parent::toArray()`.

```php
class DemoResource extends JsonResource
{
    public function toArray($request): array
    {
      // The API specification is easy to understand at a glance.
      return [
        'id' => $this->resource->id,
        'title' => $this->resource->title,
        'body' => $this->resource->body,
        'created_at' => $this->resource->created_at,
        'updated_at' => $this->resource->updated_at,
      ];
    }
}
```

It is used by wrapping it when returning a response

```php
class DemoController
{
  public function store(StoreDemoRequest $request): DemoResource|null
  {
    try {
      $demo = $demo_service->create($request->all());

      Log::info('記事データ更新成功', [
        'demoId' => $demo->id,
      ]);

      // Wrap it in a resource class
      return new DemoResource($demo);
    } catch (\Exception $e) {
      Log::error('デモデータ登録失敗', [
        'demoId' => $demo->id,
        'error_message' => $e->getMessage(),
      ]);

      return response()->json(null, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }
}
```

## server/app/Http/Requests

- [Reference](https://readouble.com/laravel/9.x/en/validation.html)
- If request validation is not required, no class will be created.

1. Create a class that inherits from `Illuminate\Foundation\Http\FormRequest`.

   - The class name should start with the action (CRUD) and end with `Request` (e.g., `CreateUserRequest`).

```php
  class CreateDemoRequest extends FormRequest
  {
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          // Describe the validation rules for each request key.
        ];
    }

    public function attributes(): array
    {
        return [
          // Describe the Japanese name for each request key.
        ];
    }
  }
```

2. In the controller, specify it using type hinting.

   ```php
   class DemoController extends Controller
   {
     public function __construct() {}

     public function store(CreateDemoRequest $request): JsonResponse
     {
       // Optional processing
     }
   }
   ```

## server/app/Http/Controllers

- It is responsible for passing data between the client and the business logic.

- Essentially, it calls the Service class to fetch data, uses API resources to format the response, and returns it to the client.

## server/app/Models

- [Reference](https://readouble.com/laravel/9.x/en/eloquent.html)
- Define relationships, accessors, mutators, and other methods not directly related to database operations.
- When adding a Model class, also add the corresponding Factory class to `database/factories`.
  - This class is used during unit testing, so make sure not to forget to create it.

## server/app/Services

- Write business logic that is not related to data persistence.
- Since it is one of the most important test targets, write code with testability in mind.
- Also, define the Interface in the same layer (the Repository class and Interface class have a 1:1 relationship and are added together).
  - The Interface should only define the behavior, such as arguments and return values, when interacting with the database.

## server/app/Repositories

- Write business logic related to data persistence (such as saving data).
- Define specific methods for interacting with the database using Eloquent Models.
- Create classes in a 1:1 relationship with the Eloquent Model.
- Also, define the Interface in the same layer (the Repository class and Interface class have a 1:1 relationship and are added together).
  - The Interface should only define the behavior, such as arguments and return values, when interacting with the database.

## server/app/Mail

- [Reference](https://readouble.com/laravel/9.x/en/mail.html)
- This is the directory where the actual emails to be sent are placed.

1. Create a class that inherits from `Illuminate\Mail\Mailable`.

   ```php
   class Demo extends Mailable
   {
       use Queueable, SerializesModels;

       public function __construct()
       {
           $this->recruit = $recruit;
       }

       /**
       * Build the message.
       *
       * @return $this
       */
       public function build()
       {
         return $this
             ->subject('デモタイトル')
             ->view('emails.demo')
             ->withSwiftMessage(function ($message) {
                 $message->setCharset('iso-2022-jp');
                 $message->setEncoder(new Swift_Mime_ContentEncoder_PlainContentEncoder('7bit'));
             });
       }
   }
   ```

2. Send the email as shown below.
   ```php
   Mail::to('to-address@example.com')->send(new Demo());
   ```

## server/app/Console/Commands

- [Reference](https://readouble.com/laravel/9.x/en/scheduling.html)
- This is the directory where batch processing is placed.
- It keeps more detailed logs than those mentioned in the [Log](##Log) section.

1. Create a class that inherits from `Illuminate\Console\Command`.

   ```php
   class DemoBatch extends Command
   {
      /**
       * The name and signature of the console command.
       *
       * @var string
       */
       protected $signature = 'batch:demo';

      /**
       * The console command description.
       *
       * @var string
       */
       protected $description = 'Demo用のバッチです';

      /**
       * Create a new command instance.
       *
       * @return void
       */
       public function __construct()
       {
           parent::__construct();
       }

      /**
       * Execute the console command.
       *
       * @return mixed
       */
       public function handle()
       {
           // Batch process to be executed.
       }
   }
   ```

2. After defining the batch class, register it in `Kernel.php` to execute the batch.

   ```php
   // server/app/Console/Kernel.php

   /**
    * Define the application's command schedule.
   *
   * @return void
   */
   protected function schedule(Schedule $schedule)
   {
     $schedule->command(DemoBatch::class)->hourly();
     // or
     // $schedule->command('batch:demo')->hourly();
   }
   ```

## server/database/factories

- Create it in correspondence with the model when it is created.
- Use `Faker` to generate dynamic data whenever possible.

## server/resources/views/emails

- This is where the email content is placed.

## server/tests

- **Feature**
  - Write tests for the controller.
    - Write tests that perform standard pseudo-requests in Laravel.
- **Unit**
  - **Services**
    - This is the most important test target.
    - Cover normal cases for each method, and write tests for abnormal cases as much as possible.
  - **Requests**
    - Validate that the values passing the validation match the request parameters.
  - **Repositories**
    - Ensure that methods interacting with the database work correctly.
