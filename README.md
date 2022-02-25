# JL UPD: imported from:
[https://github.com/sinanbekar/laravel-realtime-chat-app]
(https://github.com/sinanbekar/laravel-realtime-chat-app)

### Laravel Real-time Chat App

You can build yours from scratch with the following Medium article

[https://medium.com/@sinan.bekar/build-a-real-time-chat-app-with-laravel-and-react-5cae5a7c22d4](https://medium.com/@sinan.bekar/build-a-real-time-chat-app-with-laravel-and-react-5cae5a7c22d4)

In production demo app: [http://laravel-chat-app.ml/](http://laravel-chat-app.ml/)

# JL UPD: more info can be found:
[https://medium.com/@achalaarunalu/setting-up-an-existing-laravel-8-sail-docker-project-on-windows-wsl2-and-ubuntu-20-04-f0def4210258]
(https://medium.com/@achalaarunalu/setting-up-an-existing-laravel-8-sail-docker-project-on-windows-wsl2-and-ubuntu-20-04-f0def4210258)

# JL UPD: GIT token generate:
[https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/creating-a-personal-access-token]
(https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/creating-a-personal-access-token)

#### Installation with Docker (Laravel Sail)

# JL UPD: go to root user folder
```bash
cd ~
```

# JL UPD:
```bash
git clone https://github.com/egorlins/jl-laravel-realtime-chat-app.git
```
Username: your_username
Password: your_token

# JL UPD: go to root user folder
```bash
cd jl-laravel-realtime-chat-app
```

Install composer packages:
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Create .env:
```bash
cp .env.example .env
```

# JL UPD: go to root user folder
```bash
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

# JL UPD: Sail up detatched (-d):
```bash
sail up -d
```

# JL UPD: Generate app key:
```bash
sail artisan key:generate
```

# JL UPD: Clean cache and migrate:
```bash
sail artisan cache:clear && sail artisan migrate
```

# JL UPD: Run tinker:
```bash
sail artisan tinker
```

Create users and rooms:
```php
\App\Models\User::factory(5)->create();
```

# JL UPD: 
```php
DB::table('rooms')->insert(array_map(function ($room) {
            return ['name' => $room];
        }, ['general', 'room1', 'room2', 'room3', 'room4']));
```

# JL UPD: CTRL+C

# JL UPD: Install npm packages and compile assets:
```bash
sail npm install && sail npm run dev
```

You can access the chat page by visiting http://localhost/chat after login.

# JL UPD: user can be taken from output of cmd "\App\Models\User::factory(5)->create();"
Username: generated email
Password: password
