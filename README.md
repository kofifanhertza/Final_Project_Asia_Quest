# Server-side Programming
main branch

## Frequently used command
Initial Environment Development
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

```
./vendor/bin/sail up -d
```

```
./vendor/bin/sail artisan key:create
```

```
./vendor/bin/sail artisan migrate
```